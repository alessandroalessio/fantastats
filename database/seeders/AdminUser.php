<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Alessandro Alessio',
            'email' => 'a.alessio86@gmail.com',
            'password' => Hash::make('+Amsuria-2186')
        ]);
    }
}
