<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'Admin 1';
        $user->fname = 'Admin';
        $user->lname = 'One';
        $user->password = Hash::make('12345');
        $user->email = 'admin@admin.com';
        $user->city = 'Thika';
        $user->Address = 'Maboutheen City After Tharwat Bridge';
        $user->gender = 'M';
        $user->Bdate = '1996-11-01';
        $user->privilage = 'admin';

        $user->save();


        $user = new User();
        $user->username = 'User1';
        $user->fname = 'User';
        $user->lname = 'One';
        $user->password = Hash::make('12345');
        $user->email = 'user@user.com';
        $user->city = 'Mombasa';
        $user->Address = 'Maboutheen City After Tharwat Bridge';
        $user->gender = 'M';
        $user->Bdate = '1996-11-01';
        $user->privilage = 'customer';

        $user->save();

        $user = new User();
        $user->username = 'Manager 1';
        $user->fname = 'Manager';
        $user->lname = 'One';
        $user->password = Hash::make('12345');
        $user->email = 'manager@manager.com';
        $user->city = 'Nairobi';
        $user->Address = 'Maboutheen City After Tharwat Bridge';
        $user->gender = 'M';
        $user->Bdate = '1996-11-01';
        $user->privilage = 'Manager';

        $user->save();
    }
}
