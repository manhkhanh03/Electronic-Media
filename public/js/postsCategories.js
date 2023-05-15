const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
const cateId = $('#categories').getAttribute('data-cate-id')

function showListPosts() {
    fetch(`http://127.0.0.1:8000/api/post/theme_type/${cateId}`)
        .then(response => response.json())
        .then(posts => {
            const listPost = $('.list-post')
            const htmls = posts.map((post) => `
                        <li class="post-item" data="">
                            <div class="post-item-div">
                                <div class="information-post">
                                    <h3>${post.title}</h3>
                                    <p>${post.subheadline}</p>
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
                                                <button class="mess-author" data-receiver-id="${post.user_id}">Nhắn tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="img-post" src="${post.url}" alt="">
                            </div>
                        </li>
            `) 
            listPost.innerHTML = htmls.join('')
        })
}

showListPosts()