<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserLogin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrtor',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'level' => 1,
            ],
            [
                'name' => 'User',
                'email' => 'user@admin.com',
                'password' => bcrypt('123456'),
                'level' => 2,
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
