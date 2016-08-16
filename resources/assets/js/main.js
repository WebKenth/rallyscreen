import livescore from '../components/livescore.vue';

var Vue = require('vue');

Vue.use(require('vue-resource'));

// Vue.component('editor', Editor);

new Vue({
    el: 'body',
    components: { livescore }
});
