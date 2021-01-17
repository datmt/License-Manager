<template>
    <el-menu
        default-active="2"
        class="el-menu-vertical-demo">
      <el-menu-item index="1">
        <router-link to="/">
        <i class="el-icon-menu"></i>
        Home
        </router-link>
      </el-menu-item>

      <el-menu-item index="2">
        <router-link to="/products">
        <i class="el-icon-menu"></i>
        Products
        </router-link>
      </el-menu-item>


      <el-menu-item index="3">
        <router-link to="/subscriptions">
          <i class="el-icon-menu"></i>
          Subscriptions
        </router-link>
      </el-menu-item>


      <el-menu-item index="4">
        <router-link to="/customers">
          <i class="el-icon-menu"></i>
          Customers
        </router-link>
      </el-menu-item>


      <el-menu-item index="5">
        <router-link to="/transactions">
          <i class="el-icon-menu"></i>
          Transactions
        </router-link>
      </el-menu-item>


    </el-menu>
</template>

<script>
export default {
  name: "SidebarLeft",
  methods: {
  }
}
</script>

<style scoped>

</style>