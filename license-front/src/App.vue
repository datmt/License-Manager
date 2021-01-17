<template>
  <div id="app">
    <el-row>
      <el-col :span="4">
        <SidebarLeft />
      </el-col>

      <el-col :span="20">
        <router-view/>
      </el-col>
    </el-row>

  </div>
</template>

<script>
import SidebarLeft from "@/components/layout/SidebarLeft";


export default {
  name: 'App',
  props: {
    msg: String
  },
  components: {
    SidebarLeft
  },
  mounted() {


  }
}
</script>