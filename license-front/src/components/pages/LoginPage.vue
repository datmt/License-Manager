<template>
  <div>
    <el-row>
      <el-col :span="20">
        <h1>Please login</h1>
        <el-form>
          <el-form-item label="Email" prop="pass">
            <el-input type="email" v-model="email" autocomplete="off"></el-input>
          </el-form-item>
          <el-form-item label="Password" prop="pass">
            <el-input type="password" v-model="password" autocomplete="off"></el-input>
          </el-form-item>
          <el-button @click="login">Login</el-button>
        </el-form>

      </el-col>
    </el-row>
  </div>
</template>

<script>
import API from '../../consts'
import axios from "axios";
import {updateAccessToken, isAuthenticated } from "../../common/common";

export default {
  name: 'LoginPage',
  data() {
    return {
      email: "",
      password: ""
    }
  },
  components: {
    
  },
  methods: {
    login() {
      if (!this.email || !this.password) {
        this.$message.warning('Please enter credentials');
        return;
      }
      let vm = this;
      console.log("log in")
      axios.post(API.LOGIN_API, {
        "email" : vm.email,
        "password" : vm.password
      }).then(data => {
        console.log("login ok", data)
        if (data.data) {
          updateAccessToken(data.data.access_token);
          vm.$router.push('/products')
        }
      }).catch(err => {
        console.log("login error", err)
      })

    }
  },
  mounted() {
    if (isAuthenticated) {
      this.$router.push('/')
    }
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
