<script>
import axios from 'axios';
export default {
    data() {
        return {
            task: {
                title: '',
                description: ''
            },
            created_task:'',
        }
    },
    computed: {
        isNewTask() {
            return !this.$route.path.includes('edit');
        }
    },
    async created() {
        if (!this.isNewTask) {
            const response = await axios.get(`/api/tasks/${this.$route.params.id}`);
            this.task = response.data;
        }
    },
    methods: {
        async submitForm() {
            try {
                console.log(this.task);
                if (this.isNewTask) {
                    const response = await axios.post('/api/tasks', this.task);
                    this.created_task=response.data.id;
                } else {
                    const response =  await axios.put(`/api/tasks/${this.$route.params.id}`, this.task);
                    this.created_task=response.data.id;
                }
               // this.$router.push('/dashboard');
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>

<template>

        <div v-if="created_task" class="text-center" style="color:blue">
        <h1> The task has been modified, its ID :  {{created_task}}  </h1>
            <router-link :to="`/tasks/${created_task}`" class="btn btn-primary">View the Task</router-link>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                  <h5>Please complete the task details.</h5>
                </div>
                <div class="card-body">
        <form @submit.prevent="submitForm">

                <label for="title" class="form-label">Title:</label>
                <input class="form-control" type="text" id="title" v-model="task.title" required />

                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" v-model="task.description" required></textarea>

            <button type="submit" v-if="isNewTask" class="btn btn-primary">Add Task</button>
            <button type="submit" v-else class="btn btn-primary">Update Task</button>
        </form>
                </div>
            </div>
        </div>

</template>

<style scoped>

</style>
