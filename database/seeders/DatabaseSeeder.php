<?php

namespace Database\Seeders;

use App\Models\Backend\Role;
use Illuminate\Database\Seeder;
use App\Models\Backend\Siteuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        Siteuser::create([
            'name'                  =>      'Biplob Hossen',
            'role_id'               =>      '1',
            'username'              =>      'super_admin',
            'phone'                 =>      '01727475354',
            'email'                 =>      'admin@gmail.com',
            'password'              =>      Hash::make('123456'),
            'gender'                =>      'Male',
            'photo'                 =>      '',
        ]);


        Role::create([
            'name'                  =>      'Super Admin',
            'slug'                  =>      'super-admin',
            'permission'            =>      json_encode(['Dashboard','User','Product','Post','Settings','Order']),
        ]);


    }
}
