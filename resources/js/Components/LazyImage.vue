<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
  src: {
    type: String,
    required: true
  },
  alt: {
    type: String,
    default: ''
  },
  width: {
    type: [Number, String],
    default: null
  },
  height: {
    type: [Number, String],
    default: null
  }
});

const isLoaded = ref(false);
const imgRef = ref(null);

onMounted(() => {
  const observer = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      imgRef.value.src = props.src;
      isLoaded.value = true;
      observer.disconnect();
    }
  });

  observer.observe(imgRef.value);
});
</script>

<template>
  <img
    ref="imgRef"
    :data-src="src"
    :alt="alt"
    :width="width"
    :height="height"
    :class="{ 'opacity-0': !isLoaded, 'opacity-100': isLoaded }"
    class="transition-opacity duration-300"
  />
</template>
