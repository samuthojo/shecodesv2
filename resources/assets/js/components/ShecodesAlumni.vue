<template lang="html">

  <div class="row">

    <div :class="['shecodes-container', containerWidth]">

      <base-header
        :start="start"
        :end="end"
        :total-count="alumniCount"
        :header="'Alumni'"
        :entityName="'alumni'"
        @create="onCreateAlumni"/>

      <base-list
        :is-screen-divided="shouldDisplay"
        :entities="alumni"
        @view="onViewAlumni"
        @edit="onEditAlumni"/>

    </div>

    <div class="shecodes-container col-md-6" v-show="shouldDisplay">

      <alumni-form
        v-show="currentComponent == 'alumni-form'"
        ref="alumniForm"/>

      <alumni-view
        v-show="currentComponent == 'alumni-view'"
        ref="alumniView"/>

    </div>

  </div>

</template>

<script>
export default {

  data() {
    return {
      alumni: [],
      itemsToDisplay: 3,
      curPage: 1
    }
  },

  created() {
    axios.get('/admin/api/alumni')
         .then(({data}) => this.alumni=data)
         .catch(error => console.error(error))
  },

  computed: {

    alumniCount: function () {
      return this.alumni.length
    },

    start: function () {
      if(this.alumniCount)
        return 1
      return 0
    },

    end: function () {
      if(this.start)
        return this.itemsToDisplay * this.curPage
      return 0
    },

    shouldDisplay: function () {
      return alumniStore.state.shouldDisplay
    },

    containerWidth: function () {
      return (this.shouldDisplay) ? 'col-md-6' : 'col-md-12'
    },

    currentComponent: function () {
      return alumniStore.state.currentComponent
    }

  },

  methods: {

    onCreateAlumni() {
      this.$refs.alumniForm.setEditMode("New Alumni", {})
      alumniStore.setShowCreateAction(false)
      alumniStore.setCurrentComponent('alumni-form')
      alumniStore.setShouldDisplay(true)
    },

    onViewAlumni(alumni) {
      this.$refs.alumniView.setAlumni(alumni)
      alumniStore.setShowCreateAction(true)
      alumniStore.setCurrentComponent('alumni-view')
      alumniStore.setShouldDisplay(true)
    },

    onEditAlumni(alumni) {
      this.$refs.alumniForm.setEditMode("Edit Alumni", alumni)
      alumniStore.setShowCreateAction(true)
      alumniStore.setCurrentComponent('alumni-form')
      alumniStore.setShouldDisplay(true)
    }

  }

}
</script>

<style lang="css">
</style>
