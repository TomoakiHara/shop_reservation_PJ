<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'HaraTomoaki',
            'email' => 'abc.gmail.com',
            'password' => '123456789',
        ];
        User::create($param);
    }
}
