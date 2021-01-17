<template>
  <div>
    <el-tabs v-model="activeTab">
      <el-tab-pane name="all-products" label="All products">
        <AllProducts />
      </el-tab-pane>

      <el-tab-pane name="create-product" label="Create product">
        <CreateProduct />
      </el-tab-pane>

    </el-tabs>

  </div>

</template>

<script>
import AllProducts from "../views/AllProducts";
import CreateProduct from "../views/CreateProduct";

export default {
  name: "Products",
  components: {AllProducts, CreateProduct},
  data() {
    return {

      activeTab: "all-products"
    }
  },
  mounted() {

  }

}
</script>

<style scoped>

</style>