const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

function handleLoad() {
    const iconSearch = $('.fa-magnifying-glass');
    const input = $('#search');

    iconSearch.onclick = () => {
        input.style.animation = 'display 0.5s ease-in';
        input.style.right = '8%'
    }
}

handleLoad()