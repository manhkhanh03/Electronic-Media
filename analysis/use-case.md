# Báo điện tử

## Tính năng chi tiết của trang báo điện tử

#### Người dùng bao gồm: Người đọc, biên tập viên, admin

##### Người đọc có thể: 

- Đọc các bài viết đã được kiểm duyệt
- Gửi tin nhắn cho admin bất khi nào 
- In các bài viết mong muốn
- Bình luận dưới bài viết
- Thích bài viết

##### Biên tập viên có thể: 

- Có tất cả các quyền của người đọc
- Viết bài
- Nạp bài chờ xuất bản
- Xem lại bài mình viết chưa được kiểm duyệt
- Thay đổi nội dung bài viết khi đã được kiểm duyệt
- Xóa bài viết khi đã được kiểm duyệt

##### Admin có thể: 

- Có tất cả các quyền của biên tập viên
- Duyệt bài 
-	Thay đổi các cài đặt như theme, bố cục, bài viết được đề xuất
-	Quản lý các tài khoản người dùng (người đọc và biên tập viên)


### Class Users trong trang báo điện tử có thể có các hàm tương ứng với từng role của người dùng như sau:

##### Hàm đăng nhập:

- Cho phép tất cả người dùng đăng nhập vào hệ thống.
- Trong trường hợp người dùng là tác giả hoặc biên tập viên, hàm có thể điều chỉnh quyền truy cập của người dùng đó.

##### Hàm xem bài báo:

- Cho phép tất cả người dùng xem các bài báo trên trang.
- Trong trường hợp người dùng là tác giả hoặc biên tập viên, hàm có thể hiển thị thông tin chỉnh sửa bài báo.

##### Hàm viết bài báo:

- Chỉ cho phép tác giả và biên tập viên có quyền truy cập hàm này.
- Hàm cho phép người dùng tạo mới một bài báo.

##### Hàm chỉnh sửa bài báo:

- Chỉ cho phép tác giả và biên tập viên có quyền truy cập hàm này.
- Hàm cho phép người dùng chỉnh sửa nội dung của một bài báo đã tồn tại.
##### Hàm xoá bài báo:

- Chỉ cho phép tác giả và biên tập viên có quyền truy cập hàm này.
- Hàm cho phép người dùng xoá một bài báo đã tồn tại.
##### Hàm phê duyệt bài báo:

- Chỉ cho phép biên tập viên có quyền truy cập hàm này.
- Hàm cho phép người dùng phê duyệt một bài báo đã viết bởi một tác giả.

##### Hàm gỡ phê duyệt bài báo:

- Chỉ cho phép biên tập viên có quyền truy cập hàm này.
- Hàm cho phép biên tập viên gỡ bỏ quyết định phê duyệt của một bài báo đã được phê duyệt trước đó.
##### Hàm đăng xuất:

- Cho phép tất cả người dùng đăng xuất khỏi hệ thống.

### Class Logins có thể có các hàm tương ứng với các chức năng liên quan đến đăng nhập và đăng xuất như sau:

##### Hàm kiểm tra tên đăng nhập và mật khẩu:

- Hàm này sẽ kiểm tra xem tên đăng nhập và mật khẩu mà người dùng nhập vào có hợp lệ hay không.
- Nếu thông tin đăng nhập không hợp lệ, hàm sẽ thông báo cho người dùng biết và yêu cầu họ nhập lại.

##### Hàm tạo phiên đăng nhập mới:

- Hàm này sẽ tạo một phiên đăng nhập mới cho người dùng nếu thông tin đăng nhập hợp lệ.
- Phiên đăng nhập sẽ được lưu trữ trong cơ sở dữ liệu hoặc tệp cookie để đảm bảo rằng người dùng không cần phải đăng nhập lại mỗi khi truy cập vào trang web.

##### Hàm kiểm tra trạng thái đăng nhập:

- Hàm này sẽ kiểm tra xem người dùng đã đăng nhập hay chưa.
- Nếu người dùng đã đăng nhập, hàm sẽ trả về thông tin liên quan đến người dùng, cho phép họ truy cập các chức năng chỉ dành cho người dùng đã đăng nhập.
- Nếu người dùng chưa đăng nhập, hàm sẽ yêu cầu họ đăng nhập hoặc chuyển hướng họ đến trang đăng nhập.

##### Hàm đăng xuất:

- Hàm này sẽ xóa phiên đăng nhập của người dùng, đánh dấu họ là đã đăng xuất.
- Sau khi đăng xuất, họ sẽ không thể truy cập các chức năng chỉ dành cho người dùng đã đăng nhập cho đến khi đăng nhập lại.

##### Hàm quản lý phiên đăng nhập:

- Hàm này sẽ quản lý các phiên đăng nhập của người dùng và đảm bảo rằng phiên đăng nhập hết hạn sẽ bị xóa.
- Nếu phiên đăng nhập của người dùng đã hết hạn, họ sẽ phải đăng nhập lại để tiếp tục sử dụng các chức năng chỉ dành cho người dùng đã đăng nhập.

