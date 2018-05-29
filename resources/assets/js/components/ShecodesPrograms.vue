<template lang="html">

  <div class="row">

    <div :class="['shecodes-container', containerWidth]">

      <base-header
        :start="start"
        :end="end"
        :total-count="programCount"
        :header="'Programs'"
        :entityName="'program'"
        @create="onCreateClicked"/>

      <base-list
        :is-screen-divided="shouldDisplay"
        :entities="programs"
        @view="onViewClicked"
        @edit="onEditClicked"
        @archive="onArchiveProgram"/>

    </div>

    <div class="shecodes-container col-md-6" v-show="shouldDisplay">

      <program-form
        v-show="currentComponent == 'program-form'"
        ref="programForm"
        @submit="onCreateProgram"
        @update="onUpdateProgram"/>

      <program-view
        v-show="currentComponent == 'program-view'"
        ref="programView"/>

    </div>

  </div>

</template>

<script>

export default {

  data() {
    return {
      programs: [],
      itemsToDisplay: 3,
      curPage: 1
    }
  },

  created() {
    Program.getPrograms()
          .then(({data}) => this.programs=data)
          .catch(error => console.error(error))
  },

  computed: {

    programCount: function () {
      return this.programs.length
    },

    start: function () {
      if(this.programCount)
        return 1
      return 0
    },

    end: function () {
      if(this.start)
        return this.itemsToDisplay * this.curPage
      return 0
    },

    shouldDisplay: function () {
      return programStore.state.shouldDisplay
    },

    containerWidth: function () {
      return (this.shouldDisplay) ? 'col-md-6' : 'col-md-12'
    },

    currentComponent: function () {
      return programStore.state.currentComponent
    }

  },

  methods: {

    onCreateClicked() {
      this.$refs.programForm.setEditMode("New Program", {}, true)
      programStore.setShowCreateAction(false)
      programStore.setCurrentComponent('program-form')
      programStore.setShouldDisplay(true)
    },

    onViewClicked(program) {
      this.$refs.programView.setProgram(program)
      programStore.setShowCreateAction(true)
      programStore.setCurrentComponent('program-view')
      programStore.setShouldDisplay(true)
    },

    onEditClicked(program) {
      this.$refs.programForm.setEditMode("Edit Program", program, false)
      programStore.setShowCreateAction(true)
      programStore.setCurrentComponent('program-form')
      programStore.setShouldDisplay(true)
    },

    onCreateProgram(form) {

      Crud.post('/admin/api/programs', form)

          .then(({data}) => {

            this.programs.unshift(data) //add to beginning of programs array

            form.reset()

          })

          .catch(error => console.error())

    },

    onUpdateProgram(form) {

      let url = '/admin/api/programs/' + form.id

      Crud.patch(url, form)

          .then(({data}) => {

            let index = globals.getIndex(this.programs, data)

            //replace existing program with the updated one
            this.programs.splice(index, 1, data)

          })

          .catch(error => console.error())

    },

    onArchiveProgram(program) {

      let url = '/admin/api/archive_programs/' + program.id

      Crud.archive(url)

          .then(({data}) => {

            let index = globals.getIndex(this.programs, data)

            this.programs.splice(index, 1) //remove from programs array

          })

          .catch(error => console.error())
    }

  }

}

</script>

<style lang="css">
</style>
