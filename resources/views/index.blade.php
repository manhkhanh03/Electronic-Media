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
                    <a href="{{ url('http://127.0.0.1:8000/home/Thế giới/1') }}">Thế giới</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Kinh tế/2') }}">Kinh tế</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Thể thao/3') }}">Thể thao</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Giải trí/4') }}">Giải trí</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Khoa học - Công nghệ/5') }}">KH-CN</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('http://127.0.0.1:8000/home/Văn hóa - Xã hội/6') }}">VH-XH</a>
                </li>
                <li class="nav-item other">
                    <p>...</p>
                    <ul class="list-other">
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Pháp luật/7') }}">Pháp
                                luật</a></li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Giáo dục/8') }}">Giáo dục</a>
                        </li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/An ninh/9') }}">An ninh</a>
                        </li>
                        <li class="other-item"><a href="{{ url('http://127.0.0.1:8000/home/Sức khỏe/10') }}">Sức
                                khỏe</a></li>
                    </ul>
                </li>
            </ul>
            <div class="box-search">
                <input type="text" class="input-search" id="search" placeholder="Tìm kiếm bài viết...">
            </div>
        </nav>

        <!-- Body -->
        <main class="body">
            <div class="post-host">
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
                    <img src="/img/somany.jpg" alt="" class="banner-post">
                    <ul class="list-post-topic">
                        {{-- @php
                            use GuzzleHttp\Client;
                            $client = new Client();
                            $response = $client->get('http://127.0.0.1:8000/api/articles/hot_0'); 
                            // $posts = json_decode($response->getBody()->getContents(), true);
                            // print_r($posts);
                        //     foreach ($posts as $index => $post) {
                        //         if ($index <= 7) {
                        // @endphp
                        //             <li class="topic-item">
                        //                 <a href="http://127.0.0.1:8000/index/article/{{ $post['id'] }}">
                        //                     <img src="{{ $post['image'] }}" alt="">
                        //                 </a>
                        //                 <div class="information-post-right">
                        //                     <a href="http://127.0.0.1:8000/index/article/{{ $post['id'] }}">
                        //                         <h3>{{ $post['title'] }}</h3>
                        //                     </a>
                        //                     <div class="info-author">
                        //                         <div class="author">
                        //                             <img src="{{ $post['author'][0]['url'] }}" alt="" class="img-author">
                        //                             <p class="name-author">
                        //                                 {{ $post['author'][0]['name'] }}
                        //                             </p>
                        //                             <p class="date-time">{{ $post['created_at'] }}</p>
                        //                             <div class="contact-author">
                        //                                 <img src="{{ $post['author'][0]['url'] }}" alt="">
                        //                                 <p class="name-author">{{ $post['author'][0]['name'] }}</p>
                        //                                 <button class="mess-author" data-receiver-id="{{ $post['user_id'] }}">Nhắn tin</button>
                        //                             </div>
                        //                         </div>
                        //                     </div>
                        //                 </div>
                        //             </li>
                        // @php
                        //         }
                        //     }
                        @endphp--}}
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
                        <div class="box-privacy-dialog"></div>
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
    <script type="module" src="/js/index.js"></script>
    <script type="module" src="/js/main.js"></script>
    <script type="module" src="/js/posts.js"></script>

    <script type="module" src="/js/importUser.js"></script>
</body>

</html><?php /**PATH /home/manhkhanh/ElectronicMedia/resources/views/index.blade.php ENDPATH**/ ?>
