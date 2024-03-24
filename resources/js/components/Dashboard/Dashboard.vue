<script setup>
</script>
<template>
    <div class="dashboard-container">
        <div class="dashboard-row">
            <div class="create">
                <span class="create-title">Create a Task</span>
                <span class="input-label">Task Name:</span>
                <input class="create-input" placeholder="Task Name"></input>
                <span class="input-label">Importance:</span>
                <input class="create-input" placeholder="Importance"></input>
                <span class="input-label">Time Frame:</span>
                <input class="create-input" placeholder="Time Frame"></input>
                <div class="plus-button">
                    <div class="plus">+</div>
                </div>
            </div>
            <div class="tasks">

            </div>
        </div>
    </div>
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
        async mounted() {
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
<style scoped>
    @import "./Dashboard.css";
</style>