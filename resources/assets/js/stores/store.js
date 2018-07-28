import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    programs: [],
    courses: [],
    staff: [],
    activities: [],
    partners: []
  },
  
  mutations: {
    setTitle({title}, newTitle) {
      title = newTitle
    }
  }
})