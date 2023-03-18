<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::insert([
            'nama' => 'Yahya Salamudin',
            'email' => 'yahyasalamudin39@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'admin',
            'tanggal_lahir' => '2005-04-20',
            'tempat_lahir' => 'Jember',
            'jenis_kelamin' => 'pria',
            'profile' => 'default.png'
        ]);

        User::insert([
            'nama' => 'Dwi Khusnul Khotimah',
            'email' => 'dwikhusnul632@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'guru',
            'tanggal_lahir' => '2004-12-22',
            'tempat_lahir' => 'Jember',
            'jenis_kelamin' => 'wanita',
            'profile' => 'default.png'
        ]);

        User::insert([
            'nama' => 'Vue Fernandes',
            'email' => 'yahyasalamudin1@gmail.com',
            'password' => Hash::make('password'),
            'level' => 'pelajar',
            'tanggal_lahir' => '2012-05-21',
            'tempat_lahir' => 'Jember',
            'jenis_kelamin' => 'pria',
            'profile' => 'default.png'
        ]);

        Jurusan::insert([
            'jurusan' => 'RPL'
        ]);

        Jurusan::insert([
            'jurusan' => 'MM'
        ]);

        Jurusan::insert([
            'jurusan' => 'TKJ'
        ]);

        Jurusan::insert([
            'jurusan' => 'TKR'
        ]);

        Jurusan::insert([
            'jurusan' => 'TBSM'
        ]);

        Jurusan::insert([
            'jurusan' => 'PPT'
        ]);

        Jurusan::insert([
            'jurusan' => 'APH'
        ]);
    }
}
