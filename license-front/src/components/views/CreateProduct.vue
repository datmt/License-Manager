<template>
  <div>
    <h1>Create a product</h1>
    <el-form>
      <el-form-item label="Product name" prop="pass">
        <el-input type="text" v-model="name" autocomplete="off"></el-input>
      </el-form-item>

      <el-form-item label="Description" prop="desc">
        <el-input type="textarea" v-model="description"></el-input>
      </el-form-item>

      <el-form-item label="Machine count" prop="pass">
        <el-input type="number" v-model="machine_count" autocomplete="off"></el-input>
      </el-form-item>

      <el-form-item label="Price" prop="pass">
        <el-input type="number" v-model="price" autocomplete="off"></el-input>
      </el-form-item>

      <el-form-item label="Landing page url" prop="pass">
        <el-input type="url" v-model="landing_page_url" autocomplete="off"></el-input>
      </el-form-item>

      <el-form-item label="Add time (month)" prop="pass">
        <el-input type="number" v-model="add_time" autocomplete="off"></el-input>
      </el-form-item>

      <el-button :loading="creating" type="primary" @click="createProduct">Create product</el-button>
    </el-form>
  </div>

</template>

<script>
import axios from "axios";
import API from '../../consts'
import { getToken } from "../../common/common";

export default {
  name: "CreateProduct",
  data() {
    return {
      name: "",
      description: "",
      price: 0,
      machine_count: 0,
      url: "",
      add_time: 0,
      landing_page_url: "",
      creating: false
    }
  },
  mounted() {

  },
  methods: {
    createProduct() {
      if (!this.name ||! this.description || ! this.price || !this.machine_count || !this.add_time) {
        this.$message.warning("Missing data");
        return;
      }
      let vm = this;
      vm.creating = true;

      const config = {
        headers: { Authorization: `Bearer ${getToken()}` }
      };
      axios.post(API.PRODUCTS_API, {
        name: this.name,
        description: this.description,
        price : this.price,
        machine_count: this.machine_count,
        add_time: this.add_time * 31 * 24 * 3600,
        landing_page_url: this.landing_page_url
      }, config)
          .then(data => {
            vm.creating = false;
            console.log(data);
            vm.$message.success('Product created');
            vm.$router.go(vm.$router.currentRoute)
          })
          .catch(err => {
            vm.creating = false;
            console.log(err);
            vm.$message.error('Product creation failed!');
          })
    }
  }

}
</script>

<style scoped>

</style>