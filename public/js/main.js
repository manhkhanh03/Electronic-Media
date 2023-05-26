const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
const urlParams = new URLSearchParams(window.location.search);

let sender_id = urlParams.get('id');
function checkUser() {
    if (sender_id) {
        fetch(`http://127.0.0.1:8000/api/user/${sender_id}`)
            .then(response => response.json())
            .then(data => {
                showUser(data)
            })
            .catch(err => { console.log(err) })
    } else {
        $('.box-user').innerHTML = `<i class="fa-solid fa-user"></i>`
    }
}

function showUser(data) {
    const boxUser = $('.box-user')
    if (sender_id) {
        boxUser.innerHTML = `<div class="box-user">
                        <p>${data[0].name}</p>
                        <img src="${data[0].url}" alt="">
                        <ul class="box-logout" style="display: none;">
                            <li>Sửa thông tin</li>
                            <li>Logout</li>
                        </ul>
                    </div>`
    } else {
        boxUser.innerHTML = `<i class="fa-solid fa-user"></i>`
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
            if (sender_id == ele.sender_id && receiver_id == ele.receiver_id)
                return `<li class="box-dialog-box-privacy" data-id-mess="${ele.id}">
                            <div class="me">${ele.content}
                                <div class="mess-hover">
                                    <i class="fa-solid fa-ellipsis-vertical delete-mess"></i>
                                    <div class="box-delete-message" data-id-mess="${ele.id}">Xóa tin nhắn</div>
                                </div>
                            </div>
                            </li>`
            else if (sender_id == ele.receiver_id && receiver_id == ele.sender_id)
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
    if (!sender_id) {
        item.innerHTML = `
                        <div class="none">Không có tin nhắn nào <br> Hãy đăng nhập để sử dụng tính năng nhắn tin</div>
           `
        handleLoad()
    } else {
        fetch(`http://127.0.0.1:8000/api/messenger/${sender_id}`)
            .then(response => response.json())
            .then(data => {
                data.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
                const htmls = handleMess(data).map(messenger => {
                    if (messenger.receiver_id != sender_id)
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
            sender_id: sender_id,
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

    if (sender_id) {
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
            if (receiver_id != sender_id) {
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

checkUser()
mess()
getBoxMessenger()
export {mess} 