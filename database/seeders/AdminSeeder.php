<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name="admin";
        $user->email="admin@gmail.com";
        $user->password=bcrypt("admin");
        $user->save();
    }
}
