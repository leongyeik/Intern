<template>
  <div>index</div>
  <div>
    The message is {{ message }}
  </div>
</template>
<script setup>
import {Link} from '@inertiajs/inertia-vue3'
defineProps({
  message: String,
})
</script>