<script>
export default {
    data() {
        return {
                card_title: '',
        }
    },

    computed: {
        generateCardTitle() {
            if(this.$route.path.includes('edit')){
                this.card_title ="Edit A Task"
                return false;
            }
            else if(this.$route.path.includes('create')){
                this.card_title ="Add A New Task"
                return false;
            }
            else {
                this.card_title = "Welcome to Triolla Task CRM";
                return  true;
            }
        }
    },

}

</script>

<template>
    <tr>
        <td>
            <div class="card border border-white">
                <div class="card-body text-center">
                    <h1 style="color: darkorange;"> {{ card_title }} </h1>
                    <router-link v-if="generateCardTitle" to="/tasks/create" class="btn btn-primary">Add Task</router-link>
                </div>
            </div>
        </td>
    </tr>
</template>

<style >

</style>
