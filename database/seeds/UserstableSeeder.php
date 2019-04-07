<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'      =>   'admin',
            'email'     =>   'admin@forum.dev',
            'password'  =>    bcrypt('admin'),
            'admin'     =>   1,
            'avatar'    =>    asset('avatar\avatar.png')
        ]);

        App\User::create([
            'name'      =>   'tul',
            'email'     =>   'tul@forum.dev',
            'password'  =>    bcrypt('tul'),
            'avatar'    =>    asset('avatar\avatar.png')
        ]);
    }
}
