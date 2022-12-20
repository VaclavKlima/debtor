<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserProfileController extends Controller
{
    public function edit(): View
    {
        abort_if(auth()->guest(), 403);

        return view('user-profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function update(UserProfileUpdateRequest $request): RedirectResponse
    {
        abort_if(auth()->guest(), 403);

        $user = auth()->user();
        $user->update($request->validated());

        if ($request->hasFile('profile_image')) {
            $user->media->each->delete();
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }

        return redirect()->route('user-profile.edit')
            ->with('success', trans('global.user_profile_updated'));
    }
}
