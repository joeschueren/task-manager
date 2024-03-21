<script setup>
</script>
<template>
    <Navbar/>
    <router-view/>
</template>
<script>
    import Navbar from "./Navbar/Navbar.vue";

    export default {
        components: {
            Navbar
        }
    }
</script>