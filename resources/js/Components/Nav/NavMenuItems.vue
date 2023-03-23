<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import route from 'ziggy';

defineProps({
  navigation: Object,
});

const currentRoute = ref(route().current());
const isCurrent = (menuItem) => {
  return (
    `/${currentRoute.value}`.includes(menuItem.href) ||
    menuItem.children?.some((subItem) => `/${currentRoute.value}`.includes(subItem.href))
  );
};
</script>

<template>
  <nav class="flex-1 space-y-1 bg-white px-2" aria-label="Sidebar">
    <template v-for="item in navigation" :key="item.name">
      <div v-if="!item.children">
        <a
          :href="item.href"
          :class="[
            isCurrent(item)
              ? 'bg-gray-100 text-gray-900'
              : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900',
            'group flex w-full items-center rounded-md py-2 pl-2 text-sm font-medium',
          ]"
          @click="
            (event) => {
              event.preventDefault();
              router.get(item.href);
            }
          "
        >
          <component
            :is="item.icon"
            :class="[
              isCurrent(item) ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500',
              'mr-3 h-6 w-6 flex-shrink-0',
            ]"
            aria-hidden="true"
          />
          {{ item.name }}
        </a>
      </div>
      <Disclosure v-else v-slot="{ open }" as="div" :default-open="true" class="space-y-1">
        <DisclosureButton
          class="group flex w-full items-center rounded-md py-2 pl-2 pr-1 text-left text-sm font-medium focus:outline-none focus:ring-2 focus:ring-sky-500 bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900"
        >
          <component
            :is="item.icon"
            class="mr-3 h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
            aria-hidden="true"
          />
          <span class="flex-1">{{ item.name }}</span>
          <svg
            :class="[
              open ? 'rotate-90 text-gray-400' : 'text-gray-300',
              'ml-3 h-5 w-5 flex-shrink-0 transform transition-colors duration-150 ease-in-out group-hover:text-gray-400 ',
            ]"
            viewBox="0 0 20 20"
            aria-hidden="true"
          >
            <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
          </svg>
        </DisclosureButton>
        <transition
          enter-active-class="transition duration-100 ease-out"
          enter-from-class="transform scale-95 opacity-0"
          enter-to-class="transform scale-100 opacity-100"
          leave-active-class="transition duration-75 ease-out"
          leave-from-class="transform scale-100 opacity-100"
          leave-to-class="transform scale-95 opacity-0"
        >
          <div v-show="open">
            <DisclosurePanel class="space-y-1" static>
              <DisclosureButton
                v-for="subItem in item.children"
                :key="subItem.name"
                as="a"
                :href="subItem.href"
                :class="[
                  isCurrent(item)
                    ? 'bg-gray-100 text-gray-900'
                    : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900',
                  'group flex w-full items-center rounded-md py-2 pl-11 pr-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900',
                ]"
                @click="
                  (event) => {
                    event.preventDefault();
                    router.get(subItem.href);
                  }
                "
              >
                {{ subItem.name }}</DisclosureButton
              >
            </DisclosurePanel>
          </div>
        </transition>
      </Disclosure>
    </template>
  </nav>
</template>
