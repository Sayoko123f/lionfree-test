<template>
  <div class="container">
    <admin-nav></admin-nav>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ res.title }}</h4>
        <p class="card-text">{{ res.ctx }}</p>
        <button type="button" class="btn btn-danger" @click="destroy()">
          刪除
        </button>
        <router-link
          :to="{ name: 'newsEdit', params: { id: this.$route.params.id } }"
        >
          <button type="button" class="btn btn-secondary">編輯</button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  beforeRouteUpdate() {
    this.init();
  },
  mounted() {
    this.init();
    console.log("NewsShowComponent mounted.");
  },
  data: () => ({
    res: {},
  }),
  props: {
    deleteUrl: "",
  },
  methods: {
    init() {
      let url = window.location.origin + "/api/news/" + this.$route.params.id;
      const csrfToken = document.head.querySelector(
        "[name~=csrf-token][content]"
      ).content;
      fetch(url, {
        method: "get",
        headers: {
          "X-CSRF-TOKEN": csrfToken,
        },
      }).then((response) => {
        response
          .json()
          .then((data) => {
            console.log(data);
            if (data.length == 0) {
              // go to 404 page
            }
            this.res = data[0];
          })
          .catch((err) => {
            console.log(err);
            alert(err);
          });
      });
    },
    destroy() {
      if (!confirm("確定要刪除此篇文章嗎？此動作無法復原")) {
        return;
      }
      let url = window.location.origin + "/api/news/" + this.$route.params.id;
      const csrfToken = document.head.querySelector(
        "[name~=csrf-token][content]"
      ).content;
      fetch(url, {
        method: "delete",
        headers: {
          "X-CSRF-TOKEN": csrfToken,
        },
      })
        .then((response) => {
          if (response.ok) {
            this.$router.replace({ name: "admin" });
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
