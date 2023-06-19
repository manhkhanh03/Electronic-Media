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
        createComment()
    })
    handleLike()
    setMostAccessed()
}

function getPost() {
    const article_id = $('.box-post').getAttribute('data-id-article')
    fetch(`http://127.0.0.1:8000/api/articles?article_id=${article_id}`)
        .then(response => response.json())
        .then(data => {
            const author_id = data.author_id;
            let status = data.status_article;
            console.log(data)
            let htmls = `
                <h1 id="categories_id" data-cate-id="${data.categorie_id}">${data.data_article[0].data.text}</h1>
                <div class="info-author">
                        <div class="author">
                            <img src="${data.data_user[0].url}"
                                alt="" class="img-author">
                            <p class="name-author">
                                ${data.data_user[0].name}
                            </p>
                            <p class="date-time">${(new Date(data.created_at)).toLocaleString()}</p>
                            <p style="margin-left:10px; cursor: pointer;" class="follow no-active-follow" data-author-id="${data.author_id}" data-follow-id="${data.follow_id}"></p>
                            <div class="contact-author">
                                <img src="${data.data_user[0].url}" alt="">
                                <p class="name-author">${data.data_user[0].name}</p>
                                <button class="mess-author" data-receiver-id="${data.data_user[0].user_id}">Nhắn tin</button>
                            </div>
                        </div>
                    </div>`

            htmls += data.data_article.map(ele => {
                if (ele.type == "header" && ele.data.level == 2) {
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
            console.log(user_id)
            console.log(data)
            if (data[0] === 1) {
                $('#status').innerHTML = 'Bản nháp'
                if (data[1] == user_id) {
                    $('.list-btn').innerHTML = `
                        <a href="http://127.0.0.1:8000/index/editer/write_article/${data[2].id}"><button class="btn-item">Chỉnh sửa</button></a>
                        <button class="btn-item delete-article">Xóa</button>
                        <button class="btn-item post-article">Đăng</button>
                    `
                }
            }
            else if (data[0] === 2) {
                $('#status').innerHTML = 'Bài viết đang trong thời gian đợi kiểm duyệt <br> Vui lòng đợi!'
                if (data[1] == user_id) {
                    $('.list-btn').innerHTML = `
                        <a href="http://127.0.0.1:8000/index/editer/write_article/${data[2].id}"><button class="btn-item">Chỉnh sửa</button></a>
                        <button class="btn-item delete-article">Xóa</button>
                    `
                }
            }
            else if (data[0] === 3) {
                $('#status').style.display = 'none'
                if (data[1] == user_id || roleUser == 'admin') {
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
                    updateStatusArticle(data[2].id)
                }
        })
        .then(() => {
            handleRelatedNews()
            handleEventFollower()
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

function updateStatusArticle(id) {
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
                window.location.href = `http://127.0.0.1:8000/index/article/${data.title}/${data.id}`
            })
            .catch((err) => {
                alert('Đăng bài không thành công!' + ' \nLỗi:' + err)
            })
    }
}

function handleEventArticles() {
    const cm = $$('.write-comment-parent')
    const feedback = $$('.cm-item-feeling li:nth-child(2)')
    feedback.forEach((fb, index) => {
        fb.onclick = () => {
            if ($('.write-comment-parent.active-comment'))
                $('.write-comment-parent.active-comment').classList.remove('active-comment')
            cm[index].classList.add('active-comment')
            $('.write-comment-parent.active-comment input').value = $$('.cm-item-info .name')[index].innerHTML + ': '
            $('.write-comment-parent.active-comment input').focus()
            $('.write-comment-parent.active-comment .sent-comment').onclick = () => {
                handleWriteCommentParent($$('.cm-item-info-feeling')[index])
            }
        }
    })
}

function handleDateTime(date) {
    const hours = Math.floor(Math.abs(new Date().getTime() - (new Date(date))) / (3600 * 1000))
    let day;
    let dateTime = hours + ' Giờ trước';
    if (hours >= 24) {
        day = Math.floor(hours / 24)
        dateTime = day + ' Ngày trước';
    }
    return dateTime
}

function getComments() {
    fetch(`http://127.0.0.1:8000/api/comment?article_id=${article_id}`)
        .then(response => response.json())
        .then(comments => {
            let i
            const htmls = comments.map((cm, index) => {
                if (cm.user) {
                    return `
                        <div class="cm-item" >
                            <img src="${cm.user[0].url}" alt="">
                            <div class="cm-item-info-feeling">
                                <div class="cm-item-info">
                                    <h5 class="name">${cm.user[0].name}</h5>
                                    <p>${cm.content}</p>
                                </div>
                                <ul class="cm-item-feeling">
                                    <li>Thích</li>
                                    <li>Phản hồi</li>
                                    <li comment-id="${cm.user_id}">${handleDateTime(cm.created_at)}</li>
                                </ul>
                                <div class="son-comments" comment-id="${cm.id}"></div>
                                <div class="write-comment-parent" comment-id="${cm.id}">
                                    <img src="https://bloganchoi.com/wp-content/uploads/2022/02/avatar-trang-y-nghia.jpeg" alt="">
                                    <input type="text" name="content-comment" placeholder="Nhập bình luận...">
                                    <i style="cursor: pointer" class="fa-regular fa-paper-plane sent-comment"></i>
                                </div>
                            </div>
                        </div>
                    `
                }
                i = index + 1
            })

            comment.innerHTML = htmls.join('')
            return [comment, i]
        })
        .then((commentAndIndex) => {
            fetch(`http://127.0.0.1:8000/api/comment/parent?article_id=${article_id}`)
                .then((response) => response.json())
                .then(comments => {
                    const sonComments = $$('.son-comments')
                    sonComments.forEach((ele, i) => {
                        const commentId = ele.getAttribute('comment-id');
                        const matchingComments = comments.filter((cm) => cm.user && cm.parent_comment_id == commentId);
                        matchingComments.forEach((cm, index) => {
                            const hours = Math.floor(Math.abs(new Date().getTime() - (new Date(cm.created_at))) / (3600 * 1000));
                            const dateTime = hours >= 24 ? Math.floor(hours / 24) + ' Ngày trước' : hours + ' Giờ trước';

                            ele.insertAdjacentHTML('afterbegin', `
                                <div class="son-comment-item">
                                    <img src="${cm.user[0].url}" alt="">
                                    <div class="cm-item-info-feeling-parent">
                                    <div class="cm-item-info-parent">
                                        <h5 class="name">${cm.user[0].name}</h5>
                                        <p>${cm.content}</p>
                                    </div>
                                    <ul class="cm-item-feeling-parent">
                                        <li>Thích</li>
                                        <li>Phản hồi</li>
                                        <li comment-id="${cm.user_id}">${dateTime}</li>
                                    </ul>
                                    </div>
                                </div>
                                `);
                            commentAndIndex[1] += 1
                        });
                    })
                    commentAndIndex[1] ? $('.info-post-box p:nth-child(1)').innerHTML = `${commentAndIndex[1]} Bình luận` : $('.info-post-box p:nth-child(1)').innerHTML = `0 Bình luận`
                })
            return commentAndIndex[0]
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
            handleEventArticles()
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
                    addNewComment = `
                        <div class="cm-item">
                            <img src="${cm.user[0].url}" alt="">
                            <div class="cm-item-info-feeling-parent">
                                <div class="cm-item-info">
                                    <h5 class="name">${cm.user[0].name}</h5>
                                    <p>${cm.content}</p>
                                </div>
                                <ul class="cm-item-feeling">
                                    <li>Thích</li>
                                    <li>Phản hồi</li>
                                    <li>${handleDateTime(cm.created_at)}</li>
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
    fetch(`http://127.0.0.1:8000/api/user/${user_id}`)
        .then(response => response.json())
        .then(data => {
            user_id = data[0].id
            $('.write-comment img').src = data[0].url;
            $$('.write-comment-parent img').forEach((ele) => {
                ele.src = data[0].url;
            })
            handleTotalLike()
        })
        .catch(() => {
            handleTotalLike()
        })
}

function handleWriteCommentParent(feedback) {
    const inputCmParent = $('.write-comment-parent.active-comment input')
    if (String(inputCmParent.value).trim()) {
        const parentId = $('.write-comment-parent.active-comment').getAttribute('comment-id')
        const data = {
            user_id: user_id,
            article_id: article_id,
            content: inputCmParent.value,
            parent_comment_id: parentId
        }
        const options = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        }

        fetch('http://127.0.0.1:8000/api/comment', options)
            .then(response => response.json())
            .then(data => {
                let addNewComment
                Array(data).forEach((cm) => {
                    addNewComment = `
                        <div class="son-comment-item">
                            <img src = "${cm.user[0].url}" alt = "" >
                            <div class="cm-item-info-feeling-parent">
                                <div class="cm-item-info-parent">
                                    <h5 class="name">${cm.user[0].name}</h5>
                                    <p>${cm.content}</p>
                                </div>
                                <ul class="cm-item-feeling-parent">
                                    <li>Thích</li>
                                    <li>Phản hồi</li>
                                    <li comment-id="${cm.user_id}">${handleDateTime(cm.created_at)}</li>
                                </ul>
                            </div>
                        </div>
                `
                })
                feedback.querySelector('.son-comments').insertAdjacentHTML('afterbegin', addNewComment);
            })
            .then(() => {
                inputCmParent.value = ''
            })
    }
}

function handleTotalLike() {
    fetch(`http://127.0.0.1:8000/api/like?article_id=${article_id}&user_id=${user_id}`)
        .then(response => response.json())
        .then(data => {
            $('.info-post p:nth-child(1)').innerHTML = data.total + ' Lượt thích'
            if (JSON.parse(data.action)) {
                $('.feeling-box').classList.add('active-emotion')
            }
        })
}

function handleLike() {
    const like = $('.feeling .feeling-box:nth-child(1)')
    like.onclick = () => {
        like.classList.toggle('active-emotion')
        const activeLike = $('.feeling .feeling-box:nth-child(1).active-emotion')
        const data = {
            user_id: user_id,
            article_id: article_id,
        }
        const options = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        }
        if (!activeLike)
            options.method = 'delete'
        fetch(`http://127.0.0.1:8000/api/like`, options)
    }
}

function handleRelatedNews() {
    const categoryId = $('#categories_id').getAttribute('data-cate-id');
    fetch(`http://127.0.0.1:8000/api/articles/cate/related_news?article_id=${article_id}&categorie_id=${categoryId}`)
        .then(response => response.json())
        .then(data => {
            const listRelatedNews = $('.list-posts')
            const htmls = data.map(ele => {
                return `
                    <li class="post-item" data-theme-type="">
                        <a href="http://127.0.0.1:8000/index/article/${ele.title}/${ele.id}">
                            <div class="post-item-div">
                                <img class="img-post" src="${ele.image}" alt="">
                                <div class="information-post">
                                    <h3>${ele.title}</h3>
                                    <p>${ele.subheadline}</p>
                                    <div class="info-author">
                                        <div class="author">
                                            <img src="${ele.author[0].url}" alt="" class="img-author">
                                            <p class="name-author">
                                                ${ele.author[0].name}
                                            </p>
                                            <p class="follow no-active-follow" data-author-id="${ele.author_id}" data-follow-id="${ele.follow_id}"></p>
                                            <div class="contact-author">
                                                <img src="${ele.author[0].url}" alt="">
                                                <p class="name-author">${ele.author[0].name}</p>
                                                <button class="mess-author" data-receiver-id="${ele.author_id}">Nhắn
                                                    tin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                `
            })

            // < p class="date-time" > ${ (new Date(ele.created_at)).toLocaleString() }</ >

            listRelatedNews.innerHTML = htmls.join('')
        })
}

function setMostAccessed() {
    const mostAccessed = $('.most-accessed')
    fetch('http://127.0.0.1:8000/api/articles/hot?quantity=8')
        .then(response => response.json())
        .then(data => {
            console.log(data)
            const htmls = data.map(article => {
                return `
                    <li class="post-item" data-theme-type="${article.categorie_id}" data-article-id="${article.id}">
                        <div class="post-item-div">
                            <a href="http://127.0.0.1:8000/index/article/${article.title}/${article.id}">
                                <img class="img-post" src="${article.image}" alt="">
                            </a>
                            <div class="information-post">
                                <a href="http://127.0.0.1:8000/index/article/${article.title}/${article.id}">
                                    <h3>${article.title}</h3>
                                </a>
                                <div class="info-author">
                                    <div class="author">
                                        <img src="${article.author[0].url}" alt="" class="img-author">
                                        <p class="name-author">
                                            ${article.author[0].name}
                                        </p>
                                        <p class="follow no-active-follow" data-author-id="${article.author_id}" data-follow-id="${article.follow_id}"></p>
                                        <div class="contact-author">
                                            <img src="${article.author[0].url}" alt="">
                                            <p class="name-author">${article.author[0].name}</p>
                                            <button class="mess-author" data-receiver-id="${article.user_id}">Nhắn tin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                `
            })
            // < p class="date-time" > ${ new Date(article.created_at).toLocaleDateString() }</ >
            mostAccessed.innerHTML = htmls.join('')
        })
}

start()
