<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   public function store(Request $request): RedirectResponse
{
    $data = $request->validate([
        'name'         => ['required','string','max:255'],
        'email'        => ['required','string','email','max:255','unique:'.User::class],
        'password'     => ['required','confirmed', Rules\Password::defaults()],
        'mobile'       => ['required','string','max:15'],
        'company_name' => ['nullable','string','max:255'],
        'profile_image'=> ['nullable','max:2048'],
    ]);

    $profilePath = null;
    if ($request->hasFile('profile_image')) {
        // Laravel 12 style: storage/app/public/profile_images/<file>
        $profilePath = $request->file('profile_image')->store('profile_images', 'public');
    }

    $user = User::create([
        'name'         => $data['name'],
        'email'        => $data['email'],
        'password'     => Hash::make($data['password']),
        'mobile'       => $data['mobile'],
        'company_name' => $data['company_name'] ?? '',
        'profile_image'=> $profilePath,
    ]);

    event(new Registered($user));
    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}

}
