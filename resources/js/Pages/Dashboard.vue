<script setup>
import Welcome from '@/Components/Welcome.vue';
import AppLayout2 from '@/Layouts/AppLayout2.vue';
</script>

<template>
  <AppLayout2 title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template>

    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <Welcome />
        </div>
      </div>
    </div>
  </AppLayout2>
</template>
