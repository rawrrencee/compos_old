<script setup>
import { Bars3CenterLeftIcon, Bars3Icon } from '@heroicons/vue/24/outline';
import NavProfileDropdown from './NavProfileDropdown.vue';

defineProps({
  showMobileSidebar: Boolean,
  showSidebar: Boolean,
});
defineEmits(['update:showMobileSidebar', 'update:showSidebar']);
</script>

<template>
  <div class="flex h-16 flex-shrink-0 border-b border-gray-200 bg-white lg:border-b lg:border-gray-200">
    <button
      type="button"
      class="border-r border-gray-200 px-4 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-500 lg:hidden"
      @click="$emit('update:showMobileSidebar', true)"
    >
      <span class="sr-only">Open mobile sidebar</span>
      <Bars3CenterLeftIcon class="h-6 w-6" aria-hidden="true" />
    </button>
    <button
      type="button"
      class="border-r border-gray-200 px-4 text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-500 hidden lg:block"
      @click="$emit('update:showSidebar', !showSidebar)"
    >
      <span class="sr-only">Open sidebar</span>
      <Bars3CenterLeftIcon class="h-6 w-6" aria-hidden="true" v-if="showSidebar" />
      <Bars3Icon class="h-6 w-6" aria-hidden="true" v-else />
    </button>
    <div class="flex flex-1 justify-end px-4 sm:px-6 lg:px-8">
      <div class="ml-4 flex items-center md:ml-6">
        <NavProfileDropdown />
      </div>
    </div>
  </div>
</template>
