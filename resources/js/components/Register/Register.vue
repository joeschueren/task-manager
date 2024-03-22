<script setup>
</script>
<template>
    <div className="register-container">
        <div className="form-container">
            <div className="auth-header">
                <span data-testid="logo" className="header-text">Taskify</span>
            </div>
            <span className="welcome">Welcome Back to Taskify</span>
            <p>Don't have an account? <a className="switch-form" href="/app/register">Register</a></p>
            <form  @submit.prevent="handleSubmit" className="form">
                <input type="hidden" name="_token" v-model="csrfToken">
                <span className="input-label">Email</span>
                <input type="email" className="form-input" placeholder="Email" v-model="formData.email"></input>
                <span className="input-label">Password</span>
                <input type="password" className="form-input" placeholder="Password" v-model="formData.password"></input>
                <span className="input-label">Confirm Password</span>
                <input type="password" className="form-input" placeholder="Confirm Password" v-model="formData.confirm_password"></input>
                <p className="warning"></p>
                <button type="submit" className="form-button">Register</button>
            </form>
        </div>
    </div>
</template>
<script>

    export default {
        data() {
            return{
                formData: {
                    email: "",
                    password: "",
                    confirm_password: ""
                },
                csrfToken: "{{ csrf_token() }}"
            }
        },
        methods: {
            async handleSubmit() {
                
                await fetch("http://localhost:8000/api/register", {
                    method: "Post",
                    headers:{
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector("meta[property='csrf-token']").getAttribute("content")
                    },
                    body:  JSON.stringify(this.formData)
                })
            }
        }
    };
</script>
<style scoped>
    @import "./Register.css";
</style>