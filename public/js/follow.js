function handleEventFollower() {
    const following = $$('.follow')
    if (following) {
        following.forEach(item => {
            item.onclick = () => {
                if (user_id)
                    handleFollower(item)
                else {
                    const result = confirm('Bạn có muốn đăng nhập để theo dõi tác giả')
                    if (result)
                        window.location.href = 'http://127.0.0.1:8000/index/login'
                }
            }
            if (item.getAttribute('data-follow-id') !== 'null') {
                item.innerHTML = ''
                item.classList.add('active-follow')
                item.classList.remove('no-active-follow')
            }
        })
    }

}

function handleFollower(item) {
    item.innerHTML = ''
    item.classList.add('active-follow')
    const data = {
        following_id: item.getAttribute('data-author-id'),
        follower_id: user_id
    }

    const options = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    }
    if (item.classList == 'follow active-follow') {
        console.log('delete')
        options.method = 'DELETE'
        item.classList.add('no-active-follow')
        item.classList.remove('active-follow')
        fetch(`http://127.0.0.1:8000/api/follow/${item.getAttribute('data-follow-id')}`, options)
            .then(response => response.json())
            .then(response => {
                item.removeAttribute('data-follow-id', response.id)
                console.log(response)
            })
            .catch(err => {
                console.log(err)
            })
    }
    else {
        console.log('post')
        item.classList.remove('no-active-follow')
        item.classList.add('active-follow')
        fetch(`http://127.0.0.1:8000/api/follow`, options)
            .then(response => response.json())
            .then(response => {
                console.log(response)
                item.setAttribute('data-follow-id', response.id)
            })
            .catch(err => {
                console.log(err)
            })
    }
}