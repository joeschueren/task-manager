<script setup>
</script>
<template>
    <div class="task-div">
        <span class="task-name">{{ name }}</span>
        <div class="steps-list">
            
        </div>
    </div>
</template>
<script>
    export default{
        props: ['name', 'steps']
    };
</script>
<style>
    @import "./Task.css";
</style>