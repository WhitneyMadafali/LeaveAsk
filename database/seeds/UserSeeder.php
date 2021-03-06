<?php

use App\User;
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
        
 $users = [
        [
            'name' => 'Imali Susan',
            'email' => 'susanimali@gmail.com',
            'avatar'=> 'avatar.png',
            'phone' => '0772045689',
            'role' => 'Employee',
            'department'=> 'Information Technology',
            'password' => bcrypt('123456'),
        ], 
        [
            'name' => 'Malachi Moore',
            'email' => 'malachimoore@mailinator.com',
            'avatar'=> 'avatar.png',
            'phone' => '0772045689',
            'role' => 'Employee',
            'department'=> 'Finance',
            'password' => bcrypt('123456'),
        ],
        [
            'name' => 'Anthony Campbell',
            'email' => 'anthonycampbelli@mailinator.com',
            'avatar'=> 'avatar.png',
            'phone' => '0772045689',
            'role' => 'Employee',
            'department'=> 'Sales',
            'password' => bcrypt('123456'),
        ],
        [
            'name' => 'Nora Molina',
            'email' => 'noramolina@mailinator.com',
            'avatar'=> 'avatar.png',
            'phone' => '0772045689',
            'role' => 'Employee',
            'department'=> 'Cleaning',
            'password' => bcrypt('123456'),
        ],
        [
            'name' => 'Imani Hinton',
            'email' => 'imanihinton@mailinator.com',
            'avatar'=> 'avatar.png',
            'phone' => '0772045689',
            'role' => 'Employee',
            'department'=> 'Catering',
            'password' => bcrypt('123456'),
        ],
        [
            'name' => 'Abra Byers',
            'email' => 'abrabyers@mailinator.com',
            'avatar'=> 'avatar.png',
            'phone' => '0772045689',
            'role' => 'Employee',
            'department'=> 'Finance',
            'password' => bcrypt('123456'),
        ],
        [
            'name' => 'Geraldine Luna',
            'email' => 'geraldineluna@mailinator.com',
            'avatar'=> 'avatar.png',
            'phone' => '0772045689',
            'role' => 'Administrator',
            'department'=> 'Administration',
            'password' => bcrypt('123456'),
        ]
        ];
    
    foreach($users as $user)
          {
              User::create([
               'name' => $user['name'],
               'email' => $user['email'],
               'avatar' => $user['avatar'],
               'phone' => $user['phone'],
               'role' => $user['role'],
               'department' => $user['department'],
               'password' => $user['password']
             ]);
           }
    }
}
