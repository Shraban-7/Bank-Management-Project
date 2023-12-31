<?php

namespace App\Http\Controllers;

use App\Models\Docs;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function edit(Request $request): View
    {
        $documents_query = Docs::where('user_id', Auth::user()->id);
        $categories = Category::all();

        if (request()->file_title) {
            $documents_query->where('docs_title', 'LIKE', '%' . request()->file_title . '%');
        }

        if (request()->category_id) {
            $documents_query->where('category_id', request()->category_id);
        }

        $documents=$documents_query->paginate(5);
        $user = $request->user();
        return view('layouts.profile', compact('user', 'documents','categories'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
