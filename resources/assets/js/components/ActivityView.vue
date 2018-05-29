<template lang="html">

  <div class="container-fluid">

    <component-title
      @close="onClose">
      <template slot="header">
        <h3> {{ activity.name }}</h3>
      </template>
    </component-title>

    <p class="card-text">

      <span class="bold-text">Location:</span> {{ activity.location }}

    </p>

    <p class="card-text">

      <span class="bold-text">Date:</span> {{ activity.date | longDate }}

    </p>

    <a :href="activity.pictures_link"
      class="card-link"
      target="_blank"
      title="view pictures">
      Pictures
    </a>

  </div>

</template>

<script>
export default {
  data() {
    return {
      activity: {}
    }
  },
  methods: {
    setActivity(activity) {
      this.activity = activity;
    },

    onClose() {
      activityStore.setShouldDisplay(false);
    }
  }
}
</script>

<style lang="css">
</style>
