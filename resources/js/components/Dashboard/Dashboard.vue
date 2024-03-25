<script setup>
</script>
<template>
    <div class="dashboard-container">
        <div class="dashboard-row">
            <div class="create">
                <span class="create-title">Add New Task</span>
                <input class="create-input" placeholder="Task Name" v-model="taskData.taskName"></input>
                <input class="create-input" placeholder="Importance" v-model="taskData.importance"></input>
                <input class="create-input" placeholder="Time Frame (Days)" v-model="taskData.timeFrame"></input>
                <div class="plus-button" @click="handleSubmit">
                    <div class="plus">+</div>
                </div>
            </div>
            <div class="teams">
                <span class="teams-title">Manage Your Team</span>
                <span v-if="userData.teamName" class="team-name">{{ userData.teamName }}</span>
                <div v-if="!userData.teamName" class="team-div">
                    <router-link class="team-anchor" to="/app/team-create">Create a Team</router-link>
                    <span class="team-join">or Join One:</span>
                    <input class="create-input" v-model="teamCode" placeholder="Team Code"></input>
                    <button class="team-button" @click="handleTeamRequest">Join Now</button>
                </div>
            </div>
            <div class="tasks">
                <!-- <p>{{ userData.email }}</p>
                <p>{{ JSON.stringify(userData.userTasks) }}</p>
                <p>{{ userData.teamName }}</p> -->
                <div v-for="(task, index) in userData.userTasks" :key="index">
                    <Task :task="task"></Task>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import baseURL from "../../env-config.js";
    import Task from "./Task/Task.vue"
    export default {
        components:{
            Task
        },
        data() {
            return {
                userData: {
                    email: {},
                    userTasks: [],
                    teamName: {},
                },
                taskData: {
                    taskName: "",
                    importance: "",
                    timeFrame: "",
                    warning: ""
                },
                teamCode: "",

            }
        },
        methods: {
            async handleSubmit(){

                try{
                    const res = await fetch(baseURL+"api/create-task", {
                        method:"post",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector("meta[property='csrf-token']").getAttribute("content")
                        },
                        body: JSON.stringify(this.taskData)
                    });

                    if(res.status === 200){
                        window.location.reload();
                    }
                    else{
                        this.taskData.warning = "Error Creating Task, Try Again"
                    }

                } catch(error) {
                    console.log(error);
                    this.taskData.warning = "Server Error Please Try Again"
                }
                
            },

            async handleTeamRequest(){

                try{
                    const res = await fetch(baseURL+"api/join-team", {
                        method: "post",
                        credentials: "include",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector("meta[property='csrf-token']").getAttribute("content")
                        },
                        body: JSON.stringify(this.teamCode)
                    })

                    if(res.status === 200){
                        window.location.reload();
                    } else{
                        this.taskData.warning = "Invalid Code";
                    }
                } catch (error) {
                    this.taskData.warning = "Server Error Try Again";
                }
                
            }
        },
        async mounted() {

            try{
                const res = await fetch(baseURL+"api/dashboard", {
                    method: "get",
                    credentials: "include"
                })

                const data = await res.json();

                console.log(data.member_info);

                this.userData.email = data.member_info;
                this.userData.userTasks =  data.tasks;
                this.userData.teamName = data.team_info;
            } catch (error) {
                console.log(error);
                this.taskData.warning = "Error Contacting Server Try Again Later"
            }
            
        }
    }
</script>
<style scoped>
    @import "./Dashboard.css";
</style>