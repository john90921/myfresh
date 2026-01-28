<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * ProfileController
 * Manages user profile operations - view, update, and delete
 */
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     * If email is changed, reset email verification status
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Fill user model with validated data
        $request->user()->fill($request->validated());

        // Reset email verification if email was changed
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Save the updated user profile
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     * Requires password confirmation for security
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate password before account deletion
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Log out the user
        Auth::logout();

        // Delete the user account
        $user->delete();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to home page
        return Redirect::to('/');
    }
}
