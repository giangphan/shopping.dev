<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('trangthai')->insert([
            'tinhtrang' => 'Đơn Hàng Mới'
        ]);
    }
}
