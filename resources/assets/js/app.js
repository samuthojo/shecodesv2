
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

Vue.component('base-header', require('./components/BaseHeader.vue'))

Vue.component('the-form-title-bar', require('./components/TheFormTitleBar.vue'))

Vue.component('base-notification', require('./components/BaseNotification.vue'))

Vue.component('base-item', require('./components/BaseItem.vue'))

Vue.component('base-list', require('./components/BaseList.vue'))

Vue.component('base-text-input', require('./components/BaseTextInput.vue'))

Vue.component('base-text-area', require('./components/BaseTextArea.vue'))

Vue.component('base-radio-input', require('./components/BaseRadioInput.vue'))

Vue.component('base-form', require('./components/BaseForm.vue'))

Vue.component('program-form', require('./components/ProgramForm.vue'))

Vue.component('program-view', require('./components/ProgramView.vue'))

Vue.component('shecodes-programs', require('./components/ShecodesPrograms.vue'))

Vue.component('course-form', require('./components/CourseForm.vue'))

Vue.component('course-view', require('./components/CourseView.vue'))

Vue.component('shecodes-courses', require('./components/ShecodesCourses.vue'))

Vue.component('staff-form', require('./components/StaffForm.vue'))

Vue.component('staff-view', require('./components/StaffView.vue'))

Vue.component('shecodes-staff', require('./components/ShecodesStaff.vue'))

Vue.component('partner-form', require('./components/PartnerForm.vue'))

Vue.component('shecodes-partners', require('./components/ShecodesPartners.vue'))

Vue.component('alumni-form', require('./components/AlumniForm.vue'))

Vue.component('alumni-view', require('./components/AlumniView.vue'))

Vue.component('shecodes-alumni', require('./components/ShecodesAlumni.vue'))

Vue.component('testimonial-form', require('./components/TestimonialForm.vue'))

Vue.component('testimonial-view', require('./components/TestimonialView.vue'))

Vue.component('shecodes-testimonials', require('./components/ShecodesTestimonials.vue'))

Vue.component('activity-form', require('./components/ActivityForm.vue'))

Vue.component('activity-view', require('./components/ActivityView.vue'))

Vue.component('shecodes-activities', require('./components/ShecodesActivities.vue'))

var vm = new Vue({
    el: '#app',
    data: {
      privateState: {},
      programStore: programStore.state,
      courseStore: courseStore.state,
      staffStore: staffStore.state,
      alumniStore: alumniStore.state,
      activityStore: activityStore.state,
      partnerStore: partnerStore.state,
      testimonialStore: testimonialStore.state
    }
})
