<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'thandiwe998@gmail.com',
                'name' => 'Thandiwe Lungu',
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'contactnumber' => '0977123321',
                'user_type' => 'admin'
            ],
            [
                'email' => 'brucewayne998@gmail.com',
                'name' => 'Bruce Wayne',
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'contactnumber' => '0966987789',
                'user_type' => 'receptionist'
            ],
            [
                'email' => 'wonderwoman@gmail.com',
                'name' => 'Princess Diana',
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'contactnumber' => '0966987785',
                'user_type' => 'doctor'
            ],
            [
                'email' => 'theflash@gmail.com',
                'name' => 'Barry Allen',
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'contactnumber' => '0966955785',
                'user_type' => 'pharmarcist'
            ]
        ])
    }
}
