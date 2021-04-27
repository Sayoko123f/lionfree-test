<template>
  <div class="container" v-show="!onLoading">
    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>日期</th>
            <th>標題</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in res.data" :key="'news' + item.id">
            <td>{{ item.created_at }}</td>
            <td>
              <router-link
                :to="{
                  name: 'newsShow',
                  params: { id: item.id },
                  query: { page: current_page },
                }"
                >{{ item.title }}</router-link
              >
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        <li class="page-item" :class="{ disabled: current_page === 1 }">
          <span role="button" class="page-link" @click="pageMove(-1)">◄</span>
        </li>
        <li class="page-item" :class="{ disabled: current_page === maxPage }">
          <span role="button" class="page-link" @click="pageMove(1)">►</span>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  mounted() {
    let page = parseInt(this.$route.query.page) || 1;
    this.init(page);
    console.log("NewsIndexComponent mounted.");
  },
  computed: {},
  data: () => ({
    res: {},
    current_page: 1,
    maxPage: 1,
    onLoading: true,
  }),
  methods: {
    init(page) {
      let url = window.location.origin + "/api/news?page=" + page;
      this.onLoading = true;
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
            this.res = data;
            this.onLoading = false;
            this.current_page = data.current_page;
            this.maxPage = Math.ceil(this.res.total / this.res.per_page);
          })
          .catch((err) => {
            console.log(err);
            alert(err);
          });
      });
    },
    pageMove(n) {
      if (this.current_page + n < 1) {
        this.current_page = 1;
      } else if (this.current_page + n > this.maxPage) {
        this.current_page = this.maxPage;
      } else {
        this.current_page += n;
      }
      this.init(this.current_page);
    },
  },
};
</script>
<style scoped>
.container{
  background: white;
}
</style>