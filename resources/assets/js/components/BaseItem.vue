<template lang="html">

<div class="col-md-4">

  <div class="card position-relative">

    <base-notification
      v-show="form.notification.showNotificationModal"
      :is-loading="form.notification.showAsync"
      :success-message="form.notification.successMessage"
      :error-message="form.notification.errorMessage"
      :show-success="form.notification.showSuccess"
      :show-error="form.notification.showError"/>

    <img
      v-show="showPicture"
      :src="entity.picture_url"
      alt="picture"
      class="card-img-top">

    <iframe
      v-show="showVideo"
      :src="'https://www.youtube.com/embed/' + entity.video_id"
      alt="video"
      class="card-img-top">
    </iframe>

    <div class="card-body">

      <h4 class="card-title">{{ entity.name | shorten(isScreenDivided) }}</h4>

      <p :class="['card-text', {'summary-height': !isScreenDivided}]"
        v-show="showDescription">
        {{ entity.description | summarize(isScreenDivided) }}
      </p>

      <template v-if="showLinks">

        <a :href="entity.video_link"
          class="card-link"
          target="_blank"
          title="watch video">
          video
        </a>

        <a :href="entity.form_link"
          class="card-link"
          target="_blank"
          title="add student">
          enroll
        </a>

      </template>

      <div class="btn-group btn-group-sm float-right">

        <button
         v-show="showViewButton"
         class="btn btn-basic"
         title="view"
         @click = "$emit('view', entity)">

         <i class="fa fa-eye"></i>

        </button>

        <button
         class="btn btn-warning"
         title="edit"
         @click = "$emit('edit', entity)">

         <i class="fa fa-pencil"></i>

        </button>

       <button
        class="btn btn-dark"
        title="archive"
        @click = "$emit('archive', entity)">

        <i class="fa fa-folder"></i>

       </button>

      </div>

    </div>

  </div>

</div>

</template>

<script>
export default {

  props: {

    isScreenDivided: Boolean,

    entity: Object

   //End of props
  },

  data() {
    return {
      form: new Form({})
    }
  },

  computed: {

    showVideo: function () {
      return this.entity.video_id != null
    },

    showPicture: function () {
      return this.entity.picture_url != null
    },

    showDescription: function () {
      return _.has(this.entity, 'description')
    },

    showViewButton: function () {
      return this.showDescription || _.has(this.entity, 'location')
    },

    showLinks: function () {
      return _.has(this.entity, 'video_link')
    }
    //End of computed properties
  }

}
</script>

<style lang="css" scoped="">
.buttons {
  display: flex;
  justify-content: flex-end;
}
.summary-height {
  height: 100px;
  overflow: hidden;
}
</style>
