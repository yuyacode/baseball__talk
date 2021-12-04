<?php

use Illuminate\Database\Seeder;

class StadiumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stadiums')->insert([
            [
                'name' => '明治神宮野球場',
                'place' => '東京都新宿区',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '阪神甲子園球場',
                'place' => '兵庫県西宮市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '東京ドーム',
                'place' => '東京都文京区',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'MAZDA Zoom-Zoom スタジアム広島',
                'place' => '広島県広島市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'バンテリンドーム ナゴヤ',
                'place' => '愛知県名古屋市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '横浜スタジアム',
                'place' => '神奈川県横浜市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '京セラドーム大阪',
                'place' => '大阪府大阪市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'ZOZOマリンスタジアム',
                'place' => '千葉県千葉市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '楽天生命パーク宮城',
                'place' => '宮城県仙台市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '福岡PayPayドーム',
                'place' => '福岡県福岡市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => '札幌ドーム',
                'place' => '北海道札幌市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'メットライフドーム',
                'place' => '埼玉県所沢市',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
