// login.js module
const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
let user = {}

function handleLogin() {

    const name = $('#username').value
    const password = $('#password').value

    const data = {
        name: name,
        password: password
    }
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }
    fetch('http://127.0.0.1:8000/api/login/checkLogin', options)
        .then((response) => response.json())
        .then((data) => {
            user = data;
            window.location.href = 'index'
        })
        .catch(() => {
            $('.noti-fail').innerHTML = '<p style="text-align: center; padding: 10px 0; color: red;">Tên đăng nhập hoặc mật khẩu không khớp</p>'
        })
}
const login = $('.login')
if (login) {
    login.addEventListener('click', () => {
        handleLogin()
    })
}

export { user };