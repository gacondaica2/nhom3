<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_detail')->insert([
            array(
                'title' => '16GB',
                'option_id'  => '1'
            ),
            array(
                'title' => '6GB',
                'option_id'  => '1'
            ),
            array(
                'title' => '4GB',
                'option_id'  => '1'
            ),
            array(
                'title' => '10GB',
                'option_id'  => '1'
            ),
            array(
                'title' => 'Apple',
                'option_id'  => '2'
            ),
            array(
                'title' => 'Samsung',
                'option_id'  => '2'
            ),
            array(
                'title' => 'Huawei',
                'option_id'  => '2'
            ),
            array(
                'title' => 'Huawei',
                'option_id'  => '2'
            ),
            array(
                'title' => 'Oppo',
                'option_id'  => '2'
            ),
            array(
                'title' => 'Huawei',
                'option_id'  => '2'
            ),
            array(
                'title' => '900',
                'option_id'  => '3'
            ),
            array(
                'title' => '1000',
                'option_id'  => '3'
            ),
            array(
                'title' => '1100',
                'option_id'  => '3'
            ),
            array(
                'title' => '1200',
                'option_id'  => '3'
            ),
            array(
                'title' => '16GB',
                'option_id'  => '4'
            ),
            array(
                'title' => '32GB',
                'option_id'  => '4'
            ),
            array(
                'title' => '64GB',
                'option_id'  => '4'
            ),
            array(
                'title' => '128GB',
                'option_id'  => '4'
            ),
        ]);
    }
}
