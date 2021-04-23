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
    <button type="button" class="btn btn-primary" @click="store()">送出</button>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("NewsCreateComponent mounted.");
  },
  data: () => ({
    news: { title: "", ctx: "" },
  }),
  methods: {
    store() {
      if (!my.vaildNewsData(this.news)) {
        return;
      }
      let url = my.newsCreateUrl;
      const csrfToken = document.head.querySelector(
        "[name~=csrf-token][content]"
      ).content;
      fetch(url, {
        method: "post",
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
