<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            insert into users(name, email , password) values ('admin', 'admin@gmail.com', 123456789)
        ");
    }
}
