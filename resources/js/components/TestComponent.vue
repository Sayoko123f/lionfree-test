<template>
  <div class="container">
    <p>{{ calData.now }}</p>
    <button type="button" @click="prepare()">Run</button>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("TestComponent mounted.");
    if (!window.Worker) {
      {
        alert("Your brower unsupport this app.");
      }
    } else {
      this.work = new Worker(this.workUrl);
      this.work.onmessage = (e) => {
        console.log(e.data);
        // console.log("Message received from worker");
        this.calData.now = e.data;
      };
    }
  },
  props: {
    workUrl: String,
  },
  data: () => ({
    calData: {
      now: 0,
      max: 55555,
    },
  }),
  methods: {
    prepare() {
        this.calData.now = 0;
      this.cal(this.calData);
    },
    cal(data) {
      console.log("Message posted to worker");
      this.work.postMessage(data);
    },
  },
};
</script>
