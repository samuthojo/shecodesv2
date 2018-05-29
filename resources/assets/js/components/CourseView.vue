<template lang="html">

  <div class="container-fluid">

    <component-title
      @close="onClose">
      <template slot="header">
        <h3> {{ course.name }}</h3>
      </template>
    </component-title>

    <p class="card-text">{{ course.description }}</p>

  </div>

</template>

<script>
export default {
  data() {
    return {
      course: {}
    }
  },
  methods: {
    setCourse(course) {
      this.course = course;
    },

    onClose() {
      courseStore.setShouldDisplay(false);
    }
  }
}
</script>

<style lang="css">
</style>
