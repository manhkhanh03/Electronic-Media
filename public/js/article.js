const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
import { mess } from './main.js'
// can sua 
const user_id = 2

function start() {
    getPost()
}

function getPost() {
    const article_id = $('.box-post').getAttribute('data-id-article')
    fetch(`http://127.0.0.1:8000/api/articles/${article_id}`)
        .then(response => response.json())
        .then(data => {
            const author_id = data.author_id;
            let status = data.status_article;
            // $('#categories').innerHTML = data.data_article[0].data.text
            let htmls = `
                <h1 id="categories" data-cate-id="${data.data_user[0].categorie_id}">${data.data_article[0].data.text}</h1>
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
            console.log(data[2].id)
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
            $('.delete-article').onclick = () => { 
                deleteArticle(data[2].id)
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

start()
