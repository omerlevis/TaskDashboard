<script>
import axios from 'axios';
export default {
    data() {
        return {
            task: {}
        }
    },
    async created() {
        try {
            const response = await axios.get(`/api/tasks/${this.$route.params.id}`);
            this.task = response.data;
        } catch (error) {
            console.error(error);
        }
    }
}

</script>

<template>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
        <h6>{{ task.title }}</h6>
                </div>
                    <div class="card-body">
        <h5>Description:</h5>
        <p class="card-text">{{ task.description }}</p> <hr>
        <h5>Priority:</h5>
        <p>{{ task.priority }}</p> <hr>
                        <div class="text-end text-center">
                            <router-link :to="`/tasks/${task.id}/edit`" class="btn btn-primary">Edit</router-link>
                            </div>

        </div>
    </div>
    </div>
</template>

<style scoped>

</style>
