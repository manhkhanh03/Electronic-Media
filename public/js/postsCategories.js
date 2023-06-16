// const $ = document.querySelector.bind(document)
// const $$ = document.querySelectorAll.bind(document)
const cateId = $('#categories').getAttribute('data-cate-id')
// import {mess} from './main.js'

function showListPosts() {
    console.log(cateId)
    fetch(`http://127.0.0.1:8000/api/articles/categories?categorie_id=${cateId}`)
        .then(response => response.json())
        .then(posts => {
            console.log(posts)
            const listPost = $('.list-post')
            const htmls = posts.map((post) => `
                        <li class="post-item" data="">
                            <div class="post-item-div">
                                <div class="information-post">
                                    <a href="http://127.0.0.1:8000/index/article/${post.title}/${post.id}">
                                        <h3>${post.title}</h3>
                                        <p>${post.subheadline}</p>
                                    </a>
                                     <div class="info-author">
                                        <div class="author">
                                            <img src="${post.author[0].url}" alt="" class="img-author">
                                            <p class="name-author">
                                                ${post.author[0].name}
                                            </p>
                                            <p class="date-time">${(new Date(post.created_at)).toLocaleString()}</p>
                                            <div class="contact-author">
                                                <img src="${post.author[0].url}" alt="">
                                                <p class="name-author">${post.author[0].name}</p>
                                                <button class="mess-author" data-receiver-id="${post.author_id}">Nhắn tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="http://127.0.0.1:8000/index/article/${post.title}/${post.id}">
                                    <img class="img-post" src="${post.image}" alt="">
                                </a>
                            </div>
                            
                        </li>
            `) 
            listPost.innerHTML = htmls.join('')
            mess();
        })
}

showListPosts()