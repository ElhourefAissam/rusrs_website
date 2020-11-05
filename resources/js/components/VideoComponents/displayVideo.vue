<template>
<iframe width="100%" height="315" :src="`https://www.youtube.com/embed/${id}`" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</template>
<script>

export default {
  props:["id"],
  data(){
      return{

      }
  }

}
</script>
