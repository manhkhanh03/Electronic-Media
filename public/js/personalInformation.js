const nameUser = $('input[name="name-user"]')
const address = $('input[name="address"]')
const phone = $('input[name="phone-number"]')
const email = $('input[name="email"]')
const oldPassword = $('input[name="old-password"]')
const newPassword = $('input[name="new-password"]')
const confirmPassword = $('input[name="confirm-password"]')
const imgUser = $('.box-personal-info--img img')


function getInfoUserByLoginId() {
    fetch('http://127.0.0.1:8000/api/login/user/id')
        .then(response => response.json())
        .then(id => {
            login_id = id.id
            return login_id
        })
        .then(login_id => {
            fetch(`http://127.0.0.1:8000/api/user/${login_id}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(element => {
                        user_id = element.id
                        nameUser.value = element.name
                        address.value = element.address
                        phone.value = element.phone
                        email.value = element.email
                        imgUser.src = element.url
                    });
                    console.log(data);
                })
        })

};

function handleUpdateUser() {
    const data = {
        name: nameUser.value,
        address: address.value,
        phone: phone.value,
        email: email.value
    }

    const options = {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }

    fetch(`http://127.0.0.1:8000/api/user/${user_id}`, options)
        .then(response => response.json())
        .then(() => {
            alert('Cập nhật thông tin thành công')
        })
        .catch(e => {
            alert(`Cập nhậţ thông tin thất bại. Lỗi ${e.message}`)
        })
}

function handleUpdateImageUser() {
    const data = {
        url: imgUser.src
    }

    const options = {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }

    fetch(`http://127.0.0.1:8000/api/img/${user_id}`, options)
        .then(response => response.json())
        .then(data => {
            location.href = 'http://127.0.0.1:8000/index/personalInformation'
        })
        .catch(e => {
            alert(`Cập nhậţ thông tin thất bại. Lỗi ${e.message}`)
        })

}

function handleAlterPassword() {
    if (String(oldPassword.value).trim().length !== 0 ||
        String(newPassword.value).trim().length !== 0 ||
        String(confirmPassword.value).trim().length !== 0
    ) {
        if (String(oldPassword.value).trim().length) {
            let data = {
                password: String(oldPassword.value).trim()
            }
            let options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }
            fetch(`http://127.0.0.1:8000/api/login/check_pass/${login_id}`, options)
                .then(response => response.json())
                .then((res) => {
                    if (res.status == 'true') {
                        if (String(newPassword.value).trim().length >= 8 && String(newPassword.value).trim() === String(confirmPassword.value).trim()) {
                            data.password = String(newPassword.value).trim()
                            options.method = 'PATCH'
                            options.body = JSON.stringify(data)
                            fetch(`http://127.0.0.1:8000/api/login/${login_id}`, options)
                                .then(() => {
                                    alert('Cập nhật mật khẩu thành công')
                                })
                                .catch(() => {
                                    alert('Cập nhật mật khẩu thất bại')
                                })
                        } else {
                            newPassword.style.border = '1px solid #ff620d';
                            confirmPassword.style.border = '1px solid #ff620d';
                            oldPassword.style.border = '1px solid #34fc2b';
                        }
                    } else {
                        oldPassword.style.border = '1px solid #ff620d';
                    }
                })
        }
    }
}

function start() {
    getInfoUserByLoginId()
    const btn = $('button[type="submit"]')
    const inputFile = $('input[name="file-img"]')

    inputFile.addEventListener('change', () => {
        imgUser.src = URL.createObjectURL(inputFile.files[0])
    })
    const checkboxInfo = $('input[name = "checkbox-info"]')
    const checkboxPass = $('input[name = "checkbox-password"]')
    btn.onclick = () => {
        if (checkboxInfo.checked) {
            handleUpdateUser()
            handleUpdateImageUser()
        }
        if (checkboxPass.checked)
            handleAlterPassword()
    }


}

start()
