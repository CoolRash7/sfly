<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Auth\Events\Registered;

//forgot password
use Illuminate\Auth\Events\PasswordReset;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


// define('SMARTCAPTCHA_SERVER_KEY', 'bpn0t263iek8c68sumer');

class AuthController extends Controller
{
    //
    public function registerPage() {
        return view('auth.register');
    }

    public function lkPage(Request $request) {
        // if ( !Auth::user()->is_admin)
        //     abort(403);

        // Удаление старых данных из сессии
        $request->session()->forget('_old_input'); // Альтернативный способ удаления конкретных данных
        return view('auth.lk');
    }

    public function loginPage() {
        return view('auth.login');
    }

    public function registerStore(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // dd($validated);



        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect( route('home') );

        
        


        // $user = User::create([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => $validated['password']
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect( route('home') );
    }

    // Метод для проверки капчи
    private function validateCaptcha($token, $ip)
    {
        $serverKey = env('SMARTCAPTCHA_SERVER_KEY'); // Ключ сервера из .env

        $response = Http::asForm()->post('https://smartcaptcha.yandexcloud.net/validate', [
            'secret' => $serverKey,
            'token' => $token,
            'ip' => $ip,
        ]);

        // Если запрос не удался, считаем капчу пройденной (на ваше усмотрение)
        if ($response->status() !== 200) {
            return true;
        }

        // Проверяем статус ответа
        $responseData = $response->json();
        return $responseData['status'] === 'ok';
    }


    public function loginStore(Request $request) {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($validated)) {
            return back()->withInput()->withErrors(['login' => 'Неверный email или пароль.']);
        }

        return redirect()->route('home');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
    
    //forget password
    public function forgotPasswordPage() {
        return view('auth.forgot-password');
    }
    
    public function forgotPasswordStore(Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function resetPasswordPage(Request $request) {
        return view('auth.reset-password', [ 'request' => $request]);
    }

    public function resetPasswordStore(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))->withErrors(['email' => [__($status)]]);
    }
}