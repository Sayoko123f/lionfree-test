<template>
  <div class="container">
    <div class="form-group">
      <label for="title">標題：</label>
      <input
        type="text"
        class="form-control"
        id="title"
        name="title"
        v-model="news.title"
        maxlength="45"
      />
    </div>
    <div class="form-group">
      <label for="content">內容：</label>
      <textarea
        class="form-control"
        rows="5"
        id="content"
        name="ctx"
        v-model="news.ctx"
      ></textarea>
    </div>
    <button type="button" class="btn btn-primary" @click="edit()">送出</button>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("NewsEditComponent mounted.");
    this.news = JSON.parse(this._news);
  },
  data: () => ({
    news: {},
  }),
  props: {
    puturl: String,
    _news: String,
  },
  methods: {
    // checkFormData() {
    //   if (!this.news.title) {
    //     alert("標題不可為空");
    //     return false;
    //   }
    //   if (!this.news.ctx) {
    //     alert("內容不可為空");
    //     return false;
    //   }
    //   return true;
    // },
    edit() {
      if (!my.vaildNewsData(this.news)) {
        return;
      }
      let url = this.puturl;
      const csrfToken = document.head.querySelector(
        "[name~=csrf-token][content]"
      ).content;
      fetch(url, {
        method: "put",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify(this.news),
      })
        .then((response) => {
          console.log(response);
          if (response.ok) {
            alert("已送出，回到文章列表。");
            location.href = my.newsIndexUrl;
          }
        })
        .catch((err) => {
          console.log(err);
          alert(err);
        });
    },
  },
};
</script>
