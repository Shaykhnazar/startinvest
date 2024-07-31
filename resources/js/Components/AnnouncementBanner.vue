<template>
  <div v-if="isTestMode" id="scroll-container">
    <div id="scroll-text">
     ⚠️ Veb-sayt hozirda test rejimida ishlamoqda. Ba'zi imkoniyatlar mavjud bo'lmasligi mumkin. ⚠️
    </div>
  </div>
</template>

<script>
export default {
  props: {
    isTestMode: {
      type: Boolean,
      required: true
    }
  }
}
</script>

<style scoped>
#scroll-container {
  background-color: #f39c12;
  color: white;
  padding: 5px 5px;
  //text-align: center;
  font-weight: bold;
  overflow: hidden;
  text-wrap: nowrap;
}

#scroll-text {
  /* animation properties */
  -moz-transform: translateX(100%);
  -webkit-transform: translateX(100%);
  transform: translateX(100%);

  -moz-animation: my-animation 15s linear infinite;
  -webkit-animation: my-animation 15s linear infinite;
  animation: my-animation 15s linear infinite;
}

/* for Firefox */
@-moz-keyframes my-animation {
  from { -moz-transform: translateX(100%); }
  to { -moz-transform: translateX(-100%); }
}

/* for Chrome */
@-webkit-keyframes my-animation {
  from { -webkit-transform: translateX(100%); }
  to { -webkit-transform: translateX(-100%); }
}

@keyframes my-animation {
  from {
    -moz-transform: translateX(100%);
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
  }
  to {
    -moz-transform: translateX(-100%);
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
  }
}

/* Media Queries */

/* For devices with width less than 480px */
@media (max-width: 480px) {
  #scroll-text {
    -moz-animation: my-animation 10s linear infinite;
    -webkit-animation: my-animation 10s linear infinite;
    animation: my-animation 10s linear infinite;
  }
}

/* For devices with width between 480px and 768px */
@media (min-width: 480px) and (max-width: 768px) {
  #scroll-text {
    -moz-animation: my-animation 20s linear infinite;
    -webkit-animation: my-animation 20s linear infinite;
    animation: my-animation 20s linear infinite;
  }
}

/* For devices with width between 768px and 1024px */
@media (min-width: 768px) and (max-width: 1024px) {
  #scroll-text {
    -moz-animation: my-animation 25s linear infinite;
    -webkit-animation: my-animation 25s linear infinite;
    animation: my-animation 25s linear infinite;
  }
}

/* For devices with width greater than 1024px */
@media (min-width: 1024px) {
  #scroll-text {
    -moz-animation: my-animation 30s linear infinite;
    -webkit-animation: my-animation 30s linear infinite;
    animation: my-animation 30s linear infinite;
  }
}
</style>
