<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User = User::where('email','admin@gmail.com')->first();
        if(empty($User)){
            $result = User::create(
                    array(
                        'name' => 'admin',                      
                        'email'     => 'admin@gmail.com',                    
                        'password'  => bcrypt('admin'),
                        'role'      => 'admin',
                       // 'api_token' => Str::random(60),  
                    )
            );              

        }
    }
}
