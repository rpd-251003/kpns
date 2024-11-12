<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Function to add or update profile picture
    public function addProfilePicture(Request $request)
    {
        $request->validate([
            'pricture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'pricture.required' => 'Profile picture is required.',
            'pricture.image' => 'The file must be an image.',
            'pricture.mimes' => 'Only jpeg, png, jpg, and gif formats are allowed.',
            'pricture.max' => 'The profile picture must not be larger than 2MB.',
        ]);

        $user = Auth::user();

        // Delete old profile picture if exists
        if ($user->pricture) {
            Storage::delete($user->pricture);
        }

        // Store new profile picture
        $path = $request->file('pricture')->store('prictures');

        // Update user's profile picture path
        $user->pricture = $path;
        $user->save();

        return response()->json([
            'message' => 'Profile picture updated successfully.',
            'pricture_url' => Storage::url($path)
        ], 200);
    }

    // Function to change password
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'old_password.required' => 'The old password is required.',
            'new_password.required' => 'The new password is required.',
            'new_password.min' => 'The new password must be at least 8 characters long.',
            'new_password.confirmed' => 'The new password confirmation does not match.',
        ]);

        $user = Auth::user();

        // Check if the old password matches
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'message' => 'Old password is incorrect.'
            ], 400);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'message' => 'Password updated successfully.'
        ], 200);
    }
}
