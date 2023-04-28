const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
const sender_id = 17;

function showElement(element) {
    element.style.display = 'block';
}

function hideElement(element) {
    element.style.display = 'none';
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

function handleLoad() {
    const iconSearch = $('.fa-magnifying-glass');
    const input = $('#search');
    const mess = $('.fa-facebook-messenger')
    const boxMess = $('.box-mess');

    iconSearch.onclick = () => {
        input.style.animation = 'display 0.5s ease-in';
        input.style.right = '8%'
    }
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
    const inputMess = $('#input-mess')
    const sent = $('.fa-paper-plane')

    dialogbox.forEach((element, index) => {
        element.onclick = () => {
            nameMess.innerHTML = name[index].innerHTML;
            imgMess.src = img[index].src;
            hideElement(itemMess)
            showElement(privacyDialog)
        }
    });

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

function dialogMess(data) {
    let dialogbox = $$('.dialogbox')
    const dialogBoxPrivacy = $('.dialog-box-privacy')
    dialogbox.forEach(e => {
        e.addEventListener('click', () => {
            const receiver_id = e.getAttribute('data-id')
            dialogBoxPrivacy.setAttribute('data-receiver-id', receiver_id)
            let htmls = data.map((ele, i) => {
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
            delMess()
        })
    })
}

function getBoxMessenger() {
    const item = $('.item-mess');

    fetch(`http://127.0.0.1:8000/api/messenger/${sender_id}`)
        .then(response => response.json())
        .then(data => {
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
            const htmls = uniqueArray.map(messenger => {
                if (messenger.receiver_id != sender_id)
                    return `<div class="dialogbox" data-id="${messenger.receiver_id}">
                        <img src="img/gg.webp" alt="">
                        <div class="info-mess">
                            <p class="name">${messenger.name}</p>
                            <p class="info-mess">Bạn: ${messenger.content}</p>
                        </div>
                    </div>`
                else
                    return `<div class="dialogbox mess-active" data-id="${messenger.sender_id}">
                        <img src="img/gg.webp" alt="">
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
            handleLoad();
            dialogMess(data);
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

function showLogin() {
    const user = $('.fa-user')
    user.onclick = () => {
        window.location.href = 'http://127.0.0.1:8000/login'
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

showLogin()
getBoxMessenger()