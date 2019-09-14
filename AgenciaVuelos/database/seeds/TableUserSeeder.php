<?php

use Illuminate\Database\Seeder;
use App\User;

class TableUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Luis';
        $user->email = 'luiszapato@gmail.com';
        $user->password= bcrypt('lozy123');
        $user->save();
    }
}
