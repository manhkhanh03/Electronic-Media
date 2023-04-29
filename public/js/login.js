const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

function handleLogin() {
    const login = $('.login')
    login.onclick = () => {
        const name = $('#username').value
        const password = $('#password').value
        fetch('http://127.0.0.1:8000/api/login')
            .then(response => response.json())
            .then(data => {
                console.log(name, password)
                data.forEach(ele => {
                    if (name == ele.name || name == ele.email && password == ele.password) {
                        window.location.href = 'home'
                    }
                });
                $('.noti-fail').innerHTML = '<p style="text-align: center; padding: 10px 0; color: red;">Tên đăng nhập hoặc mật khẩu không khớp</p>'
            })
    }
}

handleLogin()