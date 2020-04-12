<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
        	'name' => 'Admin',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('12345678')
        ]);

        $author = User::create([
        	'name' => 'Author',
        	'email' => 'author@author.com',
        	'password' => Hash::make('12345678')
        ]);

        $user = User::create([
        	'name' => 'User',
        	'email' => 'user@user.com',
        	'password' => Hash::make('12345678')
        ]);

        $user->roles()->attach($userRole);
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);

	    

    }
}
