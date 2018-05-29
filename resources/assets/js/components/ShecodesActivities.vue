<template lang="html">

  <div class="row">

    <div :class="['shecodes-container', containerWidth]">

      <base-header
        :start="start"
        :end="end"
        :total-count="activitiesCount"
        :header="'Activities'"
        :entityName="'activity'"
        @create="onCreateActivity"/>

      <base-list
        :is-screen-divided="shouldDisplay"
        :entities="activities"
        @view="onViewActivity"
        @edit="onEditActivity"/>

    </div>

    <div class="shecodes-container col-md-6" v-show="shouldDisplay">

      <activity-form
        v-show="currentComponent == 'activity-form'"
        ref="activityForm"/>

      <activity-view
        v-show="currentComponent == 'activity-view'"
        ref="activityView"/>

    </div>

  </div>

</template>

<script>
export default {

  data() {
    return {
      activities: [],
      itemsToDisplay: 3,
      curPage: 1
    }
  },

  created() {
    axios.get('/admin/api/activities')
         .then(({data}) => this.activities = data)
         .catch(error => console.error(error))
  },

  computed: {

    activitiesCount: function () {
      return this.activities.length
    },

    start: function () {
      if(this.activitiesCount)
        return 1
      return 0
    },

    end: function () {
      if(this.start)
        return this.itemsToDisplay * this.curPage
      return 0
    },

    shouldDisplay: function () {
      return activityStore.state.shouldDisplay
    },

    containerWidth: function () {
      return (this.shouldDisplay) ? 'col-md-6' : 'col-md-12'
    },

    currentComponent: function () {
      return activityStore.state.currentComponent
    }

  },

  methods: {

    onCreateActivity() {
      this.$refs.activityForm.setEditMode("New Activity", {})
      activityStore.setShowCreateAction(false)
      activityStore.setCurrentComponent('activity-form')
      activityStore.setShouldDisplay(true)
    },

    onViewActivity(activity) {
      this.$refs.activityView.setActivity(activity)
      activityStore.setShowCreateAction(true)
      activityStore.setCurrentComponent('activity-view')
      activityStore.setShouldDisplay(true)
    },

    onEditActivity(activity) {
      this.$refs.activityForm.setEditMode("Edit Activity", activity)
      activityStore.setShowCreateAction(true)
      activityStore.setCurrentComponent('activity-form')
      activityStore.setShouldDisplay(true)
    }

  }

}
</script>

<style lang="css">
</style>
