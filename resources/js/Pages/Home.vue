<script lang="ts" setup>
import {Head} from '@inertiajs/vue3';
import ElementColumnCard from '@/Components/ElementColumnCard.vue'
import App from '@/Layouts/App.vue';



</script>

<template>
  <App>
    <template #header>
      <Head title="Home page"/>
    </template>

    <p class="text-center demonstration"></p>
    <el-carousel
      height="400px"
      direction="vertical"
      type="card"
      :autoplay="false"
    >
      <el-carousel-item v-for="item in 4" :key="item">
        <h3 text="2xl" justify="center">{{ item }}</h3>
      </el-carousel-item>
    </el-carousel>
    <br/>
    <el-row>
      <ElementColumnCard text-title="Idea">
        <template #icon>
          <Opportunity/>
        </template>
      </ElementColumnCard>
      <ElementColumnCard text-title="Team">
        <template #icon>
          <User/>
        </template>
      </ElementColumnCard>
      <ElementColumnCard text-title="StartUp">
        <template #icon>
          <Flag/>
        </template>
      </ElementColumnCard>
      <ElementColumnCard text-title="Financing">
        <template #icon>
          <Money/>
        </template>
      </ElementColumnCard>
      <ElementColumnCard text-title="Success" :has-right-arrow-icon="false">
        <template #icon>
          <SuccessFilled/>
        </template>
      </ElementColumnCard>
    </el-row>
  </App>
</template>

<style scoped>
.el-carousel__item h3 {
  color: #475669;
  opacity: 0.75;
  line-height: 200px;
  margin: 0;
  text-align: center;
}

.el-carousel__item:nth-child(2n) {
  background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n + 1) {
  background-color: #d3dce6;
}

.flex-grow {
  flex-grow: 1;
}
</style>
