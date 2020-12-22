<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = "iPhone 11 chính hãng VN/A – Chiếc điện thoại nhiều màu sắc, camera nâng cấp
        iPhone 11 là model có nhiều màu sắc nhất và có giá rẻ nhất trong bộ 3 iPhone 11 series được Apple ra mắt trong năm 2019. Bên cạnh đó, cấu hình iPhone 11 cũng được nâng cấp đặc biệt về cụm camera sau và Face ID, viên pin dung lượng lớn hơn.       
        Đa dạng sự lựa chọn với 6 phiên bản màu sắc
        Điểm nổi bật của iPhone 11 2019 đó là bên cạnh hai phiên bản đen và trắng quen thuộc thì máy còn có thêm bốn phiên bản khác đó là tím, vàng, xanh lá, đỏ. Với tất cả các phiên bản, bao gồm cả điện thoại iPhone 12 sắp ra mắt thì Apple đều thiết kế cạnh bên trùng màu với thân máy, tạo nên một thể thống nhất.";
        $description = 'iPhone 11 chính hãng VN/A – Chiếc điện thoại nhiều màu sắc, camera nâng cấp';   
        DB::table('product')->insert([
            array(
                'title' => 'iPhone 12 Pro Max Chính Hãng (VN/A)',
                'slug' => \Str::slug('iPhone 12 Pro Max Chính Hãng (VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 30990000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 1,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'iPhone 12 Chính Hãng (VN/A)',
                'slug' => \Str::slug('iPhone 12 Chính Hãng (VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 3,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'iPhone 12 Pro Chính Hãng (VN/A)',
                'slug' => \Str::slug('iPhone 12 Pro Chính Hãng (VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 30990000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 4,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'iPhone 11 Chính hãng (VN/A)',
                'slug' => \Str::slug('iPhone 11 Chính hãng (VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 17000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 5,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'iPhone 12 Mini Chính hãng (VN/A)',
                'slug' => \Str::slug('iPhone 12 Mini Chính hãng (VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 6,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'iPhone 11 Pro Max Chính hãng (VN/A)',
                'slug' => \Str::slug('iPhone 11 Pro Max Chính hãng (VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 7,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Apple iPhone XR 64GB Chính hãng (VN/A)',
                'slug' => \Str::slug('Apple iPhone XR 64GB Chính hãng (VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 7,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Apple iPhone 8 Plus 128GB Chính hãng (mã VN/A)',
                'slug' => \Str::slug('Apple iPhone 8 Plus 128GB Chính hãng (mã VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 8,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'iPhone 11 128GB Chính hãng (VN/A)',
                'slug' => \Str::slug('iPhone 11 128GB Chính hãng (VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 9,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'iPhone 11 Pro Chính hãng (VN/A)',
                'slug' => \Str::slug('iPhone 11 Pro Chính hãng (VN/A)'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 10,     
                'category_id' => 2,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Apple MacBook Air 13 256GB 2020 Chính Hãng Apple Việt Nam',
                'slug' => \Str::slug('Apple MacBook Air 13 256GB 2020 Chính Hãng Apple Việt Nam'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 11,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Surface Pro 7 Core i5 / 8GB / 128GB Chính Hãng',
                'slug' => \Str::slug('Surface Pro 7 Core i5 / 8GB / 128GB Chính Hãng'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 12,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Apple Macbook Pro 13 Touch Bar i5 1.4 256GB 2020 Chính Hãng Apple Việt Nam',
                'slug' => \Str::slug('Apple Macbook Pro 13 Touch Bar i5 1.4 256GB 2020 Chính Hãng Apple Việt Nam'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 13,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Laptop ASUS VivoBook Flip TP412FA',
                'slug' => \Str::slug('Laptop ASUS VivoBook Flip TP412FA'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 14,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Laptop ASUS VivoBook A512FL-EJ251',
                'slug' => \Str::slug('Laptop ASUS VivoBook A512FL-EJ251'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 15,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Laptop HP Pavilion x360 NEW 2020 14-DW0060TU 195M8PA',
                'slug' => \Str::slug('Laptop HP Pavilion x360 NEW 2020 14-DW0060TU 195M8PA'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 16,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Laptop Lenovo Gaming L340-15IRH 81LK01J3VN',
                'slug' => \Str::slug('Laptop Lenovo Gaming L340-15IRH 81LK01J3VN'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 17,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Apple MacBook Air 13 inch 128GB MQD32 Chính Hãng Apple Việt Nam',
                'slug' => \Str::slug('Apple MacBook Air 13 inch 128GB MQD32 Chính Hãng Apple Việt Nam'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 18,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Laptop ASUS VivoBook S433EA',
                'slug' => \Str::slug('Laptop ASUS VivoBook S433EA'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 19,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
            array(
                'title' => 'Laptop Lenovo Ideapad Slim 3 14ARE05 81W30058VN',
                'slug' => \Str::slug('Laptop Lenovo Ideapad Slim 3 14ARE05 81W30058VNcls'),
                'sku' => 'IP01',
                'price_sale' => 19900000,
                'price' => 21000000,
                'qty' => 100,
                'content' => $content,
                'weight' => 1,
                'height' => 1,
                'width' => 1,
                'avatar_id' => 20,     
                'category_id' => 1,
                'description' => $description,
                'status'    => 1
            ),
        ]);
    }
}
