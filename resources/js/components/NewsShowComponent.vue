<template>
  <div class="container" v-show="!onLoading">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <router-link
          class="nav-link"
          href="#"
          :to="{ name: 'newsIndex', query: { page: this.$route.query.page } }"
          >返回</router-link
        >
        <!-- <a class="nav-link" href="#" @click="$router.go(-1)">返回</a> -->
      </li>
    </ul>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ res.title }}</h4>
        <p class="card-text">{{ res.ctx }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.init();
    console.log("NewsShowComponent mounted.");
  },
  data: () => ({
    res: {},
    onLoading: true,
  }),
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
            this.onLoading = false;
          })
          .catch((err) => {
            console.log(err);
            alert(err);
          });
      });
    },
  },
};
</script>
