const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

function isSign() {
    const btn = $('#sign-up');
    btn.onclick = () => {
        const name = $('#name').value.trim();
        const password = $('#password').value.trim();
        const email = $('#email').value.trim();
        const repeat = $('#repeat').value.trim();
        
        if (name != '' && password != '' && email != '' && repeat != '') {
            if (password === repeat && password.length >= 8) {
                const data = {
                    username: name,
                    password: password,
                    email: email
                }

                const options = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }

                fetch('http://127.0.0.1:8000/api/login', options)
                    .then(data => data.json())
                    .then((data) => {
                            if(!data.status)
                                window.location.href = '/index/login'
                            else $('.noti-fail').innerHTML = '<p style="text-align: center; padding: 10px 0; color: red;">Tên đăng nhập đã tồn tại</p>'
                    })
                    .catch(err => { 
                        console.log(err)
                    })
            } else
                $('.noti-fail').innerHTML = '<p style="text-align: center; padding: 10px 0; color: red;">Mật khẩu không đủ mạnh hoặc không trùng</p>'
                
        }else 
            $('.noti-fail').innerHTML = '<p style="text-align: center; padding: 10px 0; color: red;">Không được để trống thông tin và mật khẩu dài hơn 8 ký tự</p>'
    }
    
} 

isSign();