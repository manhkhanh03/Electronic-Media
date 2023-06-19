function start() {
    showCensorshipPost()
    handleSearchStatus_2()
}

start()

function handleShowCensorshipPost(posts) {
    const listCensorship = $('.list-censorship')
    const htmls = posts.map(article => {
        const hours = Math.floor(Math.abs(new Date().getTime() - (new Date(article.created_at))) / (3600 * 1000))
        let day;
        let dateTime = hours + ' Giờ trước';
        if (hours >= 24) {
            day = Math.floor(hours / 24)
            dateTime = day + ' Ngày trước';
        }
        return `
                    <div class="box-censorship-post">
                        <div class="column">
                            <div class="column-heading">
                                <input type="checkbox" name="checkbox-list-post" id="" data-article-id="${article.id}">
                                <div class="column-author">
                                    <img src="${article.author[0].url}" alt="">
                                    <p class="censorship-post-name-author">${article.author[0].name}</p>
                                </div>
                            </div>
                            <div class="column-heading">
                                <p class="title">${article.title}</p>
                                <p class="column-heading-subheadline">${article.subheadline}</p>
                            </div>
                            <div class="column-heading">
                                <p class="waiting-time">${dateTime}</p>
                                <p class="date-time">${(new Date(article.created_at)).toLocaleString()}</p>
                            </div>
                            <div class="column-heading">
                                <a  href="http://127.0.0.1:8000/index/article/${article.title}/${article.id}" class=""><button class="btn-check">Kiểm tra</button></a>
                                <button data-article-id="${article.id}" class="btn btn-delete">Xóa</button>
                                <button data-article-id="${article.id}" class="btn btn-confirm">Duyệt</button>
                            </div>
                        </div>
                    </div>
                `
    })
    listCensorship.innerHTML = htmls.join("")
}

function showCensorshipPost() {
    fetch('http://127.0.0.1:8000/api/articles/status')
        .then(response => response.json())
        .then(posts => {
            handleShowCensorshipPost(posts)
        })
        .then(() => {
            render()
            handleStatusCensorship()
            handleDeleteRequest()
        })
}

function handleStatusCensorship() {
    const btnAllCensorship = $('.censhorship-all-posts')
    const btnCensorship = $$('.btn.btn-confirm')
    const checkBoxCensorship = $$('input[name="checkbox-list-post"]')
    btnAllCensorship.onclick = () => {
        // let check = Number(totalPosts.innerHTML)
        const arrListActivating = [];
        checkBoxCensorship.forEach(element => {
            if (element.checked)
                arrListActivating.push(element.getAttribute('data-article-id'))
        });
        requestUpdateStatusCensorship(3, arrListActivating)
    }
    const totalPosts = $('.total-posts')
    btnCensorship.forEach((item, index) => {
        item.onclick = () => {
            const arrListActivating = []
            arrListActivating.push(item.getAttribute('data-article-id'))
            requestUpdateStatusCensorship(3, arrListActivating)
        }
    })
}

function requestUpdateStatusCensorship(status_id, article_ids = []) {
    const updatePromises = [];

    for (let i = 0; i < article_ids.length; i++) {
        const article_id = article_ids[i];
        const data = {
            status_id: status_id
        }

        const options = {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        }

        const updatePromise = fetch(`http://127.0.0.1:8000/api/articles/${article_id}`, options)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            });

        updatePromises.push(updatePromise);
    }

    Promise.all(updatePromises)
        .then(() => {
            location.href = 'http://127.0.0.1:8000/index/censorship';
        })
        .catch(error => {
            console.log(error);
        });
}


function render() {
    const checkAll = $('input[name="all"]');
    const totalPosts = $('.total-posts')
    let check;
    const allCardCheckBox = $$('input[name="checkbox-list-post"]');
    checkAll.addEventListener('click', () => {
        allCardCheckBox.forEach((input, index) => {
            if (checkAll.checked) {
                input.checked = true;
                totalPosts.innerHTML = index + 1;
                check = index + 1;
            } else {
                input.checked = false;
                totalPosts.innerHTML = 0;
                check = 0
            }
        })
    })

    allCardCheckBox.forEach((input, index) => {
        input.onclick = () => {
            check = Number(totalPosts.innerHTML);
            check += input.checked ? 1 : -1;
            totalPosts.innerHTML = check;
            if (input.checked && check == allCardCheckBox.length)
                checkAll.checked = true;
            else
                checkAll.checked = false;
        }
    })

    const censorship = $('.censhorship-all-posts')
    censorship.onclick = () => {
        const result = confirm('Bạn có muốn duyệt ' + check + ' bài viết không?')
        if (result) {
            result
        } else {
            result
        }
    }
}


function handleSearchArticlesStatus_2(value) {
    const data = {
        title: value,
        status_id: 2
    }

    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'aplication/json'
        },
        body: JSON.stringify(data)
    }

    fetch('http://127.0.0.1:8000/api/articles/search/articles', options)
        .then(response => response.json())
        .then(data => {
            handleShowCensorshipPost(data)
        })
}

function handleSearchStatus_2() {
    const searchArticles = $('input[name="column-search"]')
    searchArticles.onfocus = () => {
        searchArticles.onkeydown = (key) => {
            if (key.which === 13) {
                handleSearchArticlesStatus_2(searchArticles.value)
            }
        }
    }
    $('.column .search-article-2').onclick = () => {
        handleSearchArticlesStatus_2(searchArticles.value)
    }
}

function handleDeleteRequest() {
    const dele = $$('.btn-delete')
    dele.forEach((item) => {
        item.onclick = () => {
            let result = confirm('Bạn có chắc muốn xóa vĩnh viễn bài viết')

            const articleId = item.getAttribute('data-article-id')

            if (result) {
                const options = {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                }
                fetch(`http://127.0.0.1:8000/api/articles/${articleId}`, options)
                    .then(() => {
                        alert('Xóa bài viết thành công')
                        window.location.reload()
                    })
                    .catch((err) => {
                        alert('Xóa bài không thành công!' + ' \nLỗi:' + err)
                    })
                console.log(result, articleId)
            }
        }
    })

}
