{{-- @php
use GuzzleHttp\Client;
$client = new Client();

$response = $client->get('http://127.0.0.1:8000/api/articles/hot_0');
$data = json_decode($response->getBody());
@endphp --}}
@extends('pattern')

@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="/css/index.css">
@endpush

@section('menu-nav-body')
    @push('info-web')
        <div class="post-host">
        </div>
        <div class="posts">
            <div class="post-left">
                <ul class="list-fun">
                    <li class="fun-item active" data-theme-type="2">Kinh tế</li>
                    <li class="fun-item" data-theme-type="3">Thể thao</li>
                    <li class="fun-item" data-theme-type="4">Giải trí</li>
                </ul>
                <ul class="list-posts">
                    {{-- @foreach ($posts_0 as $post)
                        <li class="post-item" data-theme-type="{{ $post->categorie_id }}" data-article-id="{{ $post->id }}">
                            <div class="post-item-div">
                                <a href="http://127.0.0.1:8000/index/article/{{ $post->title }}/{{ $post->id }}">
                                    <img class="img-post" src="{{ $post->image }}" alt="">
                                </a>
                                <div class="information-post">
                                    <a href="http://127.0.0.1:8000/index/article/${post.id}">
                                        <h3>{{ $post->title }}</h3>
                                        <p>{{ $post->subheadline }}</p>
                                    </a>
                                    <div class="info-author">
                                        <div class="author">
                                            <img src="{{ $post->author[0]->url }}" alt="" class="img-author">
                                            <p class="name-author">
                                                {{ $post->author[0]->name }}
                                            </p>
                                            <p class="date-time">{{ date('Y-m-d H:i:s', strtotime($post->created_at)) }}</p>
                                            <div class="contact-author">
                                                <img src="{{ $post->author[0]->url }}" alt="">
                                                <p class="name-author">{{ $post->author[0]->name }}</p>
                                                <button class="mess-author" data-receiver-id="{{ $post->user_id }}">Nhắn
                                                    tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach --}}
                </ul>
            </div>
            <div class="post-right">
                <img src="/img/somany.jpg" alt="" class="banner-post">
                <ul class="list-post-topic">
                </ul>
            </div>
        </div>
    @endpush
    @parent
@stop
<!-- Footer -->
@section('footer')
    @parent
@endsection


@section('codejs')
    @parent
@endsection

@push('js')
    <script src="/js/index.js"></script>
    <script src="/js/posts.js"></script>
    <script src="/js/follow.js"></script>
@endpush
