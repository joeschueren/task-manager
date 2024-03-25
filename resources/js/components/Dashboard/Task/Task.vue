<script setup>
</script>
<template>
    <div class="task-div">
        <span class="task-name">{{ task.task_name }}</span>
        <span class="view-more">View More</span>
        <span class="importance">{{ task.importance }}</span>
        <span class="deadline">{{ task.deadline.split(" ")[0] }}</span>
    </div>
</template>
<script>
    export default{
        props: ['task']
    };
</script>
<style>
    @import "./Task.css";
</style>