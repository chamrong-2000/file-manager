<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\BlogArticle;
use App\Models\Feature;
use App\Models\Language;
use App\Models\MailTemplate;
use App\Models\Settings;
use App\Models\Translate;
use Illuminate\Http\Request;
use Validator;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::withCount(['translates' => function ($query) {
            $query->where('value', null);
        }])->get();
        return view('backend.settings.languages.index', ['languages' => $languages]);
    }

    public function updateSettings(Request $request)
    {
        $request->website_language_type = $request->has('website_language_type') ? 1 : 0;
        $update = Settings::updateSettings('website_language_type', $request->website_language_type);
        if ($update) {
            toastr()->success(__('Updated Successfully'));
            return back();
        }
    }

    public function create()
    {
        return view('backend.settings.languages.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'flag' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'name' => ['required', 'string', 'max:150'],
            'code' => ['required', 'string', 'max:10', 'min:2', 'unique:languages'],
            'direction' => ['required', 'integer', 'min:1', 'max:2'],
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                toastr()->error($error);
            }
            return back()->withInput();
        }
        if (!array_key_exists($request->code, languages())) {
            toastr()->error(__('Something went wrong please try again'));
            return back();
        }
        $uploadFlag = vImageUpload($request->file('flag'), 'images/flags/', '25x25', $request->code);
        if ($uploadFlag) {
            $create = Language::create([
                'flag' => $uploadFlag,
                'name' => $request->name,
                'code' => $request->code,
                'direction' => $request->direction,
            ]);
            if ($create) {
                if ($create) {
                    $translates = Translate::where('lang', env('DEFAULT_LANGUAGE'))->get();
                    $mailtemplates = MailTemplate::where('lang', env('DEFAULT_LANGUAGE'))->get();
                    foreach ($translates as $translate) {
                        $value = ($request->code == "en") ? $translate->key : null;
                        $lang = new Translate();
                        $lang->lang = $request->code;
                        $lang->group_name = $translate->group_name;
                        $lang->key = $translate->key;
                        $lang->value = $value;
                        $lang->save();
                    }
                    foreach ($mailtemplates as $mailtemplate) {
                        $value = ($request->code == "en") ? $mailtemplate->key : null;
                        $mailtemplateTrans = new MailTemplate();
                        $mailtemplateTrans->lang = $request->code;
                        $mailtemplateTrans->group_name = $mailtemplate->group_name;
                        $mailtemplateTrans->key = $mailtemplate->key;
                        $mailtemplateTrans->value = $value;
                        $mailtemplateTrans->save();
                    }
                    if ($request->has('is_default')) {
                        setEnv('DEFAULT_LANGUAGE', removeSpaces($create->code));
                    }
                    toastr()->success(__('Created Successfully'));
                    return redirect()->route('language.translate', $create->code);
                }
            }
        }
    }

    public function show(Language $language)
    {
        return abort(404);
    }

    public function translate(Request $request, $code, $group = null)
    {
        $language = Language::where('code', $code)->firstOrFail();
        if ($request->input('search')) {
            $q = $request->input('search');
            $groups = collect([
                (object) ["group_name" => "Search results"],
            ]);
            $translates = Translate::where([['lang', $language->code], ['key', 'like', '%' . $q . '%']])
                ->OrWhere([['lang', $language->code], ['value', 'like', '%' . $q . '%']])
                ->OrWhere([['lang', $language->code], ['group_name', 'like', '%' . $q . '%']])
                ->orderbyDesc('id')
                ->get();
            $active = "Search results";
        } elseif ($request->input('filter')) {
            abort_if($request->input('filter') != 'missing', 404);
            $groups = collect([
                (object) ["group_name" => "missing translations"],
            ]);
            $translates = Translate::where([['lang', $language->code], ['value', null]])->orderby('group_name')->get();
            $active = "missing translations";
        } else {
            $groups = Translate::where('lang', $language->code)->select('group_name')->distinct()->get();
            if ($group != null) {
                $group = str_replace('-', ' ', $group);
                $translates = Translate::where([['lang', $code], ['group_name', $group]])->get();
                abort_if($translates->count() < 1, 404);
                $active = $group;
            } else {
                $translates = Translate::where([['lang', $language->code], ['group_name', 'general']])->get();
                $active = "general";
            }
        }
        $translates_count = Translate::where([['lang', $language->code], ['value', null]])->count();
        return view('backend.settings.languages.translate', [
            'active' => $active,
            'translates' => $translates,
            'groups' => $groups,
            'language' => $language,
            'translates_count' => $translates_count,
        ]);
    }

    public function translateUpdate(Request $request, $id)
    {
        $language = Language::where('id', $id)->first();
        if ($language == null) {
            toastr()->error(__('Something went wrong please try again'));
            return back();
        }
        foreach ($request->values as $id => $value) {
            $translation = Translate::where('id', $id)->first();
            if ($translation != null) {
                $translation->value = $value;
                $translation->save();
            }
        }
        toastr()->success(__('Updated Successfully'))->info(__('Clear the cache to take effect'));
        return back();
    }

    public function edit(Language $language)
    {
        return view('backend.settings.languages.edit', ['language' => $language]);
    }

    public function update(Request $request, Language $language)
    {
        $validator = Validator::make($request->all(), [
            'flag' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'name' => ['required', 'string', 'max:150'],
            'direction' => ['required', 'integer', 'min:1', 'max:2'],
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                toastr()->error($error);
            }
            return back()->withInput();
        }
        if (!$request->has('is_default')) {
            if ($language->code == env('DEFAULT_LANGUAGE')) {
                toastr()->error(__($language->name . ' is default language'));
                return back();
            }
        }
        if ($request->has('flag')) {
            $uploadFlag = vImageUpload($request->file('flag'), 'images/flags/', '25x25', $language->code, $language->flag);
        } else {
            $uploadFlag = $language->flag;
        }
        if ($uploadFlag) {
            $update = Language::where('id', $language->id)->update([
                'flag' => $uploadFlag,
                'name' => $request->name,
                'direction' => $request->direction,
            ]);
            if ($update) {
                if ($request->has('is_default')) {
                    setEnv('DEFAULT_LANGUAGE', removeSpaces($language->code));
                }
                toastr()->success(__('Updated Successfully'));
                return back();
            }
        }
    }

    public function setDefault($id)
    {
        $language = Language::find(decrypt($id));
        if ($language != null) {
            if (env('DEFAULT_LANGUAGE') == $language->code) {
                toastr()->error(__('Language already marked as default'));
                return back();
            } else {
                setEnv('DEFAULT_LANGUAGE', removeSpaces($language->code));
                toastr()->success(__('Default language updated Successfully'));
                return back();
            }
        } else {
            toastr()->error(__('language not exists'));
            return back();
        }
    }

    public function destroy(Language $language)
    {
        if ($language->code == env('DEFAULT_LANGUAGE')) {
            toastr()->error(__('Default language cannot be deleted'));
            return back();
        }
        $articles = BlogArticle::where('lang', $language->code)->get();
        if ($articles->count() > 0) {
            foreach ($articles as $article) {
                removeFile($article->image);
            }
        }
        $features = Feature::where('lang', $language->code)->get();
        if ($features->count() > 0) {
            foreach ($features as $feature) {
                removeFile($feature->image);
            }
        }
        removeFile($language->flag);
        $language->delete();
        toastr()->success(__('Deleted Successfully'));
        return back();
    }
}
