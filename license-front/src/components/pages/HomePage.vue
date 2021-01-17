<template>
  <div>
    <el-row>
      <el-col :span="20">
        <h1>This is the main wowowo page</h1>
      </el-col>
    </el-row>
  </div>
</template>

<script>

import API from '../../consts'
import axios from 'axios'
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  },
  components: {
    
  },
  mounted() {
    console.log(API);
    axios.get(API.SUBSCRIPTIONS_API)
    .then(data => console.log(data))
    .catch(err => console.log("err", err))

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
