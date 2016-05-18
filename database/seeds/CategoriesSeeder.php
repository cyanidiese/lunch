<?php

use Illuminate\Database\Seeder;

use App\Models\Categories;

class CategoriesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name_en' => 'First',
                'name_uk' => 'Перше',
                'name_ru' => 'Первое',
            ],
            [
                'name_en' => 'Second',
                'name_uk' => 'Друге',
                'name_ru' => 'Второе',
            ],
            [
                'name_en' => 'Salads',
                'name_uk' => 'Салати',
                'name_ru' => 'Салаты',
            ],
            [
                'name_en' => 'Desserts',
                'name_uk' => 'Десерти',
                'name_ru' => 'Десерты',
            ],
        ];
        foreach($categories as $titles) {
            $category = new Categories();
            $category->name_en = $titles['name_en'];
            $category->name_uk = $titles['name_uk'];
            $category->name_ru = $titles['name_ru'];
            $category->save();
        }

    }

}
