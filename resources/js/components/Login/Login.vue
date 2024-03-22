<script setup>
</script>
<template>
    <div className="register-container">
        <div className="form-container">
            <div className="auth-header">
                <span data-testid="logo" className="header-text">Taskify</span>
            </div>
            <span className="welcome">Welcome Back to Taskify</span>
            <p>Don't have an account? <a className="switch-form" href="/register">Register</a></p>
            <form className="form" @submit.prevent="handleSubmit">
                <span className="input-label">Email</span>
                <input type="email" className="form-input" placeholder="Email" v-model="formData.email"></input>
                <span className="input-label">Password</span>
                <input type="password" className="form-input" placeholder="Password"  v-model="formData.password"></input>
                <p className="warning"></p>
                <button type="submit" className="form-button">Log In</button>
            </form>
        </div>
    </div>
</template>
<script>
    import router from "@/router";
    export default {
        data() {
            return {
                formData: {
                    email: "",
                    password: ""
                }
            }
        },
        methods: {
            async handleSubmit() {

                const res = await fetch("http://localhost:8000/api/login", {
                    method: "Post",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector("meta[property='csrf-token']").getAttribute("content")
                    },
                    body: JSON.stringify(this.formData)
                });

                console.log(res);

                if(res.status === 200){
                    this.$router.push("dashboard");
                }
            }
        }
    }
</script>
<style scoped>
    @import "./Login.css";
</style>