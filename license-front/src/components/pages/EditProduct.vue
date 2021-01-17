<template>
  <div>
    <h1>Update product {{product.name}}</h1>
    <el-form>
      <el-form-item label="Product name" prop="pass">
        <el-input type="text" v-model="product.name" autocomplete="off"></el-input>
      </el-form-item>

      <el-form-item label="Description" prop="desc">
        <el-input type="textarea" v-model="product.description"></el-input>
      </el-form-item>

      <el-form-item label="Machine count" prop="pass">
        <el-input type="number" v-model="product.machine_count" autocomplete="off"></el-input>
      </el-form-item>

      <el-form-item label="Price" prop="pass">
        <el-input type="number" v-model="product.price" autocomplete="off"></el-input>
      </el-form-item>

      <el-form-item label="Landing page url" prop="pass">
        <el-input type="url" v-model="product.landing_page_url" autocomplete="off"></el-input>
      </el-form-item>

      <el-form-item label="Add time (month)" prop="pass">
        <el-input type="number" v-model="addTime" autocomplete="off"></el-input>
      </el-form-item>

      <el-button @click="updateProduct">Update product</el-button>
    </el-form>
  </div>

</template>

<script>
import axios from "axios";
import API from '../../consts'
import { getToken } from "../../common/common";

export default {
  name: "EditProduct",
  data() {
    return {
      product: {},
      addTime: 0,
      productId: 0
    }
  },
  mounted() {
    this.productId = this.$route.params.id;
    const config = {
      headers: { Authorization: `Bearer ${getToken()}` }
    };
    let vm = this;
    axios.get(API.PRODUCTS_API + "/" + this.productId, config)
    .then(data => {
      if (data.data) {
        vm.product = data.data;
        vm.addTime = vm.product.add_time / (3600 * 24 * 31)
      }
    })
    .catch(err => console.log(err))

  },
  methods: {
    updateProduct() {

      if (!this.product.name ||! this.product.description || ! this.product.price || !this.product.machine_count || !this.addTime) {
        this.$message.warning("Missing data");
        return;
      }

      let vm = this;

      const config = {
        headers: { Authorization: `Bearer ${getToken()}` }
      };
      axios.put(API.PRODUCTS_API + "/" + this.productId , {
        name: this.product.name,
        description: this.product.description,
        price : this.product.price,
        machine_count: this.product.machine_count,
        add_time: this.addTime * 31 * 24 * 3600,
        landing_page_url: this.product.landing_page_url
      }, config)
          .then(data => {
            console.log('success!', data);
            vm.$message.success("Product updated!");
            vm.$router.push('/products')
          })
          .catch(err => {
            console.log(err);
            vm.$message.error('Error updating product');
          })
    }
  }

}
</script>

<style scoped>

</style>