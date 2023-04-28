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
                    name: name,
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
                    .then(() => {
                        window.location.href = '/login'
                    })
                    .catch(err => { 
                        console.log(err)
                    })
            }
                
        }
        $('.noti-fail').innerHTML = '<p style="text-align: center; padding: 10px 0; color: red;">Không được để trống thông tin và mật khẩu dài hơn 8 ký tự</p>'
    }
    
} 

isSign();