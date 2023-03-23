<script setup>
import NavHorizontalMenu from '@/Components/Nav/NavHorizontalMenu.vue';
import NavSidebarDesktop from '@/Components/Nav/NavSidebarDesktop.vue';
import NavSidebarMobile from '@/Components/Nav/NavSidebarMobile.vue';
import { HomeIcon, UsersIcon } from '@heroicons/vue/24/outline';
import { ref, watch } from 'vue';

const navigation = [
  { name: 'Dashboard', icon: HomeIcon, href: '/dashboard' },
  {
    name: 'Users',
    icon: UsersIcon,
    children: [{ name: 'Employees', href: '/employees' }],
  },
];
const showMobileSidebar = ref(false);
const showSidebar = ref(sessionStorage.getItem('showSidebar') === 'false' ? false : true);
watch(showSidebar, (showSidebar) => {
  sessionStorage.setItem('showSidebar', showSidebar);
});
</script>
<template>
  <div class="min-h-full">
    <NavSidebarMobile v-model:sidebar-open="showMobileSidebar" :navigation="navigation" />
    <Transition
      enter-active-class="transition ease-in-out duration-150 transform"
      enter-from-class="-translate-x-full"
      enter-to-class="translate-x-0"
      leave-active-class="transition ease-in-out duration-150 transform"
      leave-from-class="translate-x-0"
      leave-to-class="-translate-x-full"
    >
      <NavSidebarDesktop :navigation="navigation" v-if="showSidebar" />
    </Transition>

    <div :class="[showSidebar ? ' lg:pl-64' : '', 'transition-all duration-150 flex flex-1 flex-col']">
      <NavHorizontalMenu v-model:show-mobile-sidebar="showMobileSidebar" v-model:show-sidebar="showSidebar" />
      <header v-if="$slots.header" class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>
      <main>
        <slot />
      </main>
    </div>
  </div>
</template>
