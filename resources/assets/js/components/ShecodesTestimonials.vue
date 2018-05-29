<template lang="html">

  <div class="row">

    <div :class="['shecodes-container', containerWidth]">

      <base-header
        :start="start"
        :end="end"
        :total-count="alumnisCount"
        :header="'Testimonials'"
        :entityName="'testimonial'"
        @create="onCreateTestimonial"/>

      <base-list
        :is-screen-divided="shouldDisplay"
        :entities="testimonials"
        @view="onViewTestimonial"
        @edit="onEditTestimonial"/>

    </div>

    <div class="shecodes-container col-md-6" v-show="shouldDisplay">

      <testimonial-form
        v-show="currentComponent == 'testimonial-form'"
        ref="testimonialForm"/>

      <testimonial-view
        v-show="currentComponent == 'testimonial-view'"
        ref="testimonialView"/>

    </div>

  </div>

</template>

<script>
export default {

  data() {
    return {
      testimonials: [],
      itemsToDisplay: 3,
      curPage: 1
    }
  },

  created() {
    axios.get('/admin/api/testimonials')
         .then(({data}) => this.testimonials = data)
         .catch(error => console.error(error))
  },

  computed: {

    alumnisCount: function () {
      return this.testimonials.length
    },

    start: function () {
      if(this.alumnisCount)
        return 1
      return 0
    },

    end: function () {
      if(this.start)
        return this.itemsToDisplay * this.curPage
      return 0
    },

    shouldDisplay: function () {
      return testimonialStore.state.shouldDisplay
    },

    containerWidth: function () {
      return (this.shouldDisplay) ? 'col-md-6' : 'col-md-12'
    },

    currentComponent: function () {
      return testimonialStore.state.currentComponent
    }

  },

  methods: {

    onCreateTestimonial() {
      this.$refs.testimonialForm.setEditMode("New Testimonial", {})
      testimonialStore.setShowCreateAction(false)
      testimonialStore.setCurrentComponent('testimonial-form')
      testimonialStore.setShouldDisplay(true)
    },

    onViewTestimonial(testimonial) {
      this.$refs.testimonialView.setTestimonial(testimonial)
      testimonialStore.setShowCreateAction(true)
      testimonialStore.setCurrentComponent('testimonial-view')
      testimonialStore.setShouldDisplay(true)
    },

    onEditTestimonial(testimonial) {
      this.$refs.testimonialForm.setEditMode("Edit Testimonial", testimonial)
      testimonialStore.setShowCreateAction(true)
      testimonialStore.setCurrentComponent('testimonial-form')
      testimonialStore.setShouldDisplay(true)
    }

  }

}
</script>

<style lang="css">
</style>
