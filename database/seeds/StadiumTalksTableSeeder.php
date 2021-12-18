<?php

use Illuminate\Database\Seeder;

class StadiumTalksTableSeeder extends Seeder
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
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '阪神甲子園球場',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '東京ドーム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'MAZDA Zoom-Zoom スタジアム広島',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'バンテリンドーム ナゴヤ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '横浜スタジアム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '京セラドーム大阪',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'ZOZOマリンスタジアム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '楽天生命パーク宮城',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '福岡PayPayドーム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '札幌ドーム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'メットライフドーム',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
