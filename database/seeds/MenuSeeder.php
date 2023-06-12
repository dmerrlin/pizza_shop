<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
                'filename' => '1.jpg',
                'price' =>'649',
                'name' => 'Карбонара',
                'info' => 'Грудинка, сладкий перец, лук репчатый, сыр пармезан и моцарелла, яйцо, соус сметанный'
            ]
        );

        DB::table('menus')->insert([
                'filename' => '2.jpg',
                'price' =>'349',
                'name' => 'Маргарита сырная',
                'info' => 'Томаты, сыр моцарелла, соус томатный'
            ]
        );

        DB::table('menus')->insert([
                'filename' => '3.jpg',
                'price' =>'349',
                'name' => 'Пепперони',
                'info' => 'Колбаса пепперони, сыр моцарелла, соус томатный'
            ]
        );

        DB::table('menus')->insert([
                'filename' => '4.jpg',
                'price' =>'389',
                'name' => 'Пицца с ветчиной и сыром',
                'info' => 'Ветчина, сыр моцарелла, соус томатный'
            ]
        );

        DB::table('menus')->insert([
                'filename' => '5.jpg',
                'price' =>'399',
                'name' => 'Охотничья',
                'info' => 'Охотничьи колбаски, куриное филе, грудинка, шампиньоны, сыр моцарелла, соус томатный, майонез'
            ]
        );

        DB::table('menus')->insert([
                'filename' => '6.jpg',
                'price' =>'405',
                'name' => 'Гавайская',
                'info' => 'Куриное филе, ананасы, сыр моцарелла, соусы сметанный и сладкий чили 390г/ 500г/ 650г'
            ]
        );
    }
}
