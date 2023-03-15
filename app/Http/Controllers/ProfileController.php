<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        return view('user.profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama'          => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'profile' => 'image|max:2048|mimes:jpeg,png,jpg,webp'
        ]);


        if($request->profile == null) {
            $user->update([
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        } else {
            if($user->profile != 'default.png') {
                //hapus old image
                Storage::disk('local')->delete('public/profile/' . $user->profile);
            }

            //upload new image
            $profile = $request->file('profile');
            $profile->storeAs('public/profile', $profile->hashName());

            $user->update([
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'profile' => $profile->hashName()
            ]);
        }

        return redirect()->back();
    }
}
