<script setup>
import AppLayout2 from '@/Layouts/AppLayout2.vue';
import { Link, router } from '@inertiajs/vue3';
import Column from 'primevue/column';
import DataTable from 'primevue/datatable';

const props = defineProps({
  users: Object,
  selectedUser: Object,
  data: Object,
});
const getEmployee = (id) => {
  const data = router.visit(`/employees/${id}`);
  console.log(data);
};
</script>

<template>
  <AppLayout2 title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Employees</h2>
    </template>

    <div class="py-4">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <Link href="/employees/1" :only="['selectedUser']">User</Link>
        <button class="bg-gray-100 rounded-md px-4 py-2 hover:bg-gray-200" @click="getEmployee(2)">Test</button>
        <p>{{ data?.name }} - {{ data?.email }}</p>
        <DataTable
          class="p-datatable-sm"
          stripedRows
          paginator
          :value="props.users?.data"
          :rows="5"
          :rowsPerPageOptions="[5, 10, 20, 50]"
        >
          <Column field="id" header="Id"></Column>
          <Column field="name" header="Name"></Column>
          <Column field="email" header="Email"></Column>
        </DataTable>
      </div>
    </div>
  </AppLayout2>
</template>
