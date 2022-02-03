<?php

use Illuminate\Database\Seeder;
   use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_category_names = [
            '本', 'コンピュータ', 'ディスプレイ'
        ];

        $book_categories = [
            'ビジネス', '文学・評論', '人文・思想', 'スポーツ', 
            'コンピュータ・IT', '資格・検定・就職', '絵本・児童書', '写真集',
            'ゲーム攻略本', '雑誌', 'アート・デザイン', 'ノンフィクション' 
        ];

        $computer_categories = [
            'ノートPC', 'デスクトップPC', 'タブレット' 
        ];

        $display_categories = [
            '19~20インチ', 'デスクトップPC', 'タブレット'
        ];

        foreach ($major_category_names as $major_category_name) { //foreach文を使って$major_category_namesの配列から「本」、「コンピュータ」、「ディスプレイ」の要素を取り出すとき
            if($major_category_name == '本'){//もし大項目が「本」の場合には
                foreach($book_categories as $book_category) {//本のカテゴリーから一つずつ要素を取り出して
                    Category::create([//　新しくカテゴリの変数を作って、値を変数に代入する
                        'name' => $book_category, //$book_categoryを'name'に代入
                        'description' => $book_category,//$book_categoryを'description'に代入
                        'major_category_name'=> $major_category_name//$major_category_nameを'major_category_name'に代入
                    ]);
                }
            }
            if($major_category_name == 'コンピュータ'){
                foreach($computer_categories as $computer_category){
                    Category::create([
                        'name'=> $computer_category,
                        'description' => $computer_category,
                        'major_category_name'=> $major_category_name
                    ]);
                }
            }
            if($major_category_name == 'ディスプレイ'){
                foreach($display_categories as $display_category){
                    Category::create([
                        'name'=> $display_category,
                        'description'=> $display_category,
                        'major_category_name'=> $major_category_name

                    ]);
                }
            }
        }
    }
}
