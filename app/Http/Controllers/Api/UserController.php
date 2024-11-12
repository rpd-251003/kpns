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
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'picture.required' => 'Profile picture is required.',
            'picture.image' => 'The file must be an image.',
            'picture.mimes' => 'Only jpeg, png, jpg, and gif formats are allowed.',
            'picture.max' => 'The profile picture must not be larger than 2MB.',
        ]);

        $user = auth()->user();

        // Delete old profile picture if exists
        if ($user->picture) {
            Storage::disk('public')->delete($user->picture);
        }

        // Store the new profile picture in the public disk under 'profile_pictures'
        $path = $request->file('picture')->store('profile_pictures', 'public');

        // Update user's profile picture path
        $user->picture = $path;
        $user->save();

        return response()->json([
            'message' => 'Profile picture updated successfully.',
            'picture_url' => asset('storage/' . $path)
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
