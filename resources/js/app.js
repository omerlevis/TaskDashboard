import 'bootstrap/dist/css/bootstrap.css';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

import App from './components/App.vue';
import Home from './components/Home.vue';
import TaskForm from './components/TaskForm.vue';
import Task from './components/Task.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/dashboard', component: Home },
       { path: '/tasks/create', component: TaskForm },
       { path: '/tasks/:id', component: Task },
      { path: '/tasks/:id/edit', component: TaskForm },
    ]
});

const app = createApp(App);
app.use(router);
app.mount('#app');
