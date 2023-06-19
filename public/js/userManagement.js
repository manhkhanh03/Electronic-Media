function handleCheckbox() {
    const inputAll = $('input[name="th-checkbox"]');
    const checkbox = $$('input[name="td-checkbox"]');
    inputAll.onclick = () => {
        checkbox.forEach(check => {
            if (inputAll.checked)
                check.checked = true;
            else
                check.checked = false;
        })
    }
    let i = 0
    checkbox.forEach((check, index) => {
        check.onclick = () => {
            i += check.checked ? 1 : -1;
            if (check.checked && i >= checkbox.length)
                inputAll.checked = true;
            else inputAll.checked = false;
        }
    })
}

function handleEventChangeText(listItem, textItem) {

    listItem.forEach((item) => {
        item.onclick = () => {
            textItem.innerHTML = item.innerHTML;
            textItem.setAttribute('data-role', item.getAttribute('data-role'))
        }
    })
}

function handleTypeSearch() {
    const typeText = $('.box--type-search .type-text')
    const itemRoles = $$('.box--type-search--role .item-role');
    handleEventChangeText(itemRoles, typeText);
}

function handleTypeConfirm() {
    const typeText = $('.box--type-role .type-text')
    const itemRoles = $$('.box--type-confirm--role .item-role');
    handleEventChangeText(itemRoles, typeText);
}

function handleGetUsers(nameUser = '', roleUser = '') {
    fetch(`http://127.0.0.1:8000/api/user/management/users/search?name=${nameUser}&role_name=${roleUser}`)
        .then(response => response.json())
        .then(users => {
            const listUsers = $('table tbody')
            const htmls = users.map(user => {
                if (user.limit_write === 1) {
                    return `
                    <tr class="data">
                        <td class="td-data" style="border-top: 1px solid #fa5959; border-left: 1px solid #fa5959; border-bottom: 1px solid #fa5959">
                            <input type="checkbox" data-user-id="${user.id}" name="td-checkbox" id="">
                        </td>
                        <td class="td-data" style="border-top: 1px solid #fa5959;border-bottom: 1px solid #fa5959;">${user.name}</td>
                        <td class="td-data" style="border-top: 1px solid #fa5959;border-bottom: 1px solid #fa5959;">${user.email}</td>
                        <td class="td-data" style="border-top: 1px solid #fa5959;border-bottom: 1px solid #fa5959;">${user.role_name}</td>
                        <td class="td-data"style="border-top: 1px solid #fa5959;border-bottom: 1px solid #fa5959;">${user.total_articles || user.user_role_id == 5 ? user.total_articles ?? 0 : '<i class="fa-solid fa-x"></i>'}</td>
                        <td class="td-data" style="border-top: 1px solid #fa5959;border-bottom: 1px solid #fa5959; border-right: 1px solid #fa5959;">
                            <i class="fa-solid fa-gear" data-user-id="${user.id}"></i>
                        </td>
                    </tr>
                    `
                } else {
                    return `
                    <tr class="data">
                        <td class="td-data">
                            <input type="checkbox" data-user-id="${user.id}" name="td-checkbox" id="">
                        </td>
                        <td class="td-data">${user.name}</td>
                        <td class="td-data">${user.email}</td>
                        <td class="td-data">${user.role_name}</td>
                        <td class="td-data">${user.total_articles || user.user_role_id == 5 ? user.total_articles ?? 0 : '<i class="fa-solid fa-x"></i>'}</td>
                        <td class="td-data">
                            <i class="fa-solid fa-gear" data-user-id="${user.id}"></i>
                        </td>
                    </tr>
                `
                }
            })

            listUsers.innerHTML = htmls.join('')
        })
        .then(() => {
            handleCheckbox()
            handleCheckboxSelected()
        })
}

function handleSearchUsers() {
    const typeSearch = $('.box--type-search .type-text')
    const btnSearch = $('.box--btn-search')
    const nameUsers = $('input[name="box--input-search-user"]')
    btnSearch.onclick = () => {
        switch (typeSearch.innerHTML) {
            case 'Admin':
                handleGetUsers(nameUsers.value, 'admin')
                break;
            case 'Editor':
                handleGetUsers(nameUsers.value, 'editor')
                break;
            case 'Reader':
                handleGetUsers(nameUsers.value, 'reader')
                break;
            case 'All':
                handleGetUsers(nameUsers.value)
        }
    }
}

function handleResetUsers() {
    $('.box--btn-reset').onclick = () => {
        handleGetUsers();
        $('input[name="box--input-search-user"]').value = '';
        $('.box--type-search .type-text').innerHTML = 'All';
    }
}

function handleCheckboxSelected() {
    const checkbox = $$('input[name="td-checkbox"]');
    const btnConfirm = $('.box--btn-confirm')
    const typeText = $('.box--type-role .type-text')
    const trData4 = $$('tr.data .td-data:nth-child(4)');
    const trData5 = $$('tr.data .td-data:nth-child(5)');
    btnConfirm.onclick = () => {
        if (typeText.innerHTML !== 'Role:') {
            const result = confirm('Confirm Role: ' + typeText.innerHTML)
            checkbox.forEach((item, index) => {
                if (item.checked) {
                    if (result) {
                        const data = {}
                        switch (typeText.getAttribute('data-role')) { 
                            case '1': // admin 6
                                data.user_role_id = 6
                                break;
                            case '2': // editor 5
                                data.user_role_id = 5
                                break;
                            case '3': // reader 4
                                data.user_role_id = 4
                                break;
                            case '4':
                                data.limit_write = 1
                                break;
                        }
                        const options = {
                            method: 'PUT',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(data)
                        }
                        console.log(data, options)
                        fetch(`http://127.0.0.1:8000/api/user/${item.getAttribute('data-user-id')}`, options)
                            .then(response => response.json())
                            .then(user => {
                                console.log(user)
                                if (user.user_role_id == '4') {
                                    trData5[index].innerHTML = '<i class="fa-solid fa-x"></i>'
                                    trData4[index].innerHTML = 'reader'
                                }
                                else if (user.user_role_id == '5') {
                                    trData5[index].innerHTML = '0'
                                    trData4[index].innerHTML = 'editor'
                                }
                                else if (user.user_role_id == '6') {
                                    trData5[index].innerHTML = '0'
                                    trData4[index].innerHTML = 'admin'
                                }
                                
                                const listTdData = $$('.td-data')
                                if (user.limit_write == 1) {
                                    let i = index * 6;
                                    for (let j = i; j < i + 6; j++) { 
                                        listTdData[j].style.border = '1px solid #fa5959'
                                    }
                                }
                            })
                    }
                }
            })
        }
    }
}

handleTypeSearch()
handleTypeConfirm()
handleGetUsers()
handleSearchUsers()
handleResetUsers()