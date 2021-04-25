<template>
  <div class="container">
    <div class="row">
      <div
        class="col-sm-6 col-md-4 col-lg-3 mb-2"
        v-for="(item, i) in imgs"
        :key="'pictrue' + i"
      >
        <img
          role="button"
          class="img-fluid gallery_item"
          :src="item.src"
          @click="onPswp"
        />
      </div>
    </div>
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
      <div class="pswp__bg"></div>

      <!-- Slides wrapper with overflow:hidden. -->
      <div class="pswp__scroll-wrap">
        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <!--  Controls are self-explanatory. Order can be changed. -->

            <div class="pswp__counter"></div>

            <button
              class="pswp__button pswp__button--close"
              title="Close (Esc)"
            ></button>

            <button
              class="pswp__button pswp__button--zoom"
              title="Zoom in/out"
            ></button>

            <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
            <!-- element will get class pswp__preloader--active when preloader is running -->
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>

          <div
            class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"
          >
            <div class="pswp__share-tooltip"></div>
          </div>

          <button
            class="pswp__button pswp__button--arrow--left"
            title="Previous (arrow left)"
          ></button>

          <button
            class="pswp__button pswp__button--arrow--right"
            title="Next (arrow right)"
          ></button>

          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("pswpComponent mounted.");
  },
  computed: {},
  data: () => ({
    imgs: my.gallery,
  }),
  methods: {
    onPswp(e) {
      let pswpElement = document.querySelectorAll(".pswp")[0];
      let img = e.target;
      let items = [
        {
          src: img.src,
          w: img.naturalWidth,
          h: img.naturalHeight,
        },
      ];
      // define options (if needed)
      let options = {
        // optionName: 'option value'
        // for example:
        index: 0, // start at first slide
      };

      // Initializes and opens PhotoSwipe
      let gallery = new PhotoSwipe(
        pswpElement,
        PhotoSwipeUI_Default,
        items,
        options
      );
      gallery.init();
    },
  },
};
</script>
<style scoped>
.gallery_item {
  border-radius: 5px;
}
</style>