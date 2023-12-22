<script lang="ts" setup>
import { Head, Link } from '@inertiajs/vue3';
import ElementColumnCard from '@/Components/ElementColumnCard.vue'
import { ref } from 'vue'

const activeIndex = ref('0')
const handleSelect = (key: string, keyPath: string[]) => {
  console.log(key, keyPath)
}

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

</script>

<template>
    <Head title="Home page" />

    <el-container>
        <el-header>
          <el-menu
            :default-active="activeIndex"
            class="el-menu-demo"
            mode="horizontal"
            :ellipsis="false"
            @select="handleSelect"
          >
            <el-menu-item index="0">
              <img
                style="width: 30px"
                src="/vendor/orchid/favicon.svg"
                alt="Element logo"
              />
            </el-menu-item>
            <el-menu-item index="1">Ideas</el-menu-item>
            <el-menu-item index="2">StartUps</el-menu-item>
            <el-menu-item index="3">Investors</el-menu-item>
            <el-menu-item index="4">Blog</el-menu-item>
            <el-menu-item index="5">About Us</el-menu-item>

            <div class="flex-grow" />
            <el-menu-item index="6">Chat</el-menu-item>
            <template v-if="canLogin">
              <el-menu-item index="7">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                >Dashboard</Link>
                <template v-else>
                  <Link
                    v-if="canRegister"
                    :href="route('register')"
                  >Sign Up</Link
                  >
                </template>
              </el-menu-item>
            </template>
          </el-menu>
        </el-header>
        <el-main>
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
                        <User />
                    </template>
                </ElementColumnCard>
                <ElementColumnCard text-title="StartUp">
                    <template #icon>
                        <Flag />
                    </template>
                </ElementColumnCard>
                <ElementColumnCard text-title="Financing">
                    <template #icon>
                        <Money />
                    </template>
                </ElementColumnCard>
                <ElementColumnCard text-title="Success" :has-right-arrow-icon="false">
                    <template #icon>
                        <SuccessFilled />
                    </template>
                </ElementColumnCard>
            </el-row>
        </el-main>
        <el-footer>
            <el-row>
                <el-col
                    :span="24"
                    :offset="0"
                    class="text-center"
                >
                    <div class="text-3xl font-bold">StartInvest © {{ new Date().getFullYear() }}</div>
                </el-col>
            </el-row>
        </el-footer>
    </el-container>
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
