<template>
  <div>

    <div v-if="!loaded">
      <Loader />
    </div>

    <div v-else class="card mb-3">

      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h5 class="card-title">{{ post.title }}</h5>
          <span v-if="post.category" class="badge badge-success custom-badge">{{ post.category.name }}</span>
        </div>
        <i>{{ FormatDate.format(post.created_at) }}</i>
        <p class="card-text">{{ post.content }}</p>
        <div>
          <i
            v-for="tag in post.tags"
            :key="'t' + tag.id"
          >{{ tag.name }}</i>
        </div>
      </div>

    </div>

  </div>
</template>

<script>

import axios from 'axios';
import FormatDate from '../classes/FormatDate';
import Loader from '../components/Loader.vue';

export default {
  name: 'PostDetail',
  components: {
    Loader
  }, 

  data(){
    return {
      post:{},
      FormatDate,
      loaded: false
    }
  },
  mounted(){
    // $route è un oggetto passato dal router e contiene i paramentri passati dal router-link
    console.log(this.$route.params.slug);
    axios.get('http://127.0.0.1:8000/api/posts/' + this.$route.params.slug)
      .then(res => {
        if(res.data.success){
          this.post = res.data.data
          this.loaded = true
        }else{
          // reindirizzo verso la pagina 404
          this.$router.push({name: 'error404'})
        }
        console.log(res.data);
      })
      .catch(err => {
        console.log(err);
      })
  }

}

</script>

<style scoped>

  i{
    display: inline-block;
    margin-right: 10px;
  }

</style>>

</style>