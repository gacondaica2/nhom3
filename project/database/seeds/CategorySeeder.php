<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            array(
                'title' => 'Điện thoại',
                'slug' => \Str::slug('Điện thoại'),
                'status' => 1,
                'parent_id' => 0
            ),
            array(
                'title' => 'Laptop',
                'slug' => \Str::slug('Laptop'),
                'status' => 1,
                'parent_id' => 0
            ),
            array(
                'title' => 'Tablet',
                'slug' => \Str::slug('Tablet'),
                'status' => 1,
                'parent_id' => 0
            ),
            array(
                'title' => 'Phu kiện',
                'slug' => \Str::slug('Phu kiện'),
                'status' => 1,
                'parent_id' => 0
            ),
            array(
                'title' => 'APPLE',
                'slug' => \Str::slug('APPLE'),
                'status' => 1,
                'parent_id' => 1
            ),
            array(
                'title' => 'SAMSUNG',
                'slug' => \Str::slug('SAMSUNG'),
                'status' => 1,
                'parent_id' => 1
            ),
            array(
                'title' => 'OPPO',
                'slug' => \Str::slug('OPPO'),
                'status' => 1,
                'parent_id' => 1
            ),
            array(
                'title' => 'REALME',
                'slug' => \Str::slug('REALME'),
                'status' => 1,
                'parent_id' => 1
            ),
            array(
                'title' => 'ASUS',
                'slug' => \Str::slug('ASUS'),
                'status' => 1,
                'parent_id' => 1
            ),
            array(
                'title' => 'XIAOMI',
                'slug' => \Str::slug('XIAOMI'),
                'status' => 1,
                'parent_id' => 1
            ),
            array(
                'title' => 'VSMART',
                'slug' => \Str::slug('VSMART'),
                'status' => 1,
                'parent_id' => 1
            ),
            array(
                'title' => 'VIVO',
                'slug' => \Str::slug('VIVO'),
                'status' => 1,
                'parent_id' => 1
            ),
            array(
                'title' => 'NOKIA',
                'slug' => \Str::slug('NOKIA'),
                'status' => 1,
                'parent_id' => 1
            ),
            array(
                'title' => 'MACBOOK',
                'slug' => \Str::slug('MACBOOK'),
                'status' => 1,
                'parent_id' => 2
            ),
            array(
                'title' => 'LENOVO',
                'slug' => \Str::slug('LENOVO'),
                'status' => 1,
                'parent_id' => 2
            ),
            array(
                'title' => 'ASUS',
                'slug' => \Str::slug('ASUS'),
                'status' => 1,
                'parent_id' => 2
            ),
            array(
                'title' => 'DELL',
                'slug' => \Str::slug('DELL'),
                'status' => 1,
                'parent_id' => 2
            ),
            array(
                'title' => 'iPad Pro',
                'slug' => \Str::slug('iPad Pro'),
                'status' => 1,
                'parent_id' => 3
            ),
            array(
                'title' => 'iPad 10.2',
                'slug' => \Str::slug('iPad 10.2'),
                'status' => 1,
                'parent_id' => 3
            ),
            array(
                'title' => 'iPad Air',
                'slug' => \Str::slug('iPad Air'),
                'status' => 1,
                'parent_id' => 3
            ),
            array(
                'title' => 'iPad 9.7',
                'slug' => \Str::slug('iPad 9.7'),
                'status' => 1,
                'parent_id' => 3
            ),
            array(
                'title' => 'iPad mini',
                'slug' => \Str::slug('iPad mini'),
                'status' => 1,
                'parent_id' => 3
            ),
            array(
                'title' => 'Huawei',
                'slug' => \Str::slug('Huawei'),
                'status' => 1,
                'parent_id' => 3
            ),
            array(
                'title' => 'Samsung',
                'slug' => \Str::slug('Samsung'),
                'status' => 1,
                'parent_id' => 3
            ),
            array(
                'title' => 'Phụ Kiện Apple',
                'slug' => \Str::slug('Phụ Kiện Apple'),
                'status' => 1,
                'parent_id' => 4
            ),
            array(
                'title' => 'Ốp lưng | Bao da',
                'slug' => \Str::slug('Ốp lưng | Bao da'),
                'status' => 1,
                'parent_id' => 4
            ),
            array(
                'title' => 'Pin dự phòng',
                'slug' => \Str::slug('Pin dự phòng'),
                'status' => 1,
                'parent_id' => 4
            ),
            array(
                'title' => 'Camera',
                'slug' => \Str::slug('Camera'),
                'status' => 1,
                'parent_id' => 4
            ),
            array(
                'title' => 'Gimbal',
                'slug' => \Str::slug('Gimbal'),
                'status' => 1,
                'parent_id' => 4
            ),
            array(
                'title' => 'Dán màn hình',
                'slug' => \Str::slug('Dán màn hình'),
                'status' => 1,
                'parent_id' => 4
            ),
            array(
                'title' => 'Cap sạc',
                'slug' => \Str::slug('Cap sạc'),
                'status' => 1,
                'parent_id' => 4
            ),
            array(
                'title' => 'Thiết bị mạng',
                'slug' => \Str::slug('Thiết bị mạng'),
                'status' => 1,
                'parent_id' => 4
            ),
            array(
                'title' => 'Chuột| Bàn phím',
                'slug' => \Str::slug('Chuột| Bàn phím'),
                'status' => 1,
                'parent_id' => 4
            )
        ]);
    }
}
