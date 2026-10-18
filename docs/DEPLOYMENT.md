# GitHub → GoDaddy

Workflow `.github/workflows/deploy-godaddy.yml` chạy khi push lên `main` hoặc chạy thủ công trong GitHub Actions. Đích website: https://tnprenovation.vietcanadianlive.com/.

## Cấu hình bắt buộc trước lần deploy đầu

Đã xác nhận explicit FTPS qua cổng 21 với hostname `p3plzcpnl503791.prod.phx3.secureserver.net`, chứng chỉ TLS hợp lệ. Document Root trong cPanel là `/home/xxkttpus7wla/public_html/tnprenovation.vietcanadianlive.com`. Tài khoản FTP nhìn thư mục này tại `/`: đã đối chiếu nội dung `test.html` tải từ FTPS với HTTPS của subdomain và xác nhận trùng nhau. Kết nối mã hóa cả điều khiển và dữ liệu, không tự chuyển sang FTP không mã hóa.

1. Trong cPanel → Domains, tìm đúng subdomain và ghi lại Document Root. Không mặc định dùng `public_html` vì có thể là thư mục của website khác.
2. Trong cPanel → FTP Accounts, tạo tài khoản riêng giới hạn vào đúng Document Root của TNP. Lấy FTP hostname từ cấu hình kết nối do hosting cung cấp, không mặc định hostname là subdomain. Chứng chỉ TLS phải hợp lệ với hostname.
3. Tạo environment `production` tại GitHub repository → Settings → Environments. Thêm các Environment Secrets bên dưới (Repository Secrets cùng tên cũng được hỗ trợ):

| Secret | Giá trị |
| --- | --- |
| `GODADDY_FTP_HOST` | Hostname FTPS do GoDaddy cung cấp, không có `https://` |
| `GODADDY_FTP_USERNAME` | Tên đăng nhập FTP đầy đủ |
| `GODADDY_FTP_PASSWORD` | Mật khẩu FTP |
| `GODADDY_FTP_DIRECTORY` | Đường dẫn đúng nhìn từ tài khoản FTP; `/` nếu tài khoản bị giới hạn ngay tại thư mục website |

Không đưa mật khẩu vào code hoặc tài liệu. Không bật required reviewers nếu muốn tự động deploy ngay sau push. Workflow sẽ thất bại trước kết nối nếu chưa có đủ Secrets.

4. Sao lưu bản website đang có bằng cPanel trước lần chạy đầu. Xác nhận tài khoản FTP nhìn đúng thư mục website.
5. Vào Actions → Deploy PHP website to GoDaddy → Run workflow → main. Sau khi thành công, các lần push `main` tiếp theo tự deploy.

## Luồng xử lý

- Checkout source, kiểm tra cú pháp PHP trên runner GitHub, kiểm tra danh sách tệp.
- Upload `.htaccess`, favicon, `app`, `config`, `views`, `assets`, cuối cùng `index.php`. Thư mục đích bắt buộc tồn tại; script không tự tạo đích gốc.
- Không upload `.git`, `.github`, tài liệu, script deploy hay tài liệu tham khảo gốc. Không xóa tệp trên hosting.
- Các lần deploy chạy tuần tự. Upload ghi đè các tệp cùng tên và không có chuyển phiên bản nguyên tử; nếu mất kết nối, hosting có thể chứa tệp của hai phiên bản. Chạy lại sau khi khắc phục hoặc khôi phục bản sao lưu cPanel.
- Sau upload, kiểm tra HTTPS trang chủ có tham chiếu CSS header và favicon tải thành công. Đây là kiểm tra cơ bản, không xác nhận từng byte hay tất cả hành vi ứng dụng.

Python chỉ chạy trên GitHub Actions, dùng thư viện chuẩn, không cài Python lên GoDaddy. Hosting vẫn chỉ cần PHP và Apache. Phiên bản PHP của runner không thay thế việc kiểm tra PHP thực tế trên hosting.

## Kiểm tra local

`python scripts/deploy_ftps.py --check` chỉ kiểm tra danh sách file, không kết nối hosting.

## Trạng thái

Đã cấu hình đủ bốn GitHub Repository Secrets cho hostname, tài khoản, mật khẩu và thư mục `/`. Workflow production dùng các Secrets này. Xem kết quả từng lần deploy trong tab Actions của repository.

Lần chạy push `main` 39158462309 đã hoàn tất thành công, bao gồm upload và kiểm tra HTTPS. Truy cập trực tiếp các tệp PHP trong config, views và app đã được kiểm tra và trả HTTP 403.
