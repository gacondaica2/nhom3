<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option')->insert([
            array(
                'title' => 'ram',
                'type'  => 'ram'
            ),
            array(
                'title' => 'manufacturer',
                'type'  => 'manufacturer'
            ),
            array(
                'title' => 'size',
                'type'  => 'size'
            ),
            array(
                'title' => 'internalmemory',
                'type'  => 'internalmemory'
            ),
        ]);
    }
}
