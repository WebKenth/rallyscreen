import livescore from '../components/livescore.vue';
import livescoreheat from '../components/livescoreheat.vue';

var Vue = require('vue');

Vue.use(require('vue-resource'));

// Vue.component('editor', Editor);

new Vue({
    el: 'body',
    components: { livescore, livescoreheat }
});
