Nova.booting((Vue, router) => {
    Vue.component('index-percentage', require('./components/IndexField'));
    Vue.component('detail-percentage', require('./components/DetailField'));
    Vue.component('form-percentage', require('./components/FormField'));
})
