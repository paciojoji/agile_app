import Vue from 'vue'
import axios from 'axios'

const agile_app = axios.create({
    baseURL: "http://localhost/agile_app/backend",
    headers: {
        "Content-Type": 'application/x-www-form-urlencoded',
        "X-Requested-With": "XMLHttpRequest",
    }
})

Vue.prototype.$agile_app = agile_app;

export { agile_app }