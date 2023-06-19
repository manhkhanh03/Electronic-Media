// const $ = document.querySelector.bind(document)
// const $$ = document.querySelectorAll.bind(document)
// import { getUser } from "./main.js"

const article_id = $('main').getAttribute('data-article')
let editers
console.log(user_id)

function editer(blocks) {
    const editorConfig = new EditorJS({
        /**
         * Enable/Disable the read only mode
         */
        readOnly: false,

        /**
         * Wrapper of Editor
         */
        holder: 'editorjs',

        autofocus: true,
        /**
         * Common Inline Toolbar settings
         * - if true (or not specified), the order from 'tool' property will be used
         * - if an array of tool names, this order will be used
         */
        // inlineToolbar: ['link', 'marker', 'bold', 'italic'],
        // inlineToolbar: true,

        /**
         * Tools list
         */
        tools: {
            /**
             * Each Tool is a Plugin. Pass them via 'class' option with necessary settings {@link docs/tools.md}
            */
            header: {
                class: Header,
                inlineToolbar: ['marker', 'link'],
                config: {
                    placeholder: 'Header'
                },
                shortcut: 'CMD+SHIFT+H'
            },

            /**
             * Or pass class directly without any configuration
             */
            image: {
                // class: ImageTool,
                class: SimpleImage,
                // config: {
                //     endpoints: {
                //         byFile: 'http://127.0.0.1:5500'
                //     }
                // }
            },

            list: {
                class: NestedList,
                inlineToolbar: true,
                shortcut: 'CMD+SHIFT+L'
            },

            checklist: {
                class: Checklist,
                inlineToolbar: true,
            },

            quote: {
                class: Quote,
                inlineToolbar: true,
                config: {
                    quotePlaceholder: 'Enter a quote',
                    captionPlaceholder: 'Quote\'s author',
                },
                shortcut: 'CMD+SHIFT+O'
            },

            warning: Warning,

            marker: {
                class: Marker,
                shortcut: 'CMD+SHIFT+M'
            },

            code: {
                class: CodeTool,
                shortcut: 'CMD+SHIFT+C'
            },

            delimiter: Delimiter,

            inlineCode: {
                class: InlineCode,
                shortcut: 'CMD+SHIFT+C'
            },

            linkTool: LinkTool,

            raw: RawTool,

            embed: Embed,

            table: {
                class: Table,
                inlineToolbar: true,
                shortcut: 'CMD+ALT+T'
            },
        },
        data: {
            blocks
        },

    })
    return editorConfig;
}

function editArticle() {
    // const article_id = $('main').getAttribute('data-article')
    if (article_id) {
        fetch(`http://127.0.0.1:8000/api/articles/${article_id}`)
            .then(response => response.json())
            .then(article => {

                handleEvent(article.categorie_id)
                const blocks = article.data_article;
                editers = editer(blocks)
            })
    } else {
        editers = editer([
            {
                id: "zcKCF1S7X8",
                type: "header",
                data: {
                    text: "Nhập tiêu đề(tiêu đề luôn là Heading 1)",
                    level: 1
                }
            },
            {
                type: "header",
                id: "7ItVl5biRo",
                data: {
                    text: "Nhập tiêu đề phụ(tiêu đề phụ luôn là Heading 2)",
                    level: 2
                }
            },
        ])
    }
}

function myFunction(status_id) {
    let categorie = $('#text-item').getAttribute('data-categorie');

    console.log(user_id)
    if (categorie && user_id) {
        editers.save()
            .then(savedData => {
                const data = {
                    author_id: user_id,
                    categorie_id: categorie,
                    JSON: JSON.stringify(savedData.blocks),
                    status_id: status_id
                };
                const options = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }
                if (article_id)
                    options.method = 'PUT';
                const url = article_id ? `http://127.0.0.1:8000/api/articles/${article_id}` : 'http://127.0.0.1:8000/api/articles';
                fetch(url, options)
                    .then(response => response.json())
                    .then(data => {
                        confirm('Đăng bài thành công!');
                        window.location.href = `http://127.0.0.1:8000/index/article/${data[0].title}/${data[0].id}`
                    })
                    .catch(err => {
                        console.log(err);
                        confirm('Đăng bài không thành công!');
                    });

            })

    } else {
        if (status_id == 2)
            alert('Bạn chưa chọn thể loại, hãy chọn trước khi đăng bài');
        else if (status_id == 1)
            alert('Bạn chưa chọn thể loại, hãy chọn trước khi lưu bản nháp');
    }
}

function handleEvent(categorie) {
    const item = $$('.list-item .item')
    console.log(categorie);
    if (categorie) {
        item.forEach(element => {
            if (element.getAttribute('data-categorie') == categorie) {
                $('#text-item').innerHTML = element.innerHTML
                $('#text-item').setAttribute('data-categorie', categorie)
            }
        });
    }
    item.forEach((ele) => {
        ele.onclick = () => {
            $('#text-item').innerHTML = ele.innerHTML
            $('#text-item').setAttribute('data-categorie', ele.getAttribute('data-categorie'))
        }
    })
}

function start() {
    $$('.btn').forEach((btn, index) => {
        btn.onclick = () => {
            fetch(`http://127.0.0.1:8000/api/user/${user_id}`)
                .then(response => response.json())
                .then(user => {
                    if (user.limit_write === 0) {
                        if (index === 0) {
                            let result = confirm('Bạn có chắc muốn xóa bài viết này?')
                            if (result)
                                window.location.href = 'http://127.0.0.1:8000/index/write_articles'
                        } else if (index === 1) {
                            let result = confirm('Bạn có chắc chắn muốn lưu bản nháp cho bài viết này?')
                            if (result)
                                myFunction(1)
                        } else {
                            console.log(user_id)
                            let result = confirm('Bạn có chắc muốn đăng bài viết này?')
                            if (result)
                                myFunction(2)
                        }
                    }else alert('Bạn đã bị hạn chế viết bài! Vui lòng liên hệ với quản trị viên để biết thêm chi tiết')
                })
        }
    })
    handleEvent()
    editArticle()
}
start()