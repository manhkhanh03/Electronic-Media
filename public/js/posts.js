const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

function postHost() {
    fetch('http://127.0.0.1:8000/api/post/hot')
        .then(response => response.json())
        .then(data => {
            let htmls = `
            <div class="post-1">
                <img src="${data[0].url}" alt="">
                <h3>${data[0].title}</h3>
                <p>${data[0].subheadline}</p>
                <div class="info-author">
                    <div class="author">
                        <img src="${data[0].user_data[0].url_user}" alt="" class="img-author">
                        <p class="name-author">
                        ${data[0].user_data[0].name}
                        </p>
                        <p class="date-time">${data[0].created_at}</p>
                        <div class="contact-author">
                            <img src="${data[0].user_data[0].url_user}" alt="">
                            <p class="name-author"> ${data[0].user_data[0].name}</p>
                            <button class="mess-author" data-receiver-id="${data[0].user_id}">Nhắn tin</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="post-2">`
            htmls += data.map(value => {
                if (value.hot == 2) {
                    return `
                        <div class="box-post-2">
                            <img src="${value.url}" alt="">
                            <h5>${value.title}</h5>
                            <p>${value.subheadline}</p>
                            <div class="info-author">
                                <div class="author">
                                    <img src="${value.user_data[0].url_user}" alt="" class="img-author">
                                    <p class="name-author">
                                        ${value.user_data[0].name}
                                    </p>
                                    <p class="date-time">${value.created_at}</p>
                                    <div class="contact-author">
                                        <img src="${value.user_data[0].url_user}" alt="">
                                        <p class="name-author">${value.user_data[0].name}</p>
                                        <button class="mess-author" data-receiver-id="${value.user_id}">Nhắn tin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                }
            }).join('')
            htmls += `</div><div class="poster">
                    <img src="img/blob.jpg" alt="">
                </div>`
            $('.post-host').innerHTML = htmls
        })
}

function listPost() {
    
    fetch('http://127.0.0.1:8000/api/post/hot_0')
        .then(response => response.json())
        .then(posts => {
            const boxListPost = $('.list-posts')
            let htmls = posts.map(post => `
                <li class="post-item" data-theme-type="${post.theme_type_id}">
                    <div class="post-item-div">
                        <img class="img-post" src="${post.url}" alt="">
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
                    </div>
                </li>
            `)

            boxListPost.innerHTML = htmls.join('')
        })
        .then(() => {
            setBtnlistPost()
        })
}

function setBtnlistPost() {
    const btnList = $$('.fun-item')
    const postItem = $$('.post-item')
    postItem.forEach((element, index) => {
        if (element.getAttribute('data-theme-type') === btnList[0].getAttribute('data-theme-type')) {
            element.classList.add('active_list_post')
        }
    })
    btnList.forEach((e) => {
        e.onclick = () => {
            postItem.forEach((element, index) => {
                if (element.getAttribute('data-theme-type') === e.getAttribute('data-theme-type')) {
                    element.classList.add('active_list_post')
                }else element.classList.remove('active_list_post')
                $('.fun-item.active').classList.remove('active')
                e.classList.add('active')
            });
            
        }
    })
    
}

function start() {
    postHost()
    listPost()
}

start()