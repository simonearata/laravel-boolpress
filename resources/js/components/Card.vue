<template>

  <div class="card mb-3">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h5 class="card-title">{{ title }}</h5>
        <span class="badge badge-success custom-badge">{{ category }}</span>
      </div>
      <i>{{ date }}</i>
      <p class="card-text">{{ truncateTex }}</p>
      <router-link class="btn btn-primary" :to="{name: 'postDetail', params:{ slug }}">Vedi post</router-link>
    </div>
  </div>

</template>

<script>
export default {
  name: 'Card',
  props:['title','category','date','content','slug'],
  data(){
    return{
      maxLengthText:150
    }
  }, 
  computed:{
    truncateTex(){
      let text = this.content;
      if(text.length > this.maxLengthText){
        text = text.substr(0, this.maxLengthText) + '...';
      }
      return text;
    }
  }
}
</script>

<style>

</style>