<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Validator;

class GeneralController extends Controller
{
    public function index()
    {
        return view('backend.settings.general.index');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_name' => ['required', 'string', 'max:200'],
            'website_url' => ['required', 'url'],
            'website_primary_color' => ['required'],
            'website_secondary_color' => ['required'],
            'website_third_color' => ['required'],
            'website_background_color' => ['required'],
            'website_dark_logo' => ['mimes:png,jpg,jpeg,svg', 'max:2048'],
            'website_light_logo' => ['mimes:png,jpg,jpeg,svg', 'max:2048'],
            'website_favicon' => ['mimes:png,jpg,jpeg,ico', 'max:2048'],
            'website_social_image' => ['mimes:jpg,jpeg', 'image', 'max:2048'],
            'website_home_background_pattern' => ['mimes:png', 'image', 'max:2048'],
            'contact_email' => ['required'],
            'terms_of_service_link' => ['nullable', 'url'],
            'date_format' => ['required', 'integer'],
            'timezone' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {toastr()->error($error);}
            return back();
        }
        if ($request->has('website_dark_logo')) {
            $filename = 'dark-logo';
            $darkLogo = vFileUpload($request->file('website_dark_logo'), 'images/', $filename, settings('website_dark_logo'));
            Settings::updateSettings('website_dark_logo', $darkLogo);
        }
        if ($request->has('website_light_logo')) {
            $filename = 'light-logo';
            $lightLogo = vFileUpload($request->file('website_light_logo'), 'images/', $filename, settings('website_light_logo'));
            Settings::updateSettings('website_light_logo', $lightLogo);
        }
        if ($request->has('website_favicon')) {
            $filename = 'favicon';
            $favicon = vFileUpload($request->file('website_favicon'), 'images/', $filename, settings('website_favicon'));
            Settings::updateSettings('website_favicon', $favicon);
        }
        if ($request->has('website_social_image')) {
            $filename = 'social-image';
            $ogImage = vImageUpload($request->file('website_social_image'), 'images/', '600x315', $filename, settings('website_social_image'));
            Settings::updateSettings('website_social_image', $ogImage);
        }
        if ($request->has('website_home_background_pattern')) {
            $filename = 'home-pattern';
            $ogImage = vFileUpload($request->file('website_home_background_pattern'), 'images/', $filename, settings('website_home_background_pattern'));
            Settings::updateSettings('website_home_background_pattern', $ogImage);
        }

        if ($request->has('website_email_verify_status') && !settings('mail_status')) {
            toastr()->error(__('SMTP is not enabled'));
            return back()->withInput();
        }

        if ($request->has('website_contact_form_status') && !settings('mail_status')) {
            toastr()->error(__('SMTP is not enabled'));
            return back()->withInput();
        }

        if ($request->has('website_contact_form_status') && !settings('contact_email')) {
            toastr()->error(__('Contact form require contact email'));
            return back()->withInput();
        }

        $request->website_email_verify_status = ($request->has('website_email_verify_status')) ? 1 : 0;
        $request->website_registration_status = ($request->has('website_registration_status')) ? 1 : 0;
        $request->website_force_ssl_status = ($request->has('website_force_ssl_status')) ? 1 : 0;
        $request->website_cookie = ($request->has('website_cookie')) ? 1 : 0;
        $request->website_blog_status = ($request->has('website_blog_status')) ? 1 : 0;
        $request->website_faq_status = ($request->has('website_faq_status')) ? 1 : 0;
        $request->website_contact_form_status = ($request->has('website_contact_form_status')) ? 1 : 0;

        if (!array_key_exists($request->date_format, dateFormatsArray())) {
            toastr()->error(__('Invalid date format'));
            return back();
        }

        if (!array_key_exists($request->timezone, timezonesArray())) {
            toastr()->error(__('Invalid timezone'));
            return back();
        }

        $settings = Settings::whereIn('key', [
            'website_name',
            'website_url',
            'website_primary_color',
            'website_secondary_color',
            'website_third_color',
            'website_background_color',
            'website_email_verify_status',
            'website_registration_status',
            'website_force_ssl_status',
            'website_blog_status',
            'website_faq_status',
            'website_contact_form_status',
            'contact_email',
            'terms_of_service_link',
            'website_cookie',
            'date_format',
            'timezone',
        ])->get();
        foreach ($settings as $setting) {
            $key = $setting->key;
            $setting->value = $request->$key;
            $setting->save();
        }
        setEnv('APP_URL', $request->website_url);
        setEnv('APP_TIMEZONE', '"' . $request->timezone . '"');
        $colorsFile = 'assets/css/extra/colors.css';
        if (!file_exists($colorsFile)) {
            fopen($colorsFile, "w");
        }
        $colors = "
        :root {
            --primaryColor: " . $request->website_primary_color . ";
            --secondaryColor: " . $request->website_secondary_color . ";
            --thirdColor:" . $request->website_third_color . ";
            --bgColor:" . $request->website_background_color . ";
        }
        ";
        file_put_contents($colorsFile, $colors);
        toastr()->success(__('Updated Successfully'));
        return back();
    }
}
