<?php

namespace App\Http\Controllers;

use App\Components\Auth\AdminStatus;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended(route('home'));
        }

        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            if (!Auth::user()->email_verified) {
                return back()->withErrors([
                    'email_verified' => 'Email is not verified'
                ]);
            }

            if (Auth::user()->status !== AdminStatus::ACTIVE) {
                return back()->withErrors([
                    'status' => 'Profile is not active'
                ]);
            }

            Auth::logoutOtherDevices($credentials['password']);

            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not matched our records.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect()->intended(route('home'));
        }

        return view('register');
    }

    public function store(Request $request, AdminRepository $adminRepository)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password'
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['email_verification_token'] = Hash::make($data['email']);
        $data['status'] = AdminStatus::NEW;

        try {
            $admin = $adminRepository->create($data);
        } catch (Exception $e){

        }

        return redirect()->back()->with('success', 'Thank you for registration! Please check your email for confirmation link');
    }

    public function verify()
    {
        
    }
}
