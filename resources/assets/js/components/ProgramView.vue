<template lang="html">

  <div class="container-fluid">

    <the-form-title-bar @close="onClose">
      <template slot="header">
        <h3> {{ program.name }}</h3>
      </template>
    </the-form-title-bar>

    <p class="card-text">{{ program.description }}</p>
    <p class="card-text links">
      <a :href="program.video_link"
        class="card-link"
        target="_blank"
        title="watch video">
        <span class="badge badge-secondary">video</span>
      </a>
      <a :href="program.form_link"
        class="card-link"
        target="_blank"
        title="add student">
        <span class="badge badge-warning">enroll</span>
      </a>
    </p>

    <h4 class="card-title">Curriculum</h4>
    <p class="card-text">{{ program.curriculum_description }}</p>

    <template v-if="courses.length">
      <h4 class="card-title">Courses</h4>
      <div class="card course-card" v-for="course in courses">
        <iframe :src="'https://www.youtube.com/embed/' + course.video_id"
          alt="course picture" class="card-img-top">
        </iframe>
        <div class="card-body">
          <h4 class="card-title">{{ course.name }}</h4>
          <p class="card-text">{{ course.description }}</p>
        </div>
      </div>
    </template>

  </div>

</template>

<script>
export default {
  data() {
    return {
      program: {},
      courses: []
    }
  },
  methods: {
    setProgram(program) {
      this.program = program;
      this.courses = program.courses;
    },
    onClose() {
      programStore.setShouldDisplay(false);
    }
  }
}
</script>

<style lang="css">
.links {
  text-align: right;
}
iframe {
  border: 0;
}
.course-card {
  margin-bottom: 15px;
}
</style>
