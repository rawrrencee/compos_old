<script setup>
import Logo from '../Logo.vue';
import NavMenuItems from './NavMenuItems.vue';

defineProps({
  navigation: Object,
});
</script>

<template>
  <div class="hidden lg:fixed lg:w-64 lg:inset-y-0 lg:flex lg:flex-col">
    <div class="flex flex-grow flex-col overflow-y-auto border-r border-gray-200 bg-white pt-5">
      <div class="flex flex-shrink-0 justify-center">
        <Logo size="small" />
      </div>
      <div class="mt-5 flex flex-grow flex-col">
        <NavMenuItems :navigation="navigation" />
      </div>
    </div>
  </div>
</template>
