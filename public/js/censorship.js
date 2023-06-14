function start() {
    checkRoleAdmin()
    showCensorshipPost()
}

start()

function checkRoleAdmin() {
    fetch('http://127.0.0.1:8000/api/role/get')
        .then(response => response.json())
        .then(role => {
            console.log(role)
            if (role.role === 'reader' || role.role === 'editor') 
                location.href = 'http://127.0.0.1:8000/index/index'
        })
}

function showCensorshipPost() {
    fetch('http://127.0.0.1:8000/api/articles/status')
        .then(response => response.json())
        .then(posts => {
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
                                <input type="checkbox" name="checkbox-list-post" id="">
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
                                <a  href="http://127.0.0.1:8000/index/article/${article.title}/${article.id}" class=""><button class="btn btn-check">Kiểm tra</button></a>
                                <a href="#" class=""><button class="btn btn-confirm">Duyệt</button></a>
                            </div>
                        </div>
                    </div>
                `
            })

            listCensorship.innerHTML = htmls.join("")
        })
        .then(() => {
            render()
        })
}

function render() {
    let check = 0;
    const checkAll = $('input[name="all"]');
    const totalPosts = $('.total-posts')
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