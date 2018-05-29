<template lang="html">

  <div class="row">

    <div :class="['shecodes-container', containerWidth]">

      <base-header
        :start="start"
        :end="end"
        :total-count="partnersCount"
        :header="'Partners'"
        :entityName="'partner'"
        @create="onCreatePartner"/>

      <base-list
        :is-screen-divided="shouldDisplay"
        :entities="partners"
        @view="onViewPartner"
        @edit="onEditPartner"/>

    </div>

    <div class="shecodes-container col-md-6" v-show="shouldDisplay">

      <partner-form
        v-show="currentComponent == 'partner-form'"
        ref="partnerForm"/>

    </div>

  </div>

</template>

<script>
export default {

  data() {
    return {
      partners: [],
      itemsToDisplay: 3,
      curPage: 1
    }
  },

  created() {
    axios.get('/admin/api/partners')
         .then(({data}) => this.partners = data)
         .catch(error => console.error(error))
  },

  computed: {

    partnersCount: function () {
      return this.partners.length
    },

    start: function () {
      if(this.partnersCount)
        return 1
      return 0
    },

    end: function () {
      if(this.start)
        return this.itemsToDisplay * this.curPage
      return 0
    },

    shouldDisplay: function () {
      return partnerStore.state.shouldDisplay
    },

    containerWidth: function () {
      return (this.shouldDisplay) ? 'col-md-6' : 'col-md-12'
    },

    currentComponent: function () {
      return partnerStore.state.currentComponent
    }

  },

  methods: {

    onCreatePartner() {
      this.$refs.partnerForm.setEditMode("New Partner", {})
      partnerStore.setShowCreateAction(false)
      partnerStore.setCurrentComponent('partner-form')
      partnerStore.setShouldDisplay(true)
    },

    onViewPartner(partner) {
      this.$refs.partnerView.setPartner(partner)
      partnerStore.setShowCreateAction(true)
      partnerStore.setCurrentComponent('partner-view')
      partnerStore.setShouldDisplay(true)
    },

    onEditPartner(partner) {
      this.$refs.partnerForm.setEditMode("Edit Partner", partner)
      partnerStore.setShowCreateAction(true)
      partnerStore.setCurrentComponent('partner-form')
      partnerStore.setShouldDisplay(true)
    }

  }

}
</script>

<style lang="css">
</style>
