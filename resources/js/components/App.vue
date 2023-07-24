<script>
import Dashboard from "@/components/layouts/Dashboard.vue";
import DashboardCover from "@/components/layouts/DashboardCover.vue";
import DashboardContent from "@/components/layouts/DashboardContent.vue";
export default {
    name: 'App',

    components: {
        Dashboard,
        DashboardCover,
        DashboardContent,
    },


}
</script>

<template>
    <Dashboard>
        <dashboard-cover />
        <dashboard-content>
            <router-view></router-view>
        </dashboard-content>
    </Dashboard>
</template>

<style scoped>

</style>
