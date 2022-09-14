<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
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
        'username' => 'admin',
        'name' => 'Adminnya',
        'email' => 'admin@gmail,com',
        'level' => 'admin',
        'password' => bcrypt('admin123'),
        ],
        [
        'username' => 'guru',
        'name' => 'guru',
        'email' => 'guru@gmail,com',
        'level' => 'editor',
        'password' => bcrypt('123456'),
        ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        } 
    }
}
