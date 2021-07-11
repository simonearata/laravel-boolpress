<template>
  <div>
    <h1>Il mio Blog</h1>

    <div>
      <!-- loader -->
      <div v-if="!loaded" class="text-center mt-5">
        <Loader />
      </div>

      <!-- wrapper posts -->
      <div v-if="loaded">

        <!-- lista posts -->
        <Card
          v-for="post in posts"
          :key="'p' + post.id"
          :title="post.title"
          :category="post.category"
          :date="FormatDate.format(post.date)"
          :content="post.content"
          :slug="post.slug"
        />

        <!-- paginazione -->
        <div v-if="loaded">
          <nav aria-label="Page navigation example">
            <ul class="pagination">

              <li class="page-item" :class="{'disabled': pagination.current === 1}">
                <button 
                @click="getPosts(pagination.current - 1)"
                class="page-link" href="#"
                >
                &laquo;</button>
              </li>

              <li 
              v-for="i in pagination.last"
              :key="'i'+i"
              :class="{'active': pagination.current === i}"
              class="page-item">
                <button 
                class="page-link"
                @click="getPosts(i)">{{ i }}</button>
              </li>
            
              <li class="page-item" :class="{'disabled': pagination.current  === pagination.last}">
                <button 
                @click="getPosts(pagination.current + 1)"
                class="page-link" href="#">&raquo;</button>
              <li/>
            </ul>
          </nav>
        </div>
      </div>
    </div>

  </div>
</template>

<script>

import axios from 'axios';
import Loader from '../components/Loader.vue';
import Card from '../components/Card.vue';
import FormatDate from '../classes/FormatDate';


export default {
  name: 'Blog',
  components:{
    Loader,
    Card
  },

  data(){
    return{
      posts: [],
      pagination: {},
      loaded: false,
      FormatDate
    }
  },
  
  methods:{
    getPosts(page = 1){

      this.loaded = false;
      axios.get('http://127.0.0.1:8000/api/posts',{
        params: {
          page: page 
        }
      })
        .then(res => {
          this.posts = res.data.data;
          this.pagination = {
            current: res.data.current_page,
            last: res.data.last_page
          }
          this.loaded = true;
          console.log(this.posts);
        })
        .catch(err => {
          console.log(err);
        })
    },

  },

  created(){
    this.getPosts();
  }
}
</script>

<style lang="scss" scoped>

  .custom-badge{
    display: inline-block;
    height: 2rem;
    line-height: 2rem;
  }

</style>