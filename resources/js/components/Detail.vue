<template>
  <div>
    <Header></Header>

    <section id="featured">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="image">
              <img :src="single.img" class="img-fluid mt-2" :alt="single.title" />
            </div>
          </div>
          <div class="col-md-8">
            <h1 class="mt-5">{{single.title}}</h1>
            <p>{{single.content}}</p>
            <button
              type="button"
              @click="addToCart(single.id)"
              class="btn btn-outline-success btn-xs"
            >
              ADD TO CART
              <i class="fas fa-plus"></i>
            </button>

            <button
              type="button"
              @click="addHeart(single.id)"
              class="btn btn-outline-danger ml-2 btn-xs"
            >
            Like
           <i class="far fa-heart"></i>
            </button>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Header from "./Header";
import { mapState, mapActions, mapGetters } from "vuex";
export default {
  components: {
    Header
  },
  props: ["slug"],

  mounted() {
    this.getSingle(this.slug);
  },
  computed: {
    ...mapState(["single"])
  },
  methods: {
    addCart(id) {
      this.addToCart(id);
    },
    addHeart(id) {
      this.addToHeart(id);
    },
    handleScroll() {
      let getHeight = window.scrollY;
      let nav = document.getElementById("mainNav");
      if (getHeight > 150) {
        nav.classList.add("fixed-top");
        nav.classList.add("bg-secondary");
      } else {
        nav.classList.remove("fixed-top");
        nav.classList.remove("bg-secondary");
      }
    },
    ...mapActions(["getSingle", "addToCart", "addToHeart"])
  },
  created() {
    window.addEventListener("scroll", this.handleScroll);
  }
};
</script>

<style>
</style>