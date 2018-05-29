<template lang="html">

  <div class="row">
    <div class="col-12">
      <div class="header-section">
        <h3>
          {{ header }}
          <span class="subTitle">{{ start }} - {{ end }} of {{ totalCount }}</span>
        </h3>
        <button class="btn btn-warning" :title="buttonTooltip"
          @click="$emit('create')" v-show="showCreateAction">Create</button>
      </div>
      <hr>
    </div>
  </div>

</template>

<script>

export default {

  props: {
    start: Number,
    end: Number,
    totalCount: Number,
    header: String,
    entityName: String
  },

  computed: {

    buttonTooltip: function () {
      return 'Create a new ' + this.entityName;
    },

    showCreateAction: function () {
      switch(this.entityName) {
        case 'program' : return programStore.state.showCreateAction
        case 'course' : return courseStore.state.showCreateAction
        case 'staff' : return staffStore.state.showCreateAction
        case 'partner' : return partnerStore.state.showCreateAction
        case 'testimonial' : return testimonialStore.state.showCreateAction
        case 'alumni' : return alumniStore.state.showCreateAction
        case 'activity' : return activityStore.state.showCreateAction
      }
    }

   //End of computed properties
  }

}

</script>

<style lang="css" scoped>
.header-section {
  display: flex;
  justify-content: space-between;
  align-items: center; /*vertically at the center*/
}
.subTitle {
  font-size: 0.7em;
}
</style>
