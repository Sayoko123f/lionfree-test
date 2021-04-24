<template>
  <div class="jumbotron jumbotron-fluid bg">
    <div class="container">
      <!-- <div class="text-center">
        <h2 class="title">網站設計期中</h2>
        <p class="title">110612304</p>
        <p class="title">原始碼</p>
      </div> -->
      <svg viewbox="0 0 450 100" class="title" style="margin: 20px">
        <text y="60">網站設計期中</text>
      </svg>
        <p>原始碼</p>

    </div>
  </div>
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
.bg {
  animation: none;
  background-image: url("/img/bg04.jpg");
  background-repeat: no-repeat;
  -webkit-animation: changeBg 30s infinite;
    /* animatedBackground 45s linear infinite; */
  -webkit-background-image: none;
  max-height: 1200px;
  min-height: 800px;
}

/* Safari and Chrome */
@-webkit-keyframes changeBg {
  0% {
    background-image: url("/img/bg04.jpg");
  }
  25% {
    background-image: url("/img/bg05.jpg");
  }
  55% {
    background-image: url("/img/bg06.jpg");
  }
  70% {
    background-image: url("/img/bg07.jpg");
  }
  100% {
    background-image: url("/img/bg04.jpg");
  }
}

@-webkit-keyframes animatedBackground {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: -300px 0;
  }
}

.jumbotron {
  -webkit-background-size: 150% 150%;
  -moz-background-size: 150% 150%;
  -o-background-size: 150% 150%;
  background-size: 150% 150%;
}

.title {
  font: bold 70px Century Gothic, Arial;
  width: 100%;
  height: 120px;
}

.title > text {
  fill: none;
  stroke: black;
  stroke-width: 0.5px;
  stroke-linejoin: round;
  animation: 3s pulsate infinite;
}

@keyframes pulsate {
  50% {
    stroke-width: 3px;
  }
}
</style>