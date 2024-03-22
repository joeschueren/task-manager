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
            <form method="POST" className="form" @submit.prevent="handleSubmit">
                <span className="input-label">Email</span>
                <input type="email" className="form-input" placeholder="Email" name="email"></input>
                <span className="input-label">Password</span>
                <input type="password" className="form-input" placeholder="Password" name="password"></input>
                <p className="warning"></p>
                <button type="submit" className="form-button">Log In</button>
            </form>
        </div>
    </div>
</template>
<script>
    const handleSubmit = (e) => {
        e.preventDefault();

        const email = e.target.email.value;
        const password = e.target.password.value;
        
        fetch("http://localhost:8000/api/login", {
            method: "Post",
            credentials: "include",
            body:  JSON.stringify({
                email: email,
                password: password
            })
        })
    }
</script>
<style scoped>
    @import "./Login.css";
</style>