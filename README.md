# TNP Rénovation — Tuyển dụng

Website PHP thuần, HTML và CSS, không cần Composer, Node.js hoặc MySQL khi chạy trên hosting. Mã dùng cú pháp PHP 7.4 trở lên; chọn phiên bản PHP còn được GoDaddy hỗ trợ và kiểm tra trước khi đưa lên production.

## Cấu trúc

- `index.php`: điểm vào, tải cấu hình và dữ liệu rồi gọi view.
- `config/company.php`: thông tin công ty và liên hệ.
- `app/Models/Recruitment.php`: nội dung công việc và quyền lợi từ poster cung cấp.
- `views/recruitment.php`: trang tuyển dụng; header/footer trong `views/partials`.
- `assets/css/site.css`: giao diện responsive.
- `assets/images`: bản sao logo và danh thiếp gốc.

Chưa có tầng truy cập dữ liệu vì không có cơ sở dữ liệu. Nội dung tĩnh không cần tầng nghiệp vụ riêng. Khi bổ sung chức năng phải giữ xử lý dữ liệu ngoài view. Các mục dự án, nhận xét khách hàng, báo giá và giới thiệu chưa triển khai.

## Chạy cục bộ

Tại thư mục dự án: `php -S 127.0.0.1:8080`. Mở `http://127.0.0.1:8080`.

## Triển khai thủ công lên GoDaddy cPanel

1. Sao lưu website hiện có trước khi chép tệp. Chọn PHP phù hợp trong cPanel.
2. Chép `index.php`, `favicon.svg`, `.htaccess`, các thư mục `config`, `app`, `views`, `assets` vào document root của domain (thường là `public_html`). Không cần chép tài liệu, poster/danh thiếp gốc ở thư mục gốc hoặc metadata phát triển.
3. Bật hiển thị tệp ẩn trong File Manager để kiểm tra các tệp `.htaccess` trong thư mục con đã được chép. Chúng ngăn truy cập trực tiếp mã cấu hình và view trên Apache.
4. Mở trang bằng HTTPS, kiểm tra giao diện điện thoại, liên kết gọi điện, mở email, danh thiếp và các liên kết cuộn trang. Kiểm tra `/config/company.php` và `/views/recruitment.php` trả về 403.

Chưa có gửi email phía máy chủ, lưu hồ sơ hoặc upload CV. Nút email dùng `mailto:` để mở ứng dụng email của người dùng; người dùng tự đính kèm CV và gửi. Không có biểu mẫu POST nên chưa phát sinh luồng CSRF. Không có thông tin bí mật trong cấu hình hiện tại.

Đã cấu hình GitHub Actions để deploy qua FTPS khi push lên `main`; xem [hướng dẫn cấu hình](docs/DEPLOYMENT.md). Kết nối TLS và ánh xạ thư mục FTP đã được xác minh với subdomain TNP. Kiểm tra kết quả deploy trong GitHub Actions. Khôi phục bằng bản sao lưu nếu cần rollback; không có migration cơ sở dữ liệu.
