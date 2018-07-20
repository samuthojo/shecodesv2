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

      <base-form
        v-show="currentComponent == 'base-form'"
        ref="programForm"
        :schema="schema"
        @create="onCreateProgram"
        @update="onUpdateProgram"/>

      <program-view
        v-show="currentComponent == 'program-view'"
        ref="programView"/>

    </div>

  </div>

</template>

<script>
var programFields = require('../form-fields/ProgramFormFields')

export default {

  data() {
    return {
      programs: [],
      itemsToDisplay: 3,
      curPage: 1,
      schema: {
        fields: programFields()
      }
    }
  },

  created() {

    Program.getPrograms()

           .then(({data}) => this.programs = data)

           .catch(error => console.error(error))
  },

  computed: {

    programCount: function() {
      return this.programs.length
    },

    start: function() {
      if (this.programCount)
        return 1
      return 0
    },

    end: function() {
      if (this.start)
        return this.itemsToDisplay * this.curPage
      return 0
    },

    shouldDisplay: function() {
      return programStore.state.shouldDisplay
    },

    containerWidth: function() {
      return (this.shouldDisplay) ? 'col-md-6' : 'col-md-12'
    },

    currentComponent: function() {
      return programStore.state.currentComponent
    }

  },

  methods: {

    onCreateClicked() {
      this.$refs.programForm.formTitle = "New Program"

      this.$refs.programForm.form = new Form(new Program())

      this.$refs.programForm.isCreateAction = true

      this.setUp('base-form', false)
    },

    onViewClicked(program) {
      this.$refs.programView.setProgram(program)

      this.setUp('program-view', true)
    },

    onEditClicked(program) {
      this.$refs.programForm.formTitle = "Program Details"

      this.$refs.programForm.form = new Form(program)

      this.$refs.programForm.isCreateAction = false

      this.setUp('base-form', true)
    },

    setUp(component, showCreate) {
      programStore.setShowCreateAction(showCreate)

      programStore.setCurrentComponent(component)

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
