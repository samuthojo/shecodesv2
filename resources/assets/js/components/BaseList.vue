<template lang="html">

  <div class="row">

      <base-item
        v-for="entity in entities"
        :key="entity.id"
        :is-screen-divided = "isScreenDivided"
        :entity = "entity"
        @view="$emit('view', entity)"
        @edit="$emit('edit', entity)"
        @archive="$emit('archive', entity)">
      </base-item>

  </div>

</template>

<script>
export default {
  props: {

    isScreenDivided: {
      type: Boolean,
      required: true
    },

    entities: {
      type: Array,
      required: true
    }

  }
}
</script>

<style lang="css">
</style>
