# Tiến độ TNP Rénovation

## 2026-10-18

- Chuẩn bị GitHub Actions cho push main và chạy thủ công, kiểm tra PHP rồi upload FTPS.
- Chỉ upload các tệp website; credentials lấy từ GitHub Secrets, không xóa tệp hosting.
- Đã xác minh hostname FTPS có chứng chỉ hợp lệ và thư mục `/` của tài khoản ánh xạ đúng Document Root TNP bằng đối chiếu `test.html` qua FTPS/HTTPS.
- Đã thiết lập đủ GitHub Secrets và khởi chạy workflow deploy production.
- Workflow push main 39158462309 đã deploy FTPS và kiểm tra HTTPS thành công. Trang chủ, CSS header và favicon trả HTTP 200; truy cập trực tiếp config, views và app trả HTTP 403.

## 2026-10-17

- Tạo website PHP thuần, ưu tiên tuyển dụng theo poster và danh thiếp được cung cấp.
- Tách cấu hình, model nội dung, view và CSS; không thêm dependency hoặc database.
- Liên hệ ứng tuyển bằng điện thoại/email, không lưu hồ sơ và không gửi email máy chủ.
- Dự án, nhận xét, báo giá và giới thiệu là phạm vi bổ sung sau, chưa triển khai.
- Chưa triển khai lên GoDaddy; cấu hình hosting thực tế chưa được xác minh.

- Kiểm tra: 6 tệp PHP vượt qua php -l; index.php render HTML thành công. Trang và 3 asset trả HTTP 200 trên PHP 8.4.22 tại localhost:8765. Chưa kiểm tra trực quan bằng trình duyệt hoặc quy tắc Apache trên GoDaddy.
