<script setup>
</script>
<template>
    <div class="dashboard-container">
        <div class="dashboard-row">
            <div class="create">
                <span class="create-title">Create a Task</span>
                <span class="input-label">Task Name:</span>
                <input class="create-input" placeholder="Task Name" v-model="taskData.taskNAme"></input>
                <span class="input-label">Importance:</span>
                <input class="create-input" placeholder="Importance" v-model="taskData.importance"></input>
                <span class="input-label">Time Frame:</span>
                <input class="create-input" placeholder="Time Frame" v-model="taskData.timeFrame"></input>
                <span class="warning">{{ taskData.warning }}</span>
                <div class="plus-button" @click="handleSubmit">
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
                },
                taskData: {
                    taskName: "",
                    importance: "",
                    timeFrame: "",
                    warning: ""
                }

            }
        },
        methods: {
            async handleSubmit(){

                try{
                    const res = await fetch(baseURL+"api/task-submit", {
                        method:"post",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector("meta[property='csrf-token']").getAttribute("content")
                        },
                        body: JSON.stringify(taskData)
                    });

                    if(res.status === 200){
                        window.location.reload();
                    }
                    else{
                        this.taskData.warning = "Error Creating Task, Try Again"
                    }

                } catch {
                    this.taskData.warning = "Server Error Please Try Again"
                }
                
            }
        },
        async mounted() {

            try{
                const res = await fetch(baseURL+"api/dashboard", {
                    method: "get",
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
            } catch {
                this.taskData.warning = "Error Contacting Server Try Again Later"
            }
            
        }
    }
</script>
<style scoped>
    @import "./Dashboard.css";
</style>