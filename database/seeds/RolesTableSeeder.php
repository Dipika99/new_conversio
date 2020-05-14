<?php
use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = 
        [
    		[
	        	'name'=>'Superadmin',
	        	'slug'=>'superadmin',
	        	'description'=>'This is super admin role.',
        	],[
	        	'name'=>'Client',
	        	'slug'=>'client',
	        	'description'=>'This is client role.',
        	],[
	        	'name'=>'SEO Specialist',
	        	'slug'=>'sem-specialist',
	        	'description'=>'This is seo specialist role.',
        	],[
	        	'name'=>'SEO Specialist',
	        	'slug'=>'seo-specialist',
	        	'description'=>'This is customer role.',
        	],[
	        	'name'=>'SoMe Specialist',
	        	'slug'=>'some-specialist',
	        	'description'=>'This is some specialist role.',
        	],[
	        	'name'=>'Ehandelsudvikler',
	        	'slug'=>'ehandelsudvikler',
	        	'description'=>'This is ehandelsudvikler role.',
        	],
    	];

    	foreach ($roles as $data) {
	    	Role::create($data);
    	}
    }
}
