<template lang="html">

  <div class="container-fluid">

    <component-title
      @close="onClose">
      <template slot="header">
        <h3> {{ testimonial.name }}</h3>
      </template>
    </component-title>

    <p class="card-text">{{ testimonial.description }}</p>

  </div>

</template>

<script>
export default {
  data() {
    return {
      testimonial: {}
    }
  },
  methods: {
    setTestimonial(testimonial) {
      this.testimonial = testimonial;
    },

    onClose() {
      testimonialStore.setShouldDisplay(false);
    }
  }
}
</script>

<style lang="css">
</style>
