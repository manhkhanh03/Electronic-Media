<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/article.css">
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
                            <!-- <img src="/img/qh.webp" alt="">
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
                            </div> -->
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
            <img src="/img/LACAII.png" alt="Lacai" class="logo">
            <img src="/img/A room without books is like a body without a soul..png" alt="" class="banner">
        </div>

        <nav class="nav">
            <ul class="list-nav">
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/index/index') }}">Home</a>
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
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Pháp luật') }}">Pháp luật</a>
                        </li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Giáo dục') }}">Giáo dục</a>
                        </li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/An ninh') }}">An ninh</a>
                        </li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Sức khỏe') }}">Sức khỏe</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="box-search">
                <input type="text" class="input-search" id="search" placeholder="Tìm kiếm bài viết...">
            </div>
        </nav>

        <!-- Body -->

        <main>
            <p id="status" style="width: 100%; text-align: center; font-size: 26px; margin: 30px 0"></p>
            <div class="box-post" data-id-article="{{$article_id}}">
                <h1 id="categories" data-cate-id="2"></h1>
                <div class="posts">
                    <div class="post-left">
                        <div class="box-list-item"></div>
                        <div id="concerned">
                            <h3>Tin liên quan</h3>
                            <div style="width: 100%; height: 1px; background-color: var(--color); margin: 6px auto;">
                            </div>
                            <ul class="list-posts">
                                <li class="post-item" data-theme-type="">
                                    <div class="post-item-div">
                                        <img class="img-post" src="/img/hdbh.jpg" alt="">
                                        <div class="information-post">
                                            <h3>Động thái vô cùng bất ngờ của PSG với Messi</h3>
                                            <p>- PSG đã bất ngờ xóa án phạt treo giò nội bộ với Messi. Điều đó có nghĩa
                                                rằng, El Pulga có thể ra sân trong trận đấu với
                                                Ajaccio vào đêm nay.</p>
                                            <div class="info-author">
                                                <div class="author">
                                                    <img src="${post.user_data[0].url_user}" alt=""
                                                        class="img-author">
                                                    <p class="name-author">
                                                        ${post.user_data[0].name}
                                                    </p>
                                                    <p class="date-time">${post.created_at}</p>
                                                    <div class="contact-author">
                                                        <img src="${post.user_data[0].url_user}" alt="">
                                                        <p class="name-author">${post.user_data[0].name}</p>
                                                        <button class="mess-author"
                                                            data-receiver-id="${post.user_id}">Nhắn tin</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="post-item" data-theme-type="">
                                    <div class="post-item-div">
                                        <img class="img-post" src="/img/hdbh.jpg" alt="">
                                        <div class="information-post">
                                            <h3>Động thái vô cùng bất ngờ của PSG với Messi</h3>
                                            <p>- PSG đã bất ngờ xóa án phạt treo giò nội bộ với Messi. Điều đó có nghĩa
                                                rằng, El Pulga có thể ra sân trong trận đấu với
                                                Ajaccio vào đêm nay.</p>
                                            <div class="info-author">
                                                <div class="author">
                                                    <img src="${post.user_data[0].url_user}" alt=""
                                                        class="img-author">
                                                    <p class="name-author">
                                                        ${post.user_data[0].name}
                                                    </p>
                                                    <p class="date-time">${post.created_at}</p>
                                                    <div class="contact-author">
                                                        <img src="${post.user_data[0].url_user}" alt="">
                                                        <p class="name-author">${post.user_data[0].name}</p>
                                                        <button class="mess-author"
                                                            data-receiver-id="${post.user_id}">Nhắn tin</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-right">
                        <h3>Truy cập nhiều nhất</h3>
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
                            <div class="box-privacy-dialog"></div>
                        </div>
                    </div>
                </div>

                <div class="info-post">
                    <p>26 lượt thích</p>
                    <div class="info-post-box">
                        <p>13 bình luận</p>
                        <p>6 chia sẻ</p>
                    </div>
                </div>
                <div class="feeling">
                    <div class="feeling-box">
                        <i class="fa-regular fa-thumbs-up"></i>
                        <p>Thích</p>
                    </div>
                    <div class="feeling-box">
                        <i class="fa-regular fa-comment"></i>
                        <p>Bình luận</p>
                    </div>
                    <div class="feeling-box">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        <p>Chia sẻ</p>
                    </div>
                    <div class="feeling-box">
                        <i class="fa-solid fa-print"></i>
                        <p>In bài viết</p>
                    </div>
                </div>

                <div class="comment">
                    <div class="comment-box">
                        <div class="cm-item">
                            <img src="/img/gg.webp" alt="">
                            <div class="cm-item-info-feeling">
                                <div class="cm-item-info">
                                    <h5 class="name">Manh Khanh</h5>
                                    <p>Hay vai o</p>
                                </div>
                                <ul class="cm-item-feeling">
                                    <li>Thích</li>
                                    <li>Phản hồi</li>
                                    <li>4 giờ trước</li>
                                </ul>
                            </div>
                        </div>
                        <div class="cm-item">
                            <img src="/img/gg.webp" alt="">
                            <div class="cm-item-info-feeling">
                                <div class="cm-item-info">
                                    <h5 class="name">Manh Khanh</h5>
                                    <p>alo alo Nghe ro tra loi alo alo</p>
                                </div>
                                <ul class="cm-item-feeling">
                                    <li>Thích</li>
                                    <li>Phản hồi</li>
                                    <li>4 giờ trước</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="write-comment">
                        <img src="/img/fb.jpg" alt="">
                        <input type="text" placeholder="Nhập bình luận...">
                        <i class="fa-regular fa-paper-plane"></i>
                    </div>
                </div>
                <!-- <div style="width: 100%; height: 2px; background-color: var(--color); margin: 30px 0;"></div>
            <div style="width: 100%; height: 2px; background-color: var(--color); margin: 30px 0;"></div>
            <div style="width: 100%; height: 2px; background-color: var(--color); margin: 30px 0;"></div> -->
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
    <script type="module" src="/js/main.js"></script>
    <script type="module" src="/js/article.js"></script>
</body>

</html>
