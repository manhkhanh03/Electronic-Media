@extends('pattern')

@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/article.css">
@endpush


@section('menu-nav-body')
    @push('info-web')
        <p id="status" style="width: 100%; text-align: center; font-size: 26px; margin: 30px 0 0"></p>
        <div class="box-post" data-id-article="{{ $article_id }}">
            <h1 id="categories"></h1>
            <div class="posts">
                <div class="post-left">
                    <div class="box-list-item"></div>
                    <div id="concerned">
                        <h3>Tin liên quan</h3>
                        <div style="width: 100%; height: 1px; background-color: var(--color); margin: 6px auto;">
                        </div>
                        <ul class="list-posts">
                        </ul>
                    </div>
                </div>
                <div class="post-right">
                    <h3 class="header-most-accessed">Truy cập nhiều nhất</h3>
                    <ul class="most-accessed">
                        <li class="post-item" data-theme-type="${post.categorie_id}" data-article-id="${post.id}">
                            <div class="post-item-div">
                                <a href="http://127.0.0.1:8000/index/article/${post.title}/${post.id}">
                                    <img class="img-post" src="/img/ukuk.jpg" alt="">
                                </a>
                                <div class="information-post">
                                    <a href="http://127.0.0.1:8000/index/article/${post.id}">
                                        <h3>Giá bitcoin giảm mạnh sau lỗi hệ thống của sàn Binance</h3>
                                    </a>
                                    <div class="info-author">
                                        <div class="author">
                                            <img src="${post.author[0].url}" alt="" class="img-author">
                                            <p class="name-author">
                                                Manh Khanh
                                            </p>
                                            <p class="date-time">5/25/2023, 12:14:11 AM</p>
                                            <div class="contact-author">
                                                <img src="${post.author[0].url}" alt="">
                                                <p class="name-author">Manh Khanh</p>
                                                <button class="mess-author" data-receiver-id="${post.user_id}">Nhắn tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="post-item" data-theme-type="${post.categorie_id}" data-article-id="${post.id}">
                            <div class="post-item-div">
                                <a href="http://127.0.0.1:8000/index/article/${post.title}/${post.id}">
                                    <img class="img-post" src="/img/ukuk.jpg" alt="">
                                </a>
                                <div class="information-post">
                                    <a href="http://127.0.0.1:8000/index/article/${post.id}">
                                        <h3>Giá bitcoin giảm mạnh sau lỗi hệ thống của sàn Binance</h3>
                                    </a>
                                    <div class="info-author">
                                        <div class="author">
                                            <img src="${post.author[0].url}" alt="" class="img-author">
                                            <p class="name-author">
                                                Manh Khanh
                                            </p>
                                            <p class="date-time">5/25/2023, 12:14:11 AM</p>
                                            <div class="contact-author">
                                                <img src="${post.author[0].url}" alt="">
                                                <p class="name-author">Manh Khanh</p>
                                                <button class="mess-author" data-receiver-id="${post.user_id}">Nhắn tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endpush
    @parent

    @push('comments')
        <div class="info-post">
            <p name="total-like"></p>
            <div class="info-post-box">
                <p name="comment"></p>
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
            </div>
            <div class="write-comment">
                <img name="img-comment" src="https://bloganchoi.com/wp-content/uploads/2022/02/avatar-trang-y-nghia.jpeg" alt="">
                <input type="text" name="content-comment" placeholder="Nhập bình luận...">
                <i style="cursor: pointer" class="fa-regular fa-paper-plane sent-comment"></i>
            </div>
        </div>
        </div>
    @endpush
@endsection

@section('footer')
    @parent
@endsection


@section('codejs')
    @parent
@endsection
@push('js')
    <script src="/js/article.js"></script>
@endpush
