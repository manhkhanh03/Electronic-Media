<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Write acticles</title>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-toolbar@latest"></script> -->
    <!-- <script src="https://www.draft-js-plugins.com/plugin/inline-toolbar"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script><!-- Image -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script><!-- Delimiter -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/nested-list@latest"></script><!-- List -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script><!-- Checklist -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script><!-- Quote -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script><!-- Code -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script><!-- Embed -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script><!-- Table -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script><!-- Link -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script><!-- Warning -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/raw@latest"></script><!-- Raw -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script><!-- Marker -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script><!-- Inline Code -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/write_acticles.css">
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

        <main style="font-size: 100%" data-article="{{$id_article}}">
            <h2 style="font-size: 30px; padding-top: 30px;">Tạo bài viết</h2>
            <p style="color: rgb(255, 59, 59); padding: 30px 0;">Những nhà báo đích thực là những người cống hiến hết
                mình cho công việc của mình, đặt trách nhiệm của
                mình lên hàng đầu và luôn cố gắng để đưa tin chính xác và đầy đủ nhất đến với độc giả.</p>

            <div class="container-item">
                <p id="text-item" data-categorie="">Chọn thể loại:</p>
                <ul class="list-item">
                    <li class="item" data-categorie="1">Thế giới</li>
                    <li class="item" data-categorie="2">Kinh tế</li>
                    <li class="item" data-categorie="3">Thể thao</li>
                    <li class="item" data-categorie="4">Giải trí</li>
                    <li class="item" data-categorie="5">KH-CN</li>
                    <li class="item" data-categorie="6">VH-XH</li>
                    <li class="item" data-categorie="7">Pháp luật</li>
                    <li class="item" data-categorie="8">Giáo dục</li>
                    <li class="item" data-categorie="9">An ninh</li>
                    <li class="item" data-categorie="10">Sức khỏe</li>
                </ul>
                <i class="fa-solid fa-angle-down" style="cursor: pointer;"></i>
            </div>
            <div class="container" style="background-color: #e8e6e3">
                <h3></h3>
                <div id="editorjs"></div>
            </div>
            <ul class="list-btn">
                <li class="btn">Xóa</li>
                <li class="btn">Bản nháp</li>
                <li class="btn">Đăng</li>
            </ul>
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

    <script type="module" src="/js/main.js"></script>
    <script type="module" src="/js/editerjs.js"></script>
</body>

</html>
