<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { ChevronDownIcon } from '@heroicons/vue/20/solid';
import { router } from '@inertiajs/vue3';
import route from 'ziggy';
</script>

<template>
  <Menu as="div" class="relative ml-3">
    <div>
      <MenuButton
        class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 lg:rounded-md lg:p-2 lg:hover:bg-gray-50"
      >
        <img
          class="h-8 w-8 rounded-full object-cover"
          :src="$page.props.auth.user?.profile_photo_url"
          :alt="$page.props.auth.user?.name"
        />
        <span class="ml-3 hidden text-sm font-medium text-gray-700 lg:block"
          ><span class="sr-only">Open user menu for </span>{{ $page.props.auth.user?.name }}</span
        >
        <ChevronDownIcon class="ml-1 hidden h-5 w-5 flex-shrink-0 text-gray-400 lg:block" aria-hidden="true" />
      </MenuButton>
    </div>
    <transition
      enter-active-class="transition ease-out duration-100"
      enter-from-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="transform opacity-100 scale-100"
      leave-to-class="transform opacity-0 scale-95"
    >
      <MenuItems
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      >
        <MenuItem v-slot="{ active }">
          <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile</a>
        </MenuItem>
        <MenuItem v-slot="{ active }">
          <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Settings</a>
        </MenuItem>
        <MenuItem v-slot="{ active }">
          <a
            href="#"
            :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']"
            @click="
              (event) => {
                event.preventDefault();
                router.post(route('logout'));
              }
            "
            >Logout</a
          >
        </MenuItem>
      </MenuItems>
    </transition>
  </Menu>
</template>
