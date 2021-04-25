<template>
  <!-- <div class="jumbotron jumbotron-fluid bg"> -->
    <div class="container">
      <!-- <div class="text-center">
        <h2 class="title">網站設計期中</h2>
        <p class="title">110612304</p>
        <p class="title">原始碼</p>
      </div> -->
      <!-- <svg viewbox="0 0 450 100" class="title" style="margin: 20px">
        <text y="60">網站設計期中</text>
      </svg>
        <p>原始碼</p> -->

      <h1 class="jumbotron-heading myFadeIn">網站設計期中</h1>
      <p class="lead text-muted myFadeIn">
        110612304
      </p><br/>
      <p>
        <a href="#" class="btn btn-primary my-2 myFadeIn">連結</a>
        <a href="#" class="btn btn-secondary my-2 myFadeIn">原始碼</a>
      </p>
    </div>
  <!-- </div> -->
</template>

<script>
export default {
  mounted() {
    console.log("IndexJumbotronComponent mounted.");
  },
  computed: {},
  data: () => ({}),
  methods: {},
};
</script>
<style scoped>
</style>