<template lang="html">

  <div class="base-modal flex flex-v-center flex-h-center">

      <p class="async-loading" v-show="isLoading">
        <span class="fa fa-circle"></span>
        <span class="fa fa-circle"></span>
        <span class="fa fa-circle"></span>
      </p>

      <div class="base-notify base-notify-success" v-show="showSuccess">

        <div class="message-pad">

          <div class="">

            <div class="notify-message">{{ successMessage }}</div>

          </div>

        </div>

      </div>

      <div class="base-notify base-notify-error" v-show="showError">

        <div class="message-pad">

          <div class="">

            <div class="notify-message">{{ errorMessage }}</div>

          </div>

        </div>

      </div>

    </div>

  </div>

</template>

<script>
export default {
  props: {
    successMessage: String,
    errorMessage: String,
    showSuccess: Boolean,
    showError: Boolean,
    isLoading: Boolean
  }
}
</script>

<style lang="css" scoped>
.base-modal {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  z-index: 1000;
  outline: 0;
  border-radius: 0;
}

.base-notify {
  cursor: pointer;
  border-radius: 5px;
  animation-fill-mode: both;
  font-size: 1em;
  width: 70%;
}

.base-notify-success {
  background-color: #4caf50;
  color: #c8e6c9;
}

.base-notify-error {
  background-color: #f44336;
  color: #ffebee;
}

.message-pad {
  padding: 15px;
}

.notify-message {
  text-align: center;
}

@-webkit-keyframes blink {
    /**
     * At the start of the animation the dot
     * has an opacity of .2
     */
    0% {
      opacity: .2;
    }
    /**
     * At 20% the dot is fully visible and
     * then fades out slowly
     */
    20% {
      opacity: 1;
    }
    /**
     * Until it reaches an opacity of .2 and
     * the animation can start again
     */
    100% {
      opacity: .2;
    }
}

@keyframes blink {
    /**
     * At the start of the animation the dot
     * has an opacity of .2
     */
    0% {
      opacity: .2;
    }
    /**
     * At 20% the dot is fully visible and
     * then fades out slowly
     */
    20% {
      opacity: 1;
    }
    /**
     * Until it reaches an opacity of .2 and
     * the animation can start again
     */
    100% {
      opacity: .2;
    }
}

.async-loading span {
    color: #1a7bb9;

    font-size: 1.3em;

    /**
     * Use the blink animation, which is defined above
     */
    animation-name: blink;
    /**
     * The animation should take 1.4 seconds
     */
    animation-duration: 1.4s;
    /**
     * It will repeat itself forever
     */
    animation-iteration-count: infinite;
    /**
     * This makes sure that the starting style (opacity: .2)
     * of the animation is applied before the animation starts.
     * Otherwise we would see a short flash or would have
     * to set the default styling of the dots to the same
     * as the animation. Same applies for the ending styles.
     */
    animation-fill-mode: both;
}

.async-loading span:nth-child(2) {
    /**
     * Starts the animation of the second dot
     * with a delay of .2s, otherwise all dots
     * would animate at the same time
     */
    animation-delay: .2s;
}

.async-loading span:nth-child(3) {
    /**
     * Starts the animation of the third dot
     * with a delay of .4s, otherwise all dots
     * would animate at the same time
     */
    animation-delay: .4s;
}

</style>
