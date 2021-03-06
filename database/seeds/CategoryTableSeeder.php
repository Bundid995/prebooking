<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getCategories());
    }

    private function getCategories(){
    	return
    	[
    		[
    		'id' => 1,
    		'category_name' => 'Steel'],
    		[
    		'id' => 21,
    		'category_name' => 'Cement'],
    		[
    		'id' => 31,
    		'category_name' => 'Wood']
    	];
    }
}
