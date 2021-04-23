<template>
  <div class="container">
    <admin-nav></admin-nav>
    <div class="table-responsive">
      <table class="table table-bordered">
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
                :to="{ name: 'newsShow', params: { id: item.id } }"
                >{{ item.title }}</router-link
              >
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        <li class="page-item" :class="{ disabled: current_page == 1 }">
          <a class="page-link" href="#" @click="pageMove(-1)">◄</a>
        </li>
        <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li> -->
        <li class="page-item" :class="{ disabled: current_page == maxPage }">
          <a class="page-link" href="#" @click="pageMove(1)">►</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import adminNav from "./adminNav.vue";
export default {
  components: { adminNav },
  mounted() {
    this.init(1);

    console.log("NewsIndexComponent mounted.");
  },
  computed: {},
  data: () => ({
    res: {},
    current_page: 1,
    maxPage: 1,
  }),
  methods: {
    init(page) {
      let url = window.location.origin + "/api/news?page=" + page;
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
            console.log(this.res.total);
            console.log(this.res.per_page);
            this.maxPage = Math.ceil(this.res.total / this.res.per_page);
            console.log(this.maxPage);
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
