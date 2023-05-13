<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/main.css">
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
                            <img src="img/qh.webp" alt="">
                            <div class="header">
                                <header class="header-post">Nga - Ukraine trao đổi tù binh quy mô lớn</header>
                                <p class="subtitle">Khi ông mặt trời thức dậy ....</p>
                            </div>
                        </div>
                        <div class="info-post">
                            <img src="img/qh.webp" alt="">
                            <div class="header">
                                <header class="header-post">Nga - Ukraine trao đổi tù binh quy mô lớn</header>
                                <p class="subtitle">Khi ông mặt trời thức dậy ....</p>
                            </div>
                        </div>
                        <div class="info-post">
                            <img src="img/qh.webp" alt="">
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
                <div class="box-user"></div>
            </div>
        </menu>
        <div class="logo-bn">
            <img src="img/LACAII.png" alt="Lacai" class="logo">
            <img src="img/A room without books is like a body without a soul..png" alt="" class="banner">
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
        <main class="body">
            <div class="post-host">
                <div class="post-1">
                    {{-- <img src="img/uk.jpg" alt="">
                    <h3>Ukraine nêu thương vong của Nga ở mặt trận khốc liệt nhất</h3>
                    <p>Ông Đoàn Bá Hồng sử dụng 24 tài khoản để giao dịch tạo cung, cầu giả tạo, thao túng cổ phiếu
                        nhưng không có số lợi bất
                        hợp pháp nên chỉ bị phạt 550 triệu đồng.</p>
                    <div class="info-author">
                        <div class="author">
                            <img src="img/fb.jpg" alt="" class="img-author">
                            <p class="name-author">
                                Mạnh Khánh
                            </p>
                            <p class="date-time">20:00:00 - 16/04/2023</p>
                            <div class="contact-author">
                                <img src="img/fb.jpg" alt="">
                                <p class="name-author">Mạnh Khánh</p>
                                <button class="mess-author">Nhắn tin</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="post-2">
                    {{-- <div class="box-post-2">
                        <img src="img/ukuk.jpg" alt="">
                        <h5>Nga - Ukraine trao đổi tù binh quy mô lớn</h5>
                        <p>Khi ông mặt trời thức dậy mẹ lên rẫy con lên trường....</p>
                        <div class="info-author">
                            <div class="author">
                                <img src="img/gg.webp" alt="" class="img-author">
                                <p class="name-author">
                                    Mạnh Khánh
                                </p>
                                <p class="date-time">20:00:00 - 16/04/2023</p>
                                <div class="contact-author">
                                    <img src="img/gg.webp" alt="">
                                    <p class="name-author">Mạnh Khánh</p>
                                    <button class="mess-author">Nhắn tin</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-post-2">
                        <img src="img/ukuk.jpg" alt="">
                        <h5>Nga - Ukraine trao đổi tù binh quy mô lớn</h5>
                        <p>Khi ông mặt trời thức dậy mẹ lên rẫy con lên trường....</p>
                        <div class="info-author">
                            <div class="author">
                                <img src="img/fb.jpg" alt="" class="img-author">
                                <p class="name-author">
                                    Mạnh Khánh
                                </p>
                                <p class="date-time">20:00:00 - 16/04/2023</p>
                                <div class="contact-author">
                                    <img src="img/fb.jpg" alt="">
                                    <p class="name-author">Mạnh Khánh</p>
                                    <button class="mess-author">Nhắn tin</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="poster">
                    <img src="img/blob.jpg" alt="">
                </div>
            </div>
            <div class="posts">
                <div class="post-left">
                    <ul class="list-fun">
                        <li class="fun-item active" data-theme-type="2">Kinh tế</li>
                        <li class="fun-item" data-theme-type="3">Thể thao</li>
                        <li class="fun-item" data-theme-type="4">Giải trí</li>
                    </ul>
                    <ul class="list-posts"></ul>
                </div>
                <div class="post-right">
                    <img src="img/somany.jpg" alt="" class="banner-post">
                    <ul class="list-post-topic">
                        <li class="topic-item">
                            <img src="img/hk.jpg" alt="">
                            <div class="information-post-right">
                                <h3>Một người dùng 24 tài khoản thao túng cổ phiếu C69, bị phạt 550 triệu đồng</h3>
                                <div class="info-author">
                                    <div class="author">
                                        <img src="img/fb.jpg" alt="" class="img-author">
                                        <p class="name-author">
                                            Mạnh Khánh
                                        </p>
                                        <p class="date-time">20:00:00 - 16/04/2023</p>
                                        <div class="contact-author">
                                            <img src="img/fb.jpg" alt="">
                                            <p class="name-author">Mạnh Khánh</p>
                                            <button class="mess-author">Nhắn tin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="topic-item">
                            <img src="img/hk.jpg" alt="">
                            <div class="information-post-right">
                                <h3>Một người dùng 24 tài khoản thao túng cổ phiếu C69, bị phạt 550 triệu đồng</h3>
                                <div class="info-author">
                                    <div class="author">
                                        <img src="img/fb.jpg" alt="" class="img-author">
                                        <p class="name-author">
                                            Mạnh Khánh
                                        </p>
                                        <p class="date-time">20:00:00 - 16/04/2023</p>
                                        <div class="contact-author">
                                            <img src="img/fb.jpg" alt="">
                                            <p class="name-author">Mạnh Khánh</p>
                                            <button class="mess-author">Nhắn tin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="topic-item">
                            <img src="img/hk.jpg" alt="">
                            <div class="information-post-right">
                                <h3>Một người dùng 24 tài khoản thao túng cổ phiếu C69, bị phạt 550 triệu đồng</h3>
                                <div class="info-author">
                                    <div class="author">
                                        <img src="img/fb.jpg" alt="" class="img-author">
                                        <p class="name-author">
                                            Mạnh Khánh
                                        </p>
                                        <p class="date-time">20:00:00 - 16/04/2023</p>
                                        <div class="contact-author">
                                            <img src="img/fb.jpg" alt="">
                                            <p class="name-author">Mạnh Khánh</p>
                                            <button class="mess-author">Nhắn tin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="topic-item">
                            <img src="img/hk.jpg" alt="">
                            <div class="information-post-right">
                                <h3>Một người dùng 24 tài khoản thao túng cổ phiếu C69, bị phạt 550 triệu đồng</h3>
                                <div class="info-author">
                                    <div class="author">
                                        <img src="img/fb.jpg" alt="" class="img-author">
                                        <p class="name-author">
                                            Mạnh Khánh
                                        </p>
                                        <p class="date-time">20:00:00 - 16/04/2023</p>
                                        <div class="contact-author">
                                            <img src="img/fb.jpg" alt="">
                                            <p class="name-author">Mạnh Khánh</p>
                                            <button class="mess-author">Nhắn tin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="messenger">
                <div class="box-icon-mess">
                    <i class="fa-brands fa-facebook-messenger"></i>
                    <p class="quantity-info">1</p>
                </div>
                <div class="box-mess" style="display: none;">
                    <!-- <div class="box-mess"> -->
                    <div class="header-mess">
                        <h3>Messenger</h3>
                    </div>
                    <div class="item-mess">
                        <div class="none">Không có tin nhắn nào</div>
                    </div>

                    <div class="privacy-dialog">
                        <div class="box-privacy-dialog">
                            {{-- <div class="user">
                                <i class="fa-solid fa-chevron-left"></i>
                                <img src="" alt="">
                                <p class="name"></p>
                            </div>

                            <div class="dialog-box-privacy">
                                <div class="box-dialog-box-privacy">
                                    <p class="me"></p>
                                </div>
                                <div class="box-dialog-box-privacy">
                                    <p class="you"></p>
                                </div>
                                <div class="box-dialog-box-privacy">
                                    <p class="you"></p>
                                </div>
                                <div class="box-dialog-box-privacy">
                                    <p class="me"></p>
                                </div>
                            </div>
                            <div class="input-mess">
                                <input type="text" name="" id="input-mess" placeholder="Nhập tin nhắn...">
                                <i class="fa-regular fa-paper-plane"></i>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 100%; height: 2px; background-color: var(--color); margin: 30px 0;"></div>
        </main>

    </div>
    <!-- Footer -->
    <footer>
        <div class="box-ft">
            <div class="ft-info">
                <img src="img/LACAI-White.png" alt="" class="ft-logo">
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
    <script type="module" src="js/index.js"></script>
    <script type="module" src="js/main.js"></script>
    <script type="module" src="js/posts.js"></script>
</body>

</html><?php /**PATH /home/manhkhanh/ElectronicMedia/resources/views/index.blade.php ENDPATH**/ ?>
