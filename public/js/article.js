// const $ = document.querySelector.bind(document)
// const $$ = document.querySelectorAll.bind(document)
// import { mess } from './main.js'
// can sua 
const article_id = $('.box-post').getAttribute('data-id-article')
const comment = $('.comment-box')

function start() {
    getPost()
    getComments()
    $('.sent-comment').addEventListener('click', () => {
        console.log($('.sent-comment'))
        createComment()
    })
    handleTotalLike()
}

function getPost() {
    const article_id = $('.box-post').getAttribute('data-id-article')
    fetch(`http://127.0.0.1:8000/api/articles/${article_id}`)
        .then(response => response.json())
        .then(data => {
            const author_id = data.author_id;
            let status = data.status_article;
            let htmls = `
                <h1 id="categories" data-cate-id="${data.categorie_id}">${data.data_article[0].data.text}</h1>
                <div class="info-author">
                        <div class="author">
                            <img src="${data.data_user[0].url}"
                                alt="" class="img-author">
                            <p class="name-author">
                                ${data.data_user[0].name}
                            </p>
                            <p class="date-time">${(new Date(data.created_at)).toLocaleString()}</p>
                            <div class="contact-author">
                                <img src="${data.data_user[0].url}" alt="">
                                <p class="name-author">${data.data_user[0].name}</p>
                                <button class="mess-author" data-receiver-id="${data.data_user[0].user_id}">Nhắn tin</button>
                            </div>
                        </div>
                    </div>`

            htmls += data.data_article.map(ele => {
                if (ele.type == "subheadline" && ele.level == 2) {
                    return `<p class="subheadline">- ${ele.data.text}</p>`
                } else if (ele.type == "paragraph") {
                    return `<p class="text">${ele.data.text}</p>`
                } else if (ele.type == "image") {
                    return `<div class="box-post-img">
                                <img src="${ele.data.url}"
                                    alt="" class="post-img">
                                <p class="post-img-text">${ele.data.caption}</p>
                            </div>`
                }
            }).join('')
            //  them btn chinh sua, xoa va dang
            htmls += `<div class="list-btn">
            </div>`


            $('.box-list-item').innerHTML = htmls
            mess()
            return [status, author_id, data];
        })
        .then(data => {
            if (data[0] === 1) {
                $('#status').innerHTML = 'Bản nháp'
                if (data[1] === user_id) {
                    $('.list-btn').innerHTML = `
                        <a href="http://127.0.0.1:8000/index/editer/write_article/${data[2].id}"><button class="btn-item">Chỉnh sửa</button></a>
                        <button class="btn-item delete-article">Xóa</button>
                        <button class="btn-item post-article">Đăng</button>
                    `
                }
            }
            else if (data[0] === 2) {
                $('#status').innerHTML = 'Bài viết đang trong thời gian đợi kiểm duyệt <br> Vui lòng đợi!'
                if (data[1] === user_id) {
                    $('.list-btn').innerHTML = `
                        <a href="http://127.0.0.1:8000/index/editer/write_article/${data[2].id}"><button class="btn-item">Chỉnh sửa</button></a>
                        <button class="btn-item delete-article">Xóa</button>
                    `
                }
            }
            else {
                $('#status').style.display = 'none'
                if (data[1] === user_id) {
                    $('.list-btn').innerHTML = `
                        <a href="http://127.0.0.1:8000/index/editer/write_article/${data[2].id}"><button class="btn-item">Chỉnh sửa</button></a>
                        <button class="btn-item delete-article">Xóa</button>
                    `
                }
            }
            if (user_id) {
                $('.delete-article').onclick = () => {
                    deleteArticle(data[2].id)
                }
            }
            if ($('.post-article'))
                $('.post-article').onclick = () => {
                    postArticle(data[2].id)
                }
        })
}

function deleteArticle(id) {
    let result = confirm('Bạn có chắc muốn xóa vĩnh viễn bài viết')
    if (result) {
        const options = {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
        }
        fetch(`http://127.0.0.1:8000/api/articles/${id}`, options)
            .then(() => {
                alert('Đã xóa bài viết thành công')
            })
            .catch((err) => {
                alert('Xóa bài không thành công!' + ' \nLỗi:' + err)
            })
    }
}

function postArticle(id) {
    let result = confirm('Bạn có chắc muốn đăng bài viết')
    if (result) {
        const options = {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                status_id: 2
            })
        }
        fetch(`http://127.0.0.1:8000/api/articles/${id}`, options)
            .then(response => response.json())
            .then((data) => {
                alert('Đã đăng bài viết thành công')
                window.location.href = `http://127.0.0.1:8000/index/article/${data.id}`
            })
            .catch((err) => {
                alert('Đăng bài không thành công!' + ' \nLỗi:' + err)
            })
    }
}

function getComments() {
    fetch(`http://127.0.0.1:8000/api/comment/${article_id}`)
        .then(response => response.json())
        .then(comments => {
            let i
            const htmls = comments.map((cm, index) => {
                if (cm.user) {
                    const hours = Math.floor(Math.abs(new Date().getTime() - (new Date(cm.created_at))) / (3600 * 1000))
                    let day;
                    let dateTime = hours + ' Giờ trước';
                    if (hours >= 24) {
                        day = Math.floor(hours / 24)
                        dateTime = day + ' Ngày trước';
                    }
                    return `
                        <div class="cm-item">
                            <img src="${cm.user[0].url}" alt="">
                            <div class="cm-item-info-feeling">
                                <div class="cm-item-info">
                                    <h5 class="name">${cm.user[0].name}</h5>
                                    <p>${cm.content}</p>
                                </div>
                                <ul class="cm-item-feeling">
                                    <li>Thích</li>
                                    <li>Phản hồi</li>
                                    <li>${dateTime}}</li>
                                    <li>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    `
                }
                i = index
            })

            $('.info-post-box p:nth-child(1)').innerHTML = `${i} Bình luận`
            comment.innerHTML = htmls.join('')
            return comment
        })
        .then((comment) => {
            const cmItem = $$('.comment-box .cm-item')
            cmItem.forEach((element, i) => {
                if (i > 4)
                    element.style.display = 'none'
            });
            const showAll = document.createElement("p")
            showAll.innerHTML = 'Xem tất cả bình luận...'
            showAll.classList.add('show-all-cm')
            showAll.style.cursor = 'pointer'
            comment.appendChild(showAll)

            showAll.onclick = () => {
                cmItem.forEach((element) => {
                    element.style.display = 'flex'
                });
                comment.removeChild(showAll)
            }
            return comment
        })
        .then((cm) => {
            addImgComment()
        })
}

function createComment() {
    const content = $('input[name="content-comment')
    const data = {
        user_id: user_id,
        article_id: article_id,
        content: content.value
    }
    const options = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    }
    if (String(content.value).trim()) {
        fetch('http://127.0.0.1:8000/api/comment', options)
            .then(response => response.json())
            .then(data => {
                let addNewComment
                Array(data).forEach((cm) => {
                    const hours = Math.floor(Math.abs(new Date().getTime() - (new Date(cm.created_at))) / (3600 * 1000))
                    let day;
                    let dateTime = hours + ' Giờ trước';
                    if (hours >= 24) {
                        day = Math.floor(hours / 24)
                        dateTime = day + ' Ngày trước';
                    }
                    addNewComment = `
                        <div class="cm-item">
                            <img src="${cm.user[0].url}" alt="">
                            <div class="cm-item-info-feeling">
                                <div class="cm-item-info">
                                    <h5 class="name">${cm.user[0].name}</h5>
                                    <p>${cm.content}</p>
                                </div>
                                <ul class="cm-item-feeling">
                                    <li>Thích</li>
                                    <li>Phản hồi</li>
                                    <li>${dateTime}</li>
                                </ul>
                            </div>
                        </div>
                `
                })
                comment.insertAdjacentHTML('afterbegin', addNewComment);
            })
            .then(() => {
                content.value = ''
            })
    }
}

async function addImgComment() {
    fetch(`http://127.0.0.1:8000/api/user/${login_id}`)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            $('.write-comment img').src = data[0].url;

        })
}

function handleTotalLike() {
    fetch(`http://127.0.0.1:8000/api/like/${article_id}/${user_id}`)
        .then(response => response.json())
        .then(data => { 
            console.log(JSON.parse(data.action))
            $('.info-post p:nth-child(1)').innerHTML = data.total + ' Lượt thích'
            if (JSON.parse(data.action)) {
                $('.feeling-box').classList.add('active-emotion')
            }
        })
}

start()
