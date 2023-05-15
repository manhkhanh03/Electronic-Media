const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
// import { user } from './login.js'
const urlParams = new URLSearchParams(window.location.search);

let sender_id = urlParams.get('id');
export {sender_id}

function showLogin() {
    const user = $('.fa-user')
    if (user) {
        user.onclick = () => {
            window.location.href = 'http://127.0.0.1:8000/login'
        }
    }
}   

showLogin()
// can sua lai khi da lay duoc user