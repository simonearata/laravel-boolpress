<template>
  <div>

    <main class="container">

     <Header />

      <!-- tag che riceve tutti i componenti iniettati dal router -->
      <router-view></router-view>

    
    </main>

  </div>
</template>

<script>
import Header from './components/Header.vue'

export default {
  name: 'App',
  components: {
    Header
  }

}

</script>

<style lang="scss">

  @import '../sass/frontoffice/global';

</style>