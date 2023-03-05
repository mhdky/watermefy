<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SetingController extends Controller
{
    public function edit(Request $request) {
        $user = $request->user();
        return view('admin.setting.index', [
            'title' => 'Watermefy - Admin Setting',
            'user' => $user
        ]);
    }

    public function update(Request $request) {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'avatar' => 'nullable|image|mimes:jpg,png|max:1080'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('public/avatars');
            if (!empty($user->avatar)) {
                Storage::delete($user->avatar);
            }
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('user.edit')->with('sukses', 'Data berhasil diupdate');
    }

    public function updatePassword(Request $request) {
        $user = Auth::user();

        $validatedData = $request->validate([
            'current_password' => 'required|min:1|max:255',
            'password' => 'required|string|min:8|max:200|confirmed',
        ]);

        $currentPassword = $request->input('current_password');

        // Validasi current password
        if (!Hash::check($currentPassword, $user->password)) {
            return redirect()->route('user.edit')->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('user.edit')->with('sukses', 'Password berhasil diupdate');
    }
}
