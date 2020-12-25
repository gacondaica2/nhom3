# nhom3

Các bước cài đặt:

1. Clone project về máy.
2. Cấu hình file .env.
3. Chạy lệnh "composer update" để cài đặt vendor và cập nhật composer.
4. Chạy lệnh "composer dumpautoload".
5. Chạy lệnh "php artisan key:generate" để tạo app key.
6. Mở cơ sở dữ liệu muốn lưu trữ. Chạy lệnh "php artisan migrate" để cài đặt cơ sở dữ liệu (nếu có).
7. Chạy lệnh "php artisan serve" để mở server.

Lúc này, project của bạn đang chạy trên localhost:8000.
