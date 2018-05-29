<template lang="html">

  <div class="row">

    <div :class="['shecodes-container', containerWidth]">

      <base-header
        :start="start"
        :end="end"
        :total-count="staffCount"
        :header="'Staff'"
        :entityName="'staff'"
        @create="onCreateStaff"/>

      <base-list
        :is-screen-divided="shouldDisplay"
        :entities="staff"
        @view="onViewStaff"
        @edit="onEditStaff"/>

    </div>

    <div class="shecodes-container col-md-6" v-show="shouldDisplay">

      <staff-form
        v-show="currentComponent == 'staff-form'"
        ref="staffForm"/>

      <staff-view
        v-show="currentComponent == 'staff-view'"
        ref="staffView"/>

    </div>

  </div>

</template>

<script>
export default {

  data() {
    return {
      staff: [],
      itemsToDisplay: 3,
      curPage: 1
    }
  },

  created() {
    axios.get('/admin/api/staff')
         .then(({data}) => this.staff=data)
         .catch(error => console.error(error))
  },

  computed: {

    staffCount: function () {
      return this.staff.length
    },

    start: function () {
      if(this.staffCount)
        return 1
      return 0
    },

    end: function () {
      if(this.start)
        return this.itemsToDisplay * this.curPage
      return 0
    },

    shouldDisplay: function () {
      return staffStore.state.shouldDisplay
    },

    containerWidth: function () {
      return (this.shouldDisplay) ? 'col-md-6' : 'col-md-12'
    },

    currentComponent: function () {
      return staffStore.state.currentComponent
    }

  },

  methods: {

    onCreateStaff() {
      this.$refs.staffForm.setEditMode("New Staff", {})
      staffStore.setShowCreateAction(false)
      staffStore.setCurrentComponent('staff-form')
      staffStore.setShouldDisplay(true)
    },

    onViewStaff(staff) {
      this.$refs.staffView.setStaff(staff)
      staffStore.setShowCreateAction(true)
      staffStore.setCurrentComponent('staff-view')
      staffStore.setShouldDisplay(true)
    },

    onEditStaff(staff) {
      this.$refs.staffForm.setEditMode("Edit Staff", staff)
      staffStore.setShowCreateAction(true)
      staffStore.setCurrentComponent('staff-form')
      staffStore.setShouldDisplay(true)
    }

  }

}
</script>

<style lang="css">
</style>
