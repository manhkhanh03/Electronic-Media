# Báo điện tử

## Tính năng chi tiết của trang báo điện tử

#### Người dùng bao gồm: Người đọc, biên tập viên, admin

##### Người đọc có thể: 

- Đọc các bài viết đã được kiểm duyệt
- Gửi tin nhắn cho admin bất khi nào 
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

### Class Posts có thể có các hàm tương ứng với các chức năng liên quan đến bài đăng trên trang báo điện tử như sau:

##### Hàm tạo bài đăng mới:

- Hàm này sẽ cho phép người dùng tạo một bài đăng mới trên trang web.
- Hàm sẽ nhận đầu vào là nội dung bài đăng, tiêu đề, thể loại và các thông tin khác liên quan đến bài đăng.

##### Hàm xóa bài đăng:

- Hàm này sẽ cho phép người dùng xóa bài đăng đã đăng trên trang web.
- Hàm sẽ nhận đầu vào là mã bài đăng hoặc một số thông tin khác để xác định bài đăng cần xóa.

##### Hàm sửa bài đăng:

- Hàm này sẽ cho phép người dùng sửa đổi nội dung của bài đăng đã đăng trên trang web.
- Hàm sẽ nhận đầu vào là mã bài đăng hoặc một số thông tin khác để xác định bài đăng cần sửa đổi và các thông tin mới của bài đăng.

##### Hàm xem danh sách bài đăng:

- Hàm này sẽ hiển thị danh sách các bài đăng trên trang web.
- Hàm sẽ có thể nhận đầu vào là một số điều kiện để lọc danh sách bài đăng như thể loại, ngày đăng, tác giả, v.v.

##### Hàm tìm kiếm bài đăng:

- Hàm này sẽ cho phép người dùng tìm kiếm các bài đăng trên trang web dựa trên một số từ khóa hoặc các thông tin khác.
- Hàm sẽ nhận đầu vào là từ khóa hoặc các thông tin khác để xác định bài đăng cần tìm kiếm.


## Server environment
+ `Apache or Nginx`
+ `PHP >= 7.3`
+ `MySQL >=5.7`
+ `Nodejs >= v12.22.7` [https://nodejs.org/en/download/]

## =====================================================================

## Laravel document: 
- https://laravel.com/docs/8.x/installation
- https://laravel.com/docs/4.2/quick

## ======================================================================

## INSTALLATION for PRODUCTION
- Clone project and cd to project directory

- Run `cp .env.example .env`

- Create new database in mysql

- Config App url, environment, database connection, mailer in file `.env`

- Run `composer install` [install all Packagist to vendor folder]

- Run `php artisan key:generate`

- Run `php artisan migrate` [Create a table in an already created database]

- Run `php artisan db:seed` [import data default]

- Run `php artisan storage:link` [Public storage folder]

- Run `npm install`

- Run `npm run prod` or `npm run production`


## Typically, you may use a web server such as Apache or Nginx to serve your Laravel applications. If you are on PHP 5.4+ and would like to use PHP's built-in development server, you may use the serve Artisan command:

- `php artisan serve`

You can run site with link: http://127.0.0.1:8000 or http://localhost:8000


## By default the HTTP-server will listen to port 8000. However if that port is already in use or you wish to serve multiple applications this way, you might want to specify what port to use. Just add the --port argument:

- `php artisan serve --port=8080`

You can run site with link: http://127.0.0.1:8080` or `http://localhost:8080

## ============================================================================

## For Local development

- Install software in guide `local/README`

- Start Development server by running command `vagrant up`

- Stop server by command `vagrant halt`
- Access SSH server by command `vagrant ssh`
- Project path (in development server) is `/workplace`
- Seed example data by command `php artisan db:seed`
- Build assets (js/css) by command `npm run dev`
- Watching assets change by command `npm run watch-poll`
- Ide helper by command `php artisan ide-helper:generate` and `php artisan ide-helper:meta`

## =============================================================================
About Netsuite
http://www.netsuite.com/help/helpcenter/en_US/srbrowser/Browser2017_1/schema/record/salesorder.html?mode=package

https://hotexamples.com/examples/-/NetSuiteService/-/php-netsuiteservice-class-examples.html

Amazon API document:
https://developer-docs.amazon.com/sp-api/docs/feeds-api-v2021-06-30-use-case-guide
https://developer-docs.amazon.com/sp-api/docs/feed-type-values 
https://images-na.ssl-images-amazon.com/images/G/01/rainier/help/xsd/release_4_1/OrderFulfillment.xsd

Amazon API SDK:
https://github.com/jlevers/selling-partner-api/tree/main/docs/Api
https://github.com/jlevers/selling-partner-api/blob/main/docs/Model/Feeds/CreateFeedSpecification.md 

Mirak API:
Document: https://catch-dev.mirakl.net/help/api-doc/seller/mmp.html
SDK:
https://github.com/mirakl/sdk-php-shop

Bat dau khoi tao react

npm ci && npm run dev

