window.my = {
    origin: window.location.origin,
    newsIndexUrl: window.location.origin + "/admin",
    newsCreateUrl: window.location.origin + "/api/news",
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
    }
}