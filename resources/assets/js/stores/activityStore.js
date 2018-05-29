export default {
  debug: true,
  state: {
    shouldDisplay: false,
    currentComponent: 'activity-form',
    showCreateAction: true
  },
  setCurrentComponent (newComponent) {
    if (this.debug) console.log('setCurrentComponent triggered with', newComponent);
    this.state.currentComponent = newComponent;
  },
  setShouldDisplay (newValue) {
    if (this.debug) console.log('setShouldDisplay triggered with', newValue);
    this.state.shouldDisplay = newValue;
  },
  setShowCreateAction (newValue) {
    if (this.debug) console.log('setShowCreateAction triggered with', newValue);
    this.state.showCreateAction = newValue;
  }
}
