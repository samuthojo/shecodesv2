new Vue({
  el:'#vue-container',
  data: {
    programs: [],
    program: {
      name: '', description: '', curriculum_description: '',
      form_link: '', video_link: '', picture_url: '',
    },
    programId: '',
    form: {},
    index: '',
    isLoading: false
  },
  created() {    
    //Retrieve programs from the window
    this.programs = programs
    this.copyFields(this.program)
    
    var _this = this
    $("body").on('hidden.bs.modal', '.modal', function (e) {
      $(".modal-body").find('input, textarea, select').each(function(){
         $(this).val("")
      })
      $(".modal-body").find('span').each(function(){
         $(this).fadeOut(0)
      })
      _this.isLoading = false
      _this.resetFields(_this.form)
    })
    
  },
  methods: {
    copyFields(obj) {
      for(let field in obj) {
        Vue.set(this.form, field, obj[field])
      }
    },
    resetFields(obj) {
      for(let field in obj) {
        Vue.set(this.form, field, "")
      }
    },
    onView(program, index) {
      this.copyFields(program)
      this.index = index
      this.programId = program.id
      showModal('update-program')
    },
    onConfirm(programId, index) {
      this.programId = programId
      this.index = index
      showModal('confirmation-modal')
    },
    onDelete() {
      this.isLoading = true
      axios.delete('/api/programs/' + this.programId, this.form)
           .then(({data}) => {
             this.programs.splice(this.index, 1)
             this.isLoading = false
             closeModal('confirmation-modal')
             showHideAlert('success-alert')
           })
           .catch(error => {
             console.error(error)
             this.isLoading = false
           }) 
    },
    onCreate() {
      this.isLoading = true
      axios.post('/api/programs', this.form)
           .then(({data}) => {
             this.programs.push(data)
             this.isLoading = false
             closeModal('create-program')
             this.resetFields(this.form)
             showHideAlert('success-alert')
           })
           .catch(error => {
             console.error(error)
             this.isLoading = false
           }) 
    },
    onSave() {
      this.isLoading = true
      axios.patch('/api/programs/' + this.programId, this.form)
           .then(({data}) => {
             this.programs.splice(this.index, 1, data)
             this.isLoading = false
             closeModal('update-program')
             showHideAlert('success-alert')
           })
           .catch(error => {
             console.error(error)
             this.isLoading = false
           })
    }
  }
})