# website_ban_hang_nhom_8

Dự án 1

# Quy trình sử dụng git

# Đẩy code lên git:

git clone
git add .
git commit -m "update"
git push

# Tạo nhánh phụ:

git checkout -b hoppv04: tạo một nhánh phụ có tên hoppv04
git pull origin main: cập nhật nhánh hiện tại
git commit -m "update": tạo một commit mới để theo dõi lịch sử
git push origin head: thay đổi nhánh hiện tại

# Update code lên nhánh phụ:

git add .
git commit -m "update"
git push origin head: đẩy commit từ nhánh hiện tại

# Update code từ nhánh phụ lên nhánh chính:

git checkout main: chuyển đến nhánh có tên là main
git pull origin main: cập nhật nhánh chính từ git
git merge hoppv04: cập nhật thay đổi từ nhánh hoppv04 sang main
git commit -m "update": chuyển code mới cập nhật hoppv04 vào main
git push origin main: đẩy code từ nhánh main -> git

# Khôi phục file đã xoá

git status: kiểm tra trạng thái
git restore tên file cần khôi phục: vd: git restore index.html
git restore . : khôi phục toàn bộ file đã xoá

# Khi trên máy đã tồn tại 1 tài khoản git:

git config user.name "tên người dùng"
git config credential.username "tên người dùng"

# Quy tắc đặt tên

Tên biến, tên function dùng camelCase (Ví dụ: $tenBien)
Tên file dùng PascalCase (Ví dụ: TenFile)
Tên row trong CSDL dùng snake_case (Ví dụ: ten_row)
