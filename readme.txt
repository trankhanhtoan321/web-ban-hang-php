biến session lưu thông tin người dùng đã đăng nhập hay chưa:
userlogin
giá trị của userlogin là array các thông tin của user đó.
kiểm tra nếu biến session userlogin chưa có thì là chưa đăng nhập.
*** hiện tại thì các câu lệnh sql trong model chưa có giới hạn kết quả trả về, vì cậy nó sẽ làm tăng dung lượng của biến ,, khi update sẽ giớ hạn chổ này.