<template lang="html">

  <div class="card">

    <div class="card-body">
      
      <div class="card-title">  
        <div class="d-flex justify-content-between">
          <h4>{{ title }}</h4>
          <button type="button" class="btn btn-pill btn-outline-danger"
            @click="$emit('close')">
            cancel
          </button>
        </div>
      </div>
      
      <hr>
      
      <form @submit.prevent="onSubmit">

        <template v-for="field in schema.fields">

          <component
            :is="field.type"
            :field="field"
            :entity.sync="program[field.name]">
          </component>

        </template>

        <div class="form-group">

          <button
            type="submit"
            class="btn btn-pill btn-success float-right">Submit</button>

        </div>

      </form>
      
    </div>

  </div>

</template>

<script>
export default {

  props: {
    schema: {
      type: Object,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    program: {
      type: Object
    }
  },

  data() {
    return {
    }
  },

  methods: {
    onSubmit() {
    
    },
    onClose() {
    
    }
  }

}
</script>

<style lang="css">
</style>
