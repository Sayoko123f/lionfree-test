const my = {
    origin: window.location.origin,
    newsIndexUrl: window.location.origin + "/admin",
    newsCreateUrl: window.location.origin + "/admin/news",
    destroy(url) {
        if (!confirm("確定要刪除此篇文章嗎？此動作無法復原")) {
            return;
        }
        const csrfToken = document.head.querySelector(
            "[name~=csrf-token][content]"
        ).content;
        fetch(url, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        }).then((response) => {
            location.href = this.newsIndexUrl;
        }).catch((err) => {
            console.log(err);
            alert(err);
        });
    },
    edit(url) {
        location.href = url;
    },
    vaildNewsData(news) {
        if (!news.title) {
            alert("標題不可為空");
            return false;
        }
        if (!news.ctx) {
            alert("內容不可為空");
            return false;
        }
        return true;
    },
    gallery: [
        { src: '/img/bg01.jpg' },
        { src: '/img/bg02.jpg' },
        { src: '/img/bg03.jpg' },
        { src: '/img/bg04.jpg' },
        { src: '/img/bg05.jpg' },
        { src: '/img/bg06.jpg' },
        { src: '/img/bg07.jpg' },
        { src: '/img/gallery01.jpg' },
        { src: '/img/gallery02.jpg' },
        { src: '/img/gallery03.jpg' },
        { src: '/img/gallery04.jpg' },
        { src: '/img/gallery05.jpg' },
    ]
}

export default my;