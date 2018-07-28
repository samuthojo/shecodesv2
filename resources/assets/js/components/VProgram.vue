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
      
      <h5 class="card-title">Curriculum</h5>
      <p class="card-text">{{ program.curriculum_description }}</p>
      
      <h5 class="card-title">Form Link</h5>
      <p class="card-text">
        <a href="program.form_link">{{ program.form_link }}</a>
      </p>
      
      <h5 class="card-title">Video Link</h5>
      <p class="card-text">
        <a href="program.video_link">{{ program.video_link }}</a>
      </p>
      
    </div>
    
  </div>
  
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      required: true
    },
    program: {
      type: Object,
      required: true
    }
  }
}
</script>

<style lang="css">
</style>
