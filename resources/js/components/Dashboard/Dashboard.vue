<script setup>
</script>
<template>

</template>
<script>
    import baseURL from "../../env-config.js";
    export default {
        data() {
            return {
                userData: {
                    email: "",
                    userTasks: [],
                    teamName: "",
                }
            }
        },
        methods:{
            async getUserData()
        },
        mounted() {
            const res = await fetch(baseURL+"api/dashboard", {
                method: "post",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector("meta[property='csrf-token']").getAttribute("content")
                },
                credentials: "include"
            })

            const data = await res.json();

            this.userData.email = data.email;
            this.userData.userTasks =  data.tasks;
            this.userData.teamName = data.team;
        }
    }
</script>
<style>
    @import "./Dashboard.css";
</style>