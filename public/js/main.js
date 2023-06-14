// const { hide } = require("@popperjs/core");

const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
// const urlParams = new URLSearchParams(window.location.search);
let login_id;
let roleUser;
let user_id;
fetch('http://127.0.0.1:8000/api/login/user/id')
    .then(response => response.json())
    .then(id => {
        login_id = id.id;
    })
    .then(() => {
        return new Promise(async (resolve) => {
            await checkUser();
            resolve();
        });
    });

function getRole() {
    fetch('http://127.0.0.1:8000/api/role')
        .then(response => response.json())
        .then(role => {
            roleUser = role.role
        })
        .then(() => {
            permission()
        })
}

getRole()

async function getUserId() {
    return new Promise((resolve, reject) => {
        fetch(`http://127.0.0.1:8000/api/user/${login_id}`)
            .then(response => response.json())
            .then(data => {
                user_id = data.id;
                resolve(user_id);
            })
            .catch(error => reject(error));
    });
}

async function getUser() {
    fetch(`http://127.0.0.1:8000/api/user/${login_id}`)
        .then(response => response.json())
        .then(data => {
            user_id = data[0].id;
            const boxUser = $('.box-user')
            boxUser.innerHTML = `<div class="box-user">
                        <p>${data[0].name}</p>
                        <img src="${data[0].url}" alt="">
                        <ul class="box-logout" style="display: none;">
                            <li>
                                <a href="http://127.0.0.1:8000/index/personalInformation">
                                    <i class="fa-solid fa-user"></i>
                                    Thông tin cá nhân
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa-solid fa-right-from-bracket item-logout"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>`
            const logout = $('.box-logout')
            boxUser.addEventListener('click', () => {
                logout.style.display = logout.style.display == 'none' ? 'block' : 'none';
            })

            document.addEventListener('click', (event) => {
                if (event.target.matches('.box-user') || event.target.closest('.box-user')) {
                    return;
                }
                if (logout.style.display == 'block') {
                    hideElement(logout)
                }
            });
        })
        .then(() => {
            const logout = $('.box-logout li:nth-child(2)')
            logout.addEventListener('click', () => {
                handleLogout();
             })
        })
        .catch(err => { console.log(err) })
}

async function checkUser() {
    if (login_id) {
        await getUser();
    } else {
        permission()
        $('.box-user').innerHTML = `<a href="http://127.0.0.1:8000/index/login"><i class="fa-solid fa-user"></i></a>`
    }
}

function addMessage(text) {
    const log = $('.dialog-box-privacy');
    const newElement = document.createElement('div');
    newElement.className = 'box-dialog-box-privacy';
    const newParagraph = document.createElement('p');
    newParagraph.className = 'me';
    newParagraph.textContent = text;
    newElement.appendChild(newParagraph);
    log.append(newElement);
}

function handlingMessageDisplay(data, dialogBoxPrivacy, receiver_id) {
    let htmls = data.map((ele) => {
        if (receiver_id == ele.receiver_id || receiver_id == ele.sender_id) {
            if (login_id == ele.sender_id && receiver_id == ele.receiver_id)
                return `<li class="box-dialog-box-privacy" data-id-mess="${ele.id}">
                            <div class="me">${ele.content}
                                <div class="mess-hover">
                                    <i class="fa-solid fa-ellipsis-vertical delete-mess"></i>
                                    <div class="box-delete-message" data-id-mess="${ele.id}">Xóa tin nhắn</div>
                                </div>
                            </div>
                            </li>`
            else if (login_id == ele.receiver_id && receiver_id == ele.sender_id)
                return `<li class="box-dialog-box-privacy"><p class="you">${ele.content}</p></li>`
        }
    }).join('')
    dialogBoxPrivacy.innerHTML = htmls
}

function dialogMess(data, receiver_id) {
    let dialogbox = $$('.dialogbox')
    const dialogBoxPrivacy = $('.dialog-box-privacy')
    dialogbox.forEach(e => {
        if (!receiver_id) {
            const receiver_id = e.getAttribute('data-id')
            e.addEventListener('click', () => {
                handlingMessageDisplay(data, dialogBoxPrivacy, receiver_id)
                dialogBoxPrivacy.setAttribute('data-receiver-id', receiver_id)
            })
        } else {
            handlingMessageDisplay(data, dialogBoxPrivacy, receiver_id)
            dialogBoxPrivacy.setAttribute('data-receiver-id', receiver_id)
        }
        delMess()
    })
}

function handleMess(data) {
    let groupedData = data.reduce((acc, item) => {
        let key = [item.sender_id, item.receiver_id].sort().join('-');
        if (!acc[key]) {
            acc[key] = [];
        }
        acc[key].push(item);
        return acc;
    }, {});
    let uniqueArray = Object.values(groupedData).map(group => group.reduce((a, b) => new Date(a.created_at).getTime() >
        new Date(b.created_at).getTime() ? a : b))//.filter(item => sender_id != item.receiver_id);
    return uniqueArray;
}

function getBoxMessenger() {
    const item = $('.item-mess');
    if (!login_id) {
        item.innerHTML = `
                        <div class="none">Không có tin nhắn nào <br> Hãy đăng nhập để sử dụng tính năng nhắn tin</div>
           `
        handleLoad()
    } else {
        fetch(`http://127.0.0.1:8000/api/messenger/${login_id}`)
            .then(response => response.json())
            .then(data => {
                data.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
                const htmls = handleMess(data).map(messenger => {
                    if (messenger.receiver_id != login_id)
                        return `<div class="dialogbox" data-id="${messenger.receiver_id}">
                            <img src="${messenger.url}" alt="">
                            <div class="info-mess">
                                <p class="name">${messenger.name}</p>
                                <p class="info-mess">Bạn: ${messenger.content}</p>
                            </div>
                        </div>`
                    else
                        return `<div class="dialogbox mess-active" data-id="${messenger.sender_id}">
                            <img src="${messenger.url}" alt="">
                            <div class="info-mess">
                                <p class="name">${messenger.name}</p>
                                <p class="info-mess">${messenger.content}</p>
                            </div>
                        </div>`
                }
                )
                item.innerHTML = htmls.join('');
                return data;
            })

            .then(data => {
                const privacyDialog = $('.privacy-dialog')
                let htmls = `<div class="user">
                                <i class="fa-solid fa-chevron-left"></i>
                                <img src="" alt="">
                                <p class="name"></p>
                            </div>
                            <ul class="dialog-box-privacy"></ul>
                            <div class="input-mess">
                                <input type="text" name="" id="input-mess" placeholder="Nhập tin nhắn...">
                                <i class="fa-regular fa-paper-plane"></i>
                    </div>`
                privacyDialog.innerHTML = htmls;

                handleLoad()
                dialogMess(data)
            })
            .then(() => {
                const sent = $('.fa-paper-plane')
                const inputValue = $('#input-mess')
                inputValue.addEventListener('focus', () => {
                    inputValue.addEventListener('keydown', (event) => {
                        if (event.which === 13) {
                            sent.click()
                        }
                    })
                })
                sent.onclick = () => {
                    postMessenger(inputValue);
                }
            })
    }
}

function postMessenger(inputValue) {
    const dialogBoxPrivacy = $('.dialog-box-privacy')
    const receiver_id = dialogBoxPrivacy.getAttribute('data-receiver-id')
    if (inputValue.value.trim() != '') {
        const data = {
            sender_id: login_id,
            receiver_id: receiver_id,
            content: inputValue.value
        }
        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }
        console.log(data)
        fetch(`http://127.0.0.1:8000/api/messenger`, options)
            .then(() => {
                let htmls = dialogBoxPrivacy.innerHTML;
                htmls += `<div class="box-dialog-box-privacy"><p class="me">${data.content}</p></div>`
                dialogBoxPrivacy.innerHTML = htmls;
                inputValue.value = ''
            })
            .catch((err) => {
                console.log(err);
            })
    }
}

function delMess() {
    const del = $$('.delete-mess')
    const boxDel = $$('.box-delete-message')
    del.forEach((ele, i) => {
        ele.onclick = () => {
            boxDel[i].style.display = 'block'
            boxDel[i].onmouseout = () => {
                boxDel[i].style.display = 'none'
            }
            boxDel[i].onclick = () => {
                const idMess = boxDel[i].getAttribute('data-id-mess')
                const options = {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }
                fetch(`http://127.0.0.1:8000/api/messenger/${idMess}`, options)
                    .then(data => {
                        const boxDialogBoxPrivacy = $('.dialog-box-privacy')
                        const children = boxDialogBoxPrivacy.querySelectorAll(`[data-id-mess="${idMess}"]`);
                        console.log(children)
                        children.forEach(child => {
                            child.remove();
                        });
                    })
                    .catch(e => {
                        console.log(e);
                    })
            }
        }
    })
}

function showElement(element) {
    element.style.display = 'block';
}

function hideElement(element) {
    element.style.display = 'none';
}

function handleLoad() {
    const mess = $('.fa-facebook-messenger')
    const boxMess = $('.box-mess');

    mess.onclick = () => {
        boxMess.style.display = boxMess.style.display == 'none' ? 'block' : 'none';
    }

    document.addEventListener('click', (event) => {
        if (event.target.matches('.fa-facebook-messenger') || event.target.closest('.fa-facebook-messenger') || event.target.matches('.box-mess') || event.target.closest('.box-mess') || event.target.matches('.mess-author') || event.target.closest('.mess-author')) {
            return;
        }
        if (boxMess.style.display == 'block') {
            hideElement(boxMess);
            hideElement($('.box-logout'))
        }
    });

    const dialogbox = $$('.dialogbox');
    const name = $$('.dialogbox .name')
    const img = $$('.dialogbox img');
    const nameMess = $('.privacy-dialog .name')
    const imgMess = $('.privacy-dialog img')
    const privacyDialog = $('.privacy-dialog')
    const itemMess = $('.item-mess')
    const prev = $('.fa-chevron-left')
    const sent = $('.fa-paper-plane')

    dialogbox.forEach((element, index) => {
        element.onclick = () => {
            nameMess.innerHTML = name[index].innerHTML;
            imgMess.src = img[index].src;
            hideElement(itemMess)
            showElement(privacyDialog)
        }
    });

    if (login_id) {
        prev.onclick = () => {
            hideElement(privacyDialog)
            showElement(itemMess)
            getBoxMessenger()
        }

        sent.onclick = () => {
            addMessage(inputMess.value);
            inputMess.value = '';
        }
    }
}

function mess() {
    const btnMess = $$('.mess-author')
    const imgUrl = $$('.contact-author img')
    const nameAuthor = $$('.contact-author .name-author')

    btnMess.forEach((element, index) => {
        element.addEventListener('click', () => {
            const receiver_id = element.getAttribute('data-receiver-id')
            if (receiver_id != user_id) {
                $('.box-mess').style.display = 'block';
                fetch(`http://127.0.0.1:8000/api/messenger/${receiver_id}`)
                    .then(response => response.json())
                    .then(data => {
                        data.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
                        const nameMess = $('.privacy-dialog .name')
                        const imgMess = $('.privacy-dialog img')
                        console.log(element.getAttribute('data-receiver-id'))
                        imgMess.src = imgUrl[index].src;
                        nameMess.innerHTML = nameAuthor[index].innerHTML
                        dialogMess(data, receiver_id)
                    })
                    .then(() => {
                        $('.item-mess').style.display = 'none';
                        $('.privacy-dialog').style.display = 'block';
                    })
            }
        })
    });
}

function permission() {
    const boxIcon = $('.box-icon-mess')
    console.log(boxIcon, roleUser)
    switch (roleUser) {
        case 'reader':
            boxIcon.innerHTML = `
                            <i class="fa-brands fa-facebook-messenger"></i>
                           `
            break;
        case 'editer':
            boxIcon.innerHTML = `
                            <i class="fa-solid fa-circle-plus"></i>
                            <div class="box-permission">
                                <i class="fa-brands fa-facebook-messenger"></i>
                              <a href="http://127.0.0.1:8000/index/editer/write_article"><i class="fa-solid fa-pen-nib"></i></a>
                            </div>
                           `
            break;
        case 'admin':
            boxIcon.innerHTML = `
                            <i class="fa-solid fa-circle-plus"></i>
                            <div class="box-permission">
                                <i class="fa-brands fa-facebook-messenger"></i>
                                <a href="http://127.0.0.1:8000/index/editer/write_article"><i class="fa-solid fa-pen-nib"></i></a>
                                <a href="http://127.0.0.1:8000/index/censorship"> <i class="fa-solid fa-list-check"></i></a>
                            </div>
                           `
            break;
    }
    if (roleUser == "admin" || roleUser == "editer")
        eventPermission()
    mess()
    getBoxMessenger()
    handleLoad()
}

function handleClass(add, classAdd, classRemove) {
    add.classList.add(classAdd)
    add.classList.remove(classRemove)
}

function eventPermission() {
    let add = $('.fa-circle-plus')
    const per = $('.box-permission')
    if (add) {
        add.onclick = () => {
            per.style.display = 'flex'
            per.style.animation = 'display .25s linear'
            per.style.right = '42px'
            handleClass(add, 'fa-circle-minus', 'fa-circle-plus')
            eventPermission()
        }
    }
    else {
        add = $('.fa-circle-minus') 
        add.onclick = () => {
            // per.style.animation = 'display .25s ease'
            // per.style.animationDirection = 'reverse'
            per.style.right = '-0%'
            handleClass(add, 'fa-circle-plus', 'fa-circle-minus')
            per.style.display = 'none'
            eventPermission()
        }
    }
}

function handleLogout() {
    fetch('http://127.0.0.1:8000/api/login/logout/user')
        .then(() => {
            location.href = 'http://127.0.0.1:8000/index/login'
        })
        .catch(err => { 
            console.log('error: ' + err)
        })
}

// export { mess, getUser }