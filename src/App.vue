<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
// import HelloWorld from './components/HelloWorld.vue'
</script>

<template>
  <header>
    <!--     <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" /> -->

    <div class="wrapper">
      <!--       <HelloWorld msg="You did it!" /> -->
    </div>
  </header>

  <nav>
    <RouterLink to="/">Home</RouterLink>
    <RouterLink to="/user">User</RouterLink>
    <RouterLink to="/test">testing area</RouterLink>

    <!--         <RouterLink to="/about">About</RouterLink> -->
  </nav>

  <RouterView />
</template>

<style scoped>
nav {
  background: white;

  box-sizing: border-box;
  width: 100%;
  height: 50px;
  position: fixed;
  bottom: 0;
  left: 0;
  z-index: 100;
  border-radius: 20px 20px 0 0;
  box-shadow: var(--shadow);
}

a {
  margin: 10px;
  padding: 10px;
  transition: 0.3s;
  box-shadow: var(--shadow);
}

nav a.router-link-exact-active {
  background: var(--green);
  box-shadow: var(--inset-shadow);
}

/*header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
  position: fixed;
  bottom: 0;
  left: 0;
  z-index: 100;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
  background: grey;
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}*/
</style>
