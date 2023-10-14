<?php

namespace Modules\Quiz\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Quiz\Entities\Interest;

class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Interest::insert([
            [
                'name'=>'Fashion',
                'parent_id'=>null,
            ],
            [
                'name'=>'Mens Fashion',
                'parent_id'=>1,
            ],
            [
                'name'=>'Female Fashion',
                'parent_id'=>1,
            ],
            [
                'name'=>'Trends',
                'parent_id'=>1,
            ],
            [
                'name'=>'Skin Care',
                'parent_id'=>1,
            ],
            [
                'name'=>'Grooming',
                'parent_id'=>1,
            ],
            [
                'name'=>'Discount / Sales',
                'parent_id'=>1,
            ],
            [
                'name'=>'Luxury Goods',
                'parent_id'=>1,
            ],
            [
                'name'=>'Accessories',
                'parent_id'=>1,
            ],
            [
                'name'=>'Technology',
                'parent_id'=>null,
            ],
            [
                'name'=>'Travel',
                'parent_id'=>null,
            ],
            [
                'name'=>'Food & Drink',
                'parent_id'=>null,
            ],
            [
                'name'=>'Gaming',
                'parent_id'=>null,
            ],
            [
                'name'=>'Healthy Living',
                'parent_id'=>null,
            ],
            [
                'name'=>'Gambling',
                'parent_id'=>null,
            ],
            [
                'name'=>'Business',
                'parent_id'=>null,
            ]
        ]);

        // $this->call("OthersTableSeeder");
    }
}
