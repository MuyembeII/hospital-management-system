<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'thandiwe998@gmail.com',
                'name' => 'Thandiwe Lungu',
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'contactnumber' => '0977123321',
                'user_type' => 'System Admin'
            ],
            [
                'email' => 'brucewayne998@gmail.com',
                'name' => 'Bruce Wayne',
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'contactnumber' => '0966987789',
                'user_type' => 'Receptionist'
            ],
            [
                'email' => 'wonderwoman@gmail.com',
                'name' => 'Princess Diana',
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'contactnumber' => '0966987785',
                'user_type' => 'Nurse'
            ],
            [
                'email' => 'theflash@gmail.com',
                'name' => 'Barry Allen',
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'contactnumber' => '0966955785',
                'user_type' => 'Nurse'
            ]
        ];

        User::insert($users);
    }
}
