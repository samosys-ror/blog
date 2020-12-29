<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserSeeder extends Seeder
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
		$admin=Role::where('name','Admin')->first();
		$Customer=Role::where('name','Customer')->first();



		$adm=User::create([
		 'name'=>'admin',
		  'lname'=>'user',
		  'username'=>'samosys',
		  'mobile'=>'885458755',
		  'phone'=>'7595846718',
		 'email'=>'rajkumarmp2017@gmail.com',
		 'password'=>Hash::make('admin123')
		
		
		]);

       	$cst=User::create([
		 'name'=>'Customer',
		  'lname'=>'user',
		  'username'=>'customer',
		  'mobile'=>'885458755',
		  'phone'=>'7595846718',
		 'email'=>'test@gmail.com',
		 'password'=>Hash::make('admin123')
		
		
		]);		


		 $adm->roles()->attach($admin);	
	    $cst->roles()->attach($Customer);		
    }
}
