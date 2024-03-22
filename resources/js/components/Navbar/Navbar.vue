<script setup>

</script>
<template>
<div>
    <div data-testid="navbar" className="nav-div">
        <div className="nav-title">
            <a href="/" className="nav-title">
                <span data-testid="title" className="title-text">Taskify</span>
            </a>
            <div className="toggle-button">
                <i className="fa-solid fa-bars fa-lg"></i>
            </div>
        </div>
        <div className="link-div">
            <a className="nav-link" href="/dashboard">About</a>
            <a className="nav-link" href="/dashboard">Pricing</a>
            <a className="nav-link" href="/dashboard">Showcase</a>
            <a className="nav-link" href="/dashboard">Book an Appointment</a>
        </div>
        <div className="nav-auth">
           <a className="nav-link" href="/login">Sign In</a>
           <div className="highlight-div">
               <a className="link-highlight nav-signin" href="/register">Sign Up</a>
           </div>
        </div>
    </div>
</div>
</template>

<style scoped>
    @import "./Navbar.css";
</style>