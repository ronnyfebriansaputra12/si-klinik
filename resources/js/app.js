import './bootstrap';

const app = new Vue({
    methods:{
        printme() {
            window.print();
        }
    }
})