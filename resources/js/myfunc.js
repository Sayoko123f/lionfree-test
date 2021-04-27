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
    ],
    toolbars: {
        bold: true, // 粗体
        italic: true, // 斜体
        header: true, // 标题
        underline: true, // 下划线
        strikethrough: true, // 中划线
        mark: true, // 标记
        superscript: true, // 上角标
        subscript: true, // 下角标
        quote: true, // 引用
        ol: true, // 有序列表
        ul: true, // 无序列表
        link: true, // 链接
        imagelink: false, // 图片链接
        code: true, // code
        table: true, // 表格
        fullscreen: false, // 全屏编辑
        readmodel: false, // 沉浸式阅读
        htmlcode: true, // 展示html源码
        help: true, // 帮助
        /* 1.3.5 */
        undo: true, // 上一步
        redo: true, // 下一步
        trash: true, // 清空
        save: false, // 保存（触发events中的save事件）
        /* 1.4.2 */
        navigation: true, // 导航目录
        /* 2.1.8 */
        alignleft: true, // 左对齐
        aligncenter: true, // 居中
        alignright: true, // 右对齐
        /* 2.2.1 */
        subfield: true, // 单双栏模式
        preview: true, // 预览
    }
}

export default my;