// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'sunny',
        'username' => 'sunny',
        'email'    => 'sunny@gmail.com',
        'password' => Hash::make('123456'),
    ));
}

}