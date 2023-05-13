<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="wst">
        <menu>
            <div class="menu-left">
                <p>Tải ứng dụng</p>
                <p>Quét mã QR</p>
            </div>
            <div class="menu-right">
                <div class="noti">
                    <i class="fa-solid fa-bell"></i>
                    <div class="box-noti">
                        <h2>Thông báo</h2>
                        <div class="info-post">
                            <img src="/img/qh.webp" alt="">
                            <div class="header">
                                <header class="header-post">Nga - Ukraine trao đổi tù binh quy mô lớn</header>
                                <p class="subtitle">Khi ông mặt trời thức dậy ....</p>
                            </div>
                        </div>
                        <div class="info-post">
                            <img src="/img/qh.webp" alt="">
                            <div class="header">
                                <header class="header-post">Nga - Ukraine trao đổi tù binh quy mô lớn</header>
                                <p class="subtitle">Khi ông mặt trời thức dậy ....</p>
                            </div>
                        </div>
                        <div class="info-post">
                            <img src="/img/qh.webp" alt="">
                            <div class="header">
                                <header class="header-post">Nga - Ukraine trao đổi tù binh quy mô lớn</header>
                                <p class="subtitle">Khi ông mặt trời thức dậy ....</p>
                            </div>
                        </div>
                        <div class="see-post">
                            Xem toàn bộ thông báo?
                        </div>
                    </div>
                </div>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-solid fa-user"></i>
            </div>
        </menu>
        <div class="logo-bn">
            <img src="/img/LACAII.png" alt="Lacai" class="logo">
            <img src="/img/A room without books is like a body without a soul..png" alt="" class="banner">
        </div>

        <nav class="nav">
            <ul class="list-nav">
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Thế giới') }}">Thế giới</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Kinh tế') }}">Kinh tế</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Thể thao') }}">Thể thao</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Giải trí') }}">Giải trí</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Khoa học - Công nghệ') }}">KH-CN</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Văn hóa - Xã hội') }}">VH-XH</a>
                </li>
                <li class="nav-item other">
                    <p>...</p>
                    <ul class="list-other">
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Pháp luật') }}">Pháp luật</a></li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Giáo dục') }}">Giáo dục</a></li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/An ninh') }}">An ninh</a></li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Sức khỏe') }}">Sức khỏe</a></li>
                    </ul>
                </li>
            </ul>
            <div class="box-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="input-search" id="search" placeholder="Tìm kiếm bài viết...">
            </div>
        </nav>

        <!-- Body -->
       <main>
            <h1 id="categories">Tin {{$categories}}</h1>
            <div class="posts">
                <div class="post-left">
                    <ul class="list-post">
                        <li class="post-item" data="">
                            <div class="post-item-div">
                                <div class="information-post">
                                    <h3>Thị trường chứng khoán tăng trưởng mạnh trong tháng 5</h3>
                                    <p>Truyền thông đưa tin thị trường chứng khoán đang tăng trưởng mạnh trong tháng 5 với nhiều cổ phiếu
                                        tăng giá.</p>
                                    <div class="info-author">
                                        <div class="author">
                                            <img src="/img/gg.webp" alt="" class="img-author">
                                            <p class="name-author">
                                                Manh Khanh
                                            </p>
                                            <p class="date-time">---------------</p>
                                            <div class="contact-author">
                                                <img src="img/gg.webp" alt="">
                                                <p class="name-author">Manh Khanh</p>
                                                <button class="mess-author">Nhắn tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="img-post" src="img/uk.jpg" alt="">
                            </div>
                        </li>
                        <li class="post-item" data="">
                            <div class="post-item-div">
                                <div class="information-post">
                                    <h3>Thị trường chứng khoán tăng trưởng mạnh trong tháng 5</h3>
                                    <p>Truyền thông đưa tin thị trường chứng khoán đang tăng trưởng mạnh trong tháng 5 với nhiều cổ phiếu
                                        tăng giá.</p>
                                    <div class="info-author">
                                        <div class="author">
                                            <img src="/img/gg.webp" alt="" class="img-author">
                                            <p class="name-author">
                                                Manh Khanh
                                            </p>
                                            <p class="date-time">---------------</p>
                                            <div class="contact-author">
                                                <img src="img/gg.webp" alt="">
                                                <p class="name-author">Manh Khanh</p>
                                                <button class="mess-author">Nhắn tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="img-post" src="img/uk.jpg" alt="">
                            </div>
                        </li>
                        <li class="post-item" data="">
                            <div class="post-item-div">
                                <div class="information-post">
                                    <h3>Thị trường chứng khoán tăng trưởng mạnh trong tháng 5</h3>
                                    <p>Truyền thông đưa tin thị trường chứng khoán đang tăng trưởng mạnh trong tháng 5 với nhiều cổ phiếu
                                        tăng giá.</p>
                                    <div class="info-author">
                                        <div class="author">
                                            <img src="/img/gg.webp" alt="" class="img-author">
                                            <p class="name-author">
                                                Manh Khanh
                                            </p>
                                            <p class="date-time">---------------</p>
                                            <div class="contact-author">
                                                <img src="img/gg.webp" alt="">
                                                <p class="name-author">Manh Khanh</p>
                                                <button class="mess-author">Nhắn tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="img-post" src="img/uk.jpg" alt="">
                            </div>
                        </li>
                        <li class="post-item" data="">
                            <div class="post-item-div">
                                <div class="information-post">
                                    <h3>Thị trường chứng khoán tăng trưởng mạnh trong tháng 5</h3>
                                    <p>Truyền thông đưa tin thị trường chứng khoán đang tăng trưởng mạnh trong tháng 5 với nhiều cổ phiếu
                                        tăng giá.</p>
                                    <div class="info-author">
                                        <div class="author">
                                            <img src="/img/gg.webp" alt="" class="img-author">
                                            <p class="name-author">
                                                Manh Khanh
                                            </p>
                                            <p class="date-time">---------------</p>
                                            <div class="contact-author">
                                                <img src="img/gg.webp" alt="">
                                                <p class="name-author">Manh Khanh</p>
                                                <button class="mess-author">Nhắn tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="img-post" src="img/uk.jpg" alt="">
                            </div>
                        </li>
                        <li class="post-item" data="">
                            <div class="post-item-div">
                                <div class="information-post">
                                    <h3>Thị trường chứng khoán tăng trưởng mạnh trong tháng 5</h3>
                                    <p>Truyền thông đưa tin thị trường chứng khoán đang tăng trưởng mạnh trong tháng 5 với nhiều cổ phiếu
                                        tăng giá.</p>
                                    <div class="info-author">
                                        <div class="author">
                                            <img src="/img/gg.webp" alt="" class="img-author">
                                            <p class="name-author">
                                                Manh Khanh
                                            </p>
                                            <p class="date-time">---------------</p>
                                            <div class="contact-author">
                                                <img src="img/gg.webp" alt="">
                                                <p class="name-author">Manh Khanh</p>
                                                <button class="mess-author">Nhắn tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="img-post" src="img/uk.jpg" alt="">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="post-right">
                    <h3>Truy cập nhiều nhất</h3>
                </div>
            </div>
       </main>

    </div>
    <!-- Footer -->
    <footer>
        <div class="box-ft">
            <div class="ft-info">
                <img src="/img/LACAI-White.png" alt="" class="ft-logo">
                <div class="box-ft-info">
                    <i class="fa-solid fa-phone"></i>
                    <span>0987654321</span>
                </div>
                <div class="box-ft-info">
                    <i class="fa-solid fa-envelope"></i>
                    <span>lacaisupport@gmail.com</span>
                </div>
                <div class="box-ft-info-mxh">
                    <div class="box-icon"><i class="fa-brands fa-facebook-f"></i></div>
                    <div class="box-icon" style="margin: 0 20px;"><i class="fa-brands fa-instagram"></i></div>
                    <div class="box-icon"><i class="fa-brands fa-twitter"></i></div>
                </div>
            </div>

            <div class="ft-info">
                <h2>LACAI Công ty một thành viên</h2>
                <p>Tổng biên tập: Mạnh Khánh</p>
                <p>Địa chỉ: No Address</p>
                <i class="fa-regular fa-copyright"></i>
                <span>Copy-Paste 2023</span>
            </div>
            <div class="ft-info">
                <h2>Về công ty</h2>
                <p>Về chúng tôi</p>
                <p>Liên hệ</p>
            </div>
        </div>
    </footer>
    <script src="/js/main.js"></script>
</body>

</html>