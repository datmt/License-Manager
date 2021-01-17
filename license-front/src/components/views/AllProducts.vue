<template>
  <div>
    <h1>All products</h1>
    <el-table :data="products">
      <el-table-column prop="name" label="Name"></el-table-column>
      <el-table-column prop="description" label="Description"></el-table-column>
      <el-table-column prop="price" label="Price"></el-table-column>
      <el-table-column prop="add_time" label="Add time"></el-table-column>
      <el-table-column prop="machine_count" label="Machine count"></el-table-column>
      <el-table-column prop="created_at" label="Created time"></el-table-column>
      <el-table-column label="Action">
        <template slot-scope="scope">
          <router-link :to="{path: '/products/' + products[scope.$index].id}">
            <el-button  type="primary" icon="el-icon-edit" size="mini" circle></el-button>
          </router-link>

          <el-button @click="deleteProduct(products[scope.$index].id)"  type="danger" icon="el-icon-delete" size="mini" circle></el-button>
        </template>

      </el-table-column>
    </el-table>
  </div>

</template>

<script>
import axios from "axios";
import API from '../../consts'
import { getToken, removeToken } from "../../common/common";

export default {
  name: "AllProducts",
  data() {
    return {
      products : []
    }
  },
  mounted() {
    this.reloadProducts();
  },

  methods: {
    reloadProducts() {
      let vm = this;
      const config = {
        headers: { Authorization: `Bearer ${getToken()}` }
      };
      axios.get(API.PRODUCTS_API, config)
          .then(data => {
            if (data.data) {
              vm.products = data.data;
            }
          })
          .catch(() => removeToken())
    },
    deleteProduct(productId) {
      const config = {
        headers: { Authorization: `Bearer ${getToken()}` }
      };

      let vm = this;
      axios.delete(API.PRODUCTS_API + "/" + productId, config)
      .then(data => {
        console.log('product deleted', data);
        vm.$message.info('Product deleted');
        vm.reloadProducts();
      })
      .catch(err => {
        console.log('err', err);
        vm.$message.error('Product deletion failed!')
      })
    }
  }

}
</script>

<style scoped>

</style>