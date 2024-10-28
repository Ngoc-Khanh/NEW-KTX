<h1>PHP THUẦN "UTT-KTX WEBSITE"</h1>

> Quy trình tạo một Pull Request

## Bước 1: Tạo một nhánh mới (Branch)
Chuyển đến nhánh chính trước
```bash
  git checkout main
```

Pull repo mới nhất về nhánh main
```bash
  git pull origin main
```

Tạo và chuyển đến nhánh mới
```bash
  git checkout -b <tên-nhánh-mới>
```
> Nên tạo nhánh mới như sau
> <br> Mục đích là để biết sửa, cập nhật, hay là hoàn thiện gì thôi cứ ghi theo cấu trúc `tiền-tố/nội-dung`
> - VD:
> - `fix/<fix-gì-ghi-vào-dây>`
> - `update/<update-gì-ghi-vào-đây>`
> - `feature/<ghi-vào-đây>`

## Bước 2: Rồi mới bắt đầu sửa code chứ không phải sửa xong rồi mới pull và push
Lúc này muốn sửa gì thì sửa tùy ý <br>
Lức sửa nhớ vào `admin/config/database.php` và `user/config/database.php` sửa localhost bỏ cái `3360`

## Bước 3: Add và Push

Add vào nhánh
```bash
  git add .
```

Commit vào nhánh
```bash
  git commit -m "Mô-tả-commit"
```

## Bước 4: Đẩy nhánh lên Repo
```bash
  git push origin (tên-nhánh-vừa-tạo-ở-đoạn-checkout)
```

## Bước 5: Tạo pull Request trên GitHub
- Nhấm Pull Request
- Chọn Create Pull Request
- Chọn nhánh `compare` `<Nhánh-của-mình-vừa-push>` không chọn nhánh có chữ `base`
- Submit chờ tao merge thôi :3