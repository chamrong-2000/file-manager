<?php

namespace App\Http\Controllers\Frontend\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Methods\ReCaptchaValidation;
use App\Models\Country;
use App\Models\SocialProvider;
use App\Models\User;
use App\Models\UserLog;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new log
     *
     * @return // save data
     */
    public function createLog($user)
    {
        $log = new UserLog();
        $log->user_id = $user->id;
        $log->ip = vIpInfo()->ip;
        $log->country = vIpInfo()->country;
        $log->country_code = vIpInfo()->country_code;
        $log->timezone = vIpInfo()->timezone;
        $log->location = vIpInfo()->location;
        $log->latitude = vIpInfo()->latitude;
        $log->longitude = vIpInfo()->longitude;
        $log->browser = vBrowser();
        $log->os = vPlatform();
        $log->save();
    }

    /**
     * Create a new admin notification
     *
     * @return // save data
     */
    public function createAdminNotify($user)
    {
        $title = $user->firstname . ' ' . $user->lastname . ' ' . __('has registered');
        $image = asset($user->avatar);
        $link = route('admin.users.edit', $user->id);
        return adminNotify($title, $image, $link);
    }

    /**
     * Create a new admin notification
     *
     * @return // save data
     */
    public function createUserNotify($user)
    {
        $title = 'Thanks for joining us ' . $user->firstname . '!';
        $image = asset('images/icons/welcome.png');
        return userNotify($user->id, $title, $image);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm(Request $request)
    {
        return view('frontend.user.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'min:6', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['sometimes', 'required'],
        ] + ReCaptchaValidation::validate());
    }

    /**
     * Before register a new user
     *
     * @return //redirect
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        return $this->registered($request, $user)
        ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $avatar = "images/avatars/default.png";
        $createUser = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'avatar' => $avatar,
            'password' => Hash::make($data['password']),
        ]);
        if ($createUser) {
            $this->createAdminNotify($createUser);
            $this->createLog($createUser);
            $this->createUserNotify($createUser);
        }
        return $createUser;
    }

    /**
     * Show the application complete registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showCompleteForm(Request $request, $token)
    {
        abort_if($token != session('provider_data'), 401);
        $data = decrypt(session('provider_data'));
        return view('frontend.user.auth.complete', ['data' => $data, 'token' => $token]);
    }

    /**
     * Create a new user instance after a valid complete registration.
     *
     * @param  string  $token
     * @return \App\Models\User
     */
    public function complete(Request $request, $token)
    {
        if ($token != session('provider_data')) {
            toastr()->error(lang('Unauthorized or expired token', 'alerts'));
            return back();
        }
        $this->validator($request->all())->validate();
        $data = decrypt(session('provider_data'));
        $ext = pathinfo($data['avatar'], PATHINFO_EXTENSION);
        $ext = (empty($ext)) ? '.jpg' : '.' . $ext;
        $fileContents = file_get_contents($data['avatar']);
        $path = 'images/avatars/users/';
        $filename = Str::random(15) . '_' . time() . $ext;
        $avatar = $path . $filename;
        $image = Image::make($fileContents);
        $image->resize(110, 110);
        $uploadAvatar = $image->save($path . $filename);
        if ($uploadAvatar) {
            $createUser = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'avatar' => $avatar,
                'password' => Hash::make($request->password),
            ]);
            if ($createUser) {
                $createUser->sendEmailVerificationNotification();
                $provider = @$data['provider'];
                $socialProvider = new SocialProvider();
                $socialProvider->user_id = $createUser->id;
                $socialProvider->$provider = $data['id'];
                $socialProvider->save();
                $this->createAdminNotify($createUser);
                $this->createLog($createUser);
                $this->createUserNotify($createUser);
                Session::forget('provider_data');
                Auth::login($createUser);
                return redirect()->route('user.dashboard');
            }
        } else {
            toastr()->error(lang('Upload error', 'alerts'));
            return back();
        }
    }
}
