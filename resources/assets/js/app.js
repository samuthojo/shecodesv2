
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap')

/**
 * Filters
 */
 Vue.filter('summarize', function(description, shouldDisplay) {

   if(!description) return ''

   description = description.toString()

   if(shouldDisplay) return description.substring(0, 6) + ' ...'

   return description.substring(0, 125) + ' ...'

 })

 Vue.filter('shorten', function(title, shouldDisplay) {

   if(!title) return ''

   title = title.toString()

   if(shouldDisplay && title.length > 8) return title.substring(0, 6) + ' ...'

   return title

 })

 Vue.filter('longDate', function(date) {

   if(!date) return ''

   date = date.toString()

   if(date.indexOf('-') != -1) {
     let isoDate = date.split(' ')[0]
     let year = isoDate.split('-')[0]
     let month = isoDate.split('-')[1]
     let day = isoDate.split('-')[2]

     return day + " " + globals.getReadableMonth(month) + " " + year
   }

   return date

 })

 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */

Vue.component('base-text-input', require('./components/BaseTextInput.vue'))

Vue.component('base-text-area', require('./components/BaseTextArea.vue'))

Vue.component('base-radio-input', require('./components/BaseRadioInput.vue'))

Vue.component('base-file-input', require('./components/BaseFileInput.vue'))

Vue.component('base-form', require('./components/BaseForm.vue'))

Vue.component('v-program', require('./components/VProgram.vue'))

//Initialize tooltips everywhere 
$(function() {
  
  $('[data-toggle="tooltip"]').tooltip()
    
})
