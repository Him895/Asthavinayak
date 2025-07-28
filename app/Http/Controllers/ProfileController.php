<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile view-only page.
     */


    /**
     * Show the edit form.
     */
     public function showprofileform() {
        $user = Auth::user();
        return view('profile.partials.show', compact('user'));
    }

    public function edit() {

        return view('profile.edit', ['user' => Auth::user()]
    );

    }

    public function update(ProfileUpdateRequest $request)
{
    $user = $request->user();

    if ($request->hasFile('profile_image')) {
        $file = $request->file('profile_image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('profile_images', $filename, 'public');
        $user->profile_image = $path;  // Only store path, not file object
    }

    // Exclude file field from fill if using fill()
    $user->fill($request->except('profile_image'));

    $user->save();

    return redirect()->route('profile.edit')->with('status', 'profile-updated');
}



    public function destroy(Request $request): RedirectResponse {
        $request->validateWithBag('userDeletion', [
            'password' => ['required','current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
