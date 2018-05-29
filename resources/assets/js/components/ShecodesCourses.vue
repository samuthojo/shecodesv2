<template lang="html">

  <div class="row">

    <div :class="['shecodes-container', containerWidth]">

      <base-header
        :start = "start"
        :end = "end"
        :total-count = "coursesCount"
        :header = "'Courses'"
        :entityName = "'course'"
        @on-create-course = "onCreateCourse">
      </base-header>

      <base-list
        :is-screen-divided = "shouldDisplay"
        :entities = "courses"
        @view="onViewCourse"
        @edit="onEditCourse">
      </base-list>

    </div>

    <div class="shecodes-container col-md-6" v-show="shouldDisplay">

      <course-form
        v-show="currentComponent == 'course-form'"
        ref="courseForm">
      </course-form>

      <course-view
        v-show="currentComponent == 'course-view'"
        ref="courseView">
      </course-view>

    </div>

  </div>

</template>

<script>
export default {

  data() {
    return {
      courses: [],
      itemsToDisplay: 3,
      curPage: 1
    }
  },

  created() {
    axios.get('/admin/api/courses')
         .then(({data}) => this.courses = data)
         .catch(error => console.error(error));
  },

  computed: {

    coursesCount: function () {
      return this.courses.length;
    },

    start: function () {
      if(this.coursesCount)
        return 1;
      return 0;
    },

    end: function () {
      if(this.start)
        return this.itemsToDisplay * this.curPage;
      return 0;
    },

    shouldDisplay: function () {
      return courseStore.state.shouldDisplay;
    },

    containerWidth: function () {
      return (this.shouldDisplay) ? 'col-md-6' : 'col-md-12';
    },

    currentComponent: function () {
      return courseStore.state.currentComponent;
    }

  },

  methods: {

    onCreateCourse() {
      this.$refs.courseForm.setEditMode("New Course", {});
      courseStore.setShowCreateAction(false);
      courseStore.setCurrentComponent('course-form');
      courseStore.setShouldDisplay(true);
    },

    onViewCourse(course) {
      this.$refs.courseView.setCourse(course);
      courseStore.setShowCreateAction(true);
      courseStore.setCurrentComponent('course-view');
      courseStore.setShouldDisplay(true);
    },

    onEditCourse(course) {
      this.$refs.courseForm.setEditMode("Edit Course", course);
      courseStore.setShowCreateAction(true);
      courseStore.setCurrentComponent('course-form');
      courseStore.setShouldDisplay(true);
    }

  }

}
</script>

<style lang="css">
</style>
