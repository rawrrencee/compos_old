<template>
  <div class="bg-gray-50 min-h-screen flex items-center justify-center px-16 overflow-clip">
    <div class="relative w-full max-w-lg">
      <div
        class="absolute top-0 -left-4 w-72 h-72 bg-sky-100 rounded-full mix-blend-multiply filter blur-xl opacity-80 animate-blob"
      ></div>
      <div
        class="absolute top-0 -right-4 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-80 animate-blob animation-delay-2000"
      ></div>
      <div
        class="absolute -bottom-28 left-20 w-72 h-72 bg-indigo-100 rounded-full mix-blend-multiply filter blur-xl opacity-80 animate-blob animation-delay-4000"
      ></div>
      <div class="relative">
        <slot />
      </div>
    </div>
  </div>
</template>
