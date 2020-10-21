/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        NoteModel: {id: '', content: ''},
        isValidated: true,
        notes: [{content: 'abc'}],
    },
    mounted: function mounted() {
        this.getNotes()
    },
    methods: {
        getNotes: function getNotes() {
            let _this = this
            let url = "{{ route('get-all-note') }}"
            axios.get('/get-all-notes').then(function (res) {
                _this.notes = res.data
                _this.NoteModel = {id: '', content: ''}
                _this.isValidated = true
            }).catch(err => { console.log("Get all notes error: ", err) })
        },
        upsertNote: function upsertNote() {
            let note = this.NoteModel
            this.isValidated = note.content !== ''
            if(this.isValidated) {
                let _this = this
                axios.post('/upsert-note', note).then(function (res) {
                    _this.getNotes()
                }).catch(err => { console.log('Upsert note error: ', err) })
            }
        },
        deleteNote: function deleteNote(note) {
            let _this = this
            axios.get('/delete-note/'+note.id).then(function (res) {
                _this.getNotes()
            }).catch(err => { console.log('Delete note error: ', err) })
        },
        fillNote: function fillNote(note) {
            this.NoteModel = {id: note.id, content: note.content}
        }
    }
});
