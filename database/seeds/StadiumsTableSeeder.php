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
                'title' => '明治神宮野球場',
                'place' => '東京都新宿区',
                'latitude' => 35.6744517,
                'longitude' => 139.7171218,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '阪神甲子園球場',
                'place' => '兵庫県西宮市',
                'latitude' => 34.7211300,
                'longitude' => 135.3616863,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '東京ドーム',
                'place' => '東京都文京区',
                'latitude' => 35.7056232,
                'longitude' => 139.7519190,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'MAZDA Zoom-Zoom スタジアム広島',
                'place' => '広島県広島市',
                'latitude' => 34.3913283,
                'longitude' => 132.4842122,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'バンテリンドーム ナゴヤ',
                'place' => '愛知県名古屋市',
                'latitude' => 35.1859541,
                'longitude' => 136.9474156,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '横浜スタジアム',
                'place' => '神奈川県横浜市',
                'latitude' => 35.4433157,
                'longitude' => 139.6400792,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '京セラドーム大阪',
                'place' => '大阪府大阪市',
                'latitude' => 34.6692668,
                'longitude' => 135.4760877,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'ZOZOマリンスタジアム',
                'place' => '千葉県千葉市',
                'latitude' => 35.6450830,
                'longitude' => 140.0307866,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '楽天生命パーク宮城',
                'place' => '宮城県仙台市',
                'latitude' => 38.2564244,
                'longitude' => 140.9025328,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '福岡PayPayドーム',
                'place' => '福岡県福岡市',
                'latitude' => 33.5953448,
                'longitude' => 130.3620383,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '札幌ドーム',
                'place' => '北海道札幌市',
                'latitude' => 43.0151270,
                'longitude' => 141.4097070,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'メットライフドーム',
                'place' => '埼玉県所沢市',
                'latitude' => 35.7684133,
                'longitude' => 139.4205275,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
