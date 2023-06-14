@extends('pattern')

@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/article.css">
@endpush


@section('menu-nav-body')
    @push('info-web')
        <p id="status" style="width: 100%; text-align: center; font-size: 26px; margin: 30px 0"></p>
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
                                                <img src="${post.user_data[0].url_user}" alt="" class="img-author">
                                                <p class="name-author">
                                                    ${post.user_data[0].name}
                                                </p>
                                                <p class="date-time">${post.created_at}</p>
                                                <div class="contact-author">
                                                    <img src="${post.user_data[0].url_user}" alt="">
                                                    <p class="name-author">${post.user_data[0].name}</p>
                                                    <button class="mess-author" data-receiver-id="${post.user_id}">Nhắn
                                                        tin</button>
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
                                                <img src="${post.user_data[0].url_user}" alt="" class="img-author">
                                                <p class="name-author">
                                                    ${post.user_data[0].name}
                                                </p>
                                                <p class="date-time">${post.created_at}</p>
                                                <div class="contact-author">
                                                    <img src="${post.user_data[0].url_user}" alt="">
                                                    <p class="name-author">${post.user_data[0].name}</p>
                                                    <button class="mess-author" data-receiver-id="${post.user_id}">Nhắn
                                                        tin</button>
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
                <img src="/img/fb.jpg" alt="">
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
