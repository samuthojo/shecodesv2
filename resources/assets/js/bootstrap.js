
window._ = require('lodash');

window.Popper = require('popper.js').default;

window.Vue = require('vue');

window.programStore = require('./stores/programStore.js').default;

window.courseStore = require('./stores/courseStore.js').default;

window.staffStore = require('./stores/staffStore.js').default;

window.testimonialStore = require('./stores/testimonialStore.js').default;

window.alumniStore = require('./stores/alumniStore.js').default;

window.activityStore = require('./stores/activityStore.js').default;

window.partnerStore = require('./stores/partnerStore.js').default;

window.globals = require('./utilities/GlobalFunctions.js').default;

window.Form = require('./utilities/Form.js').default;

window.Crud = require('./utilities/Crud.js').default;

window.Program = require('./models/Program.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

require('bootstrap-datepicker');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
