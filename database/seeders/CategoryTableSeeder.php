<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecords =[
            'id' => 1 , 'parent_id' => 0  , 'section_id' => 2 , 'category_name' => 'Men' , 'category_image' => '' ,'category_discount' => 0,
              'description' => 'You may be impeccably dressed in well-pressed shirts and creased trousers at work, but what if your colleagues or subordinates catch you shopping or running errands wearing an old and faded T-shirt? A smart man ensures that he is not just dressed to impress at work, but at all times, and this includes running small errands. While dress shirts can make you look smart at work.' ,
                'url' => 'man' ,  'meta_title' => 'man' ,  'meta_description' => 'man' ,  'meta_keyword' => 'man clothes' ,  'status' => 1 ,
            'id' => 2 , 'parent_id' => 0  ,'section_id' => 2 , 'category_name' => 'Women' , 'category_image' => '' ,'category_discount' => 0 ,
                'description' => 'You may be impeccably dressed in well-pressed shirts and creased trousers at work, but what if your colleagues or subordinates catch you shopping or running errands wearing an old and faded T-shirt? A smart man ensures that he is not just dressed to impress at work, but at all times, and this includes running small errands. While dress shirts can make you look smart at work.' ,
                  'url' => 'women' ,  'meta_title' => 'women' ,  'meta_description' => 'women' ,  'meta_keyword' => 'women clothes' ,  'status' => 1 ,
            'id' => 3 , 'parent_id' => 0  , 'section_id' => 2 , 'category_name' => 'Kids' , 'category_image' => '' ,'category_discount' => 0 ,
                  'description' => 'You may be impeccably dressed in well-pressed shirts and creased trousers at work, but what if your colleagues or subordinates catch you shopping or running errands wearing an old and faded T-shirt? A smart man ensures that he is not just dressed to impress at work, but at all times, and this includes running small errands. While dress shirts can make you look smart at work.' ,
                    'url' => 'kids' ,  'meta_title' => 'kids' ,  'meta_description' => 'kids' ,  'meta_keyword' => 'kids clothes' ,  'status' => 1 ,
        ];
        Category::insert($categoryRecords);

    }
}
