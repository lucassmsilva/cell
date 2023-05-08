<template>
    <transition
        enter-from-class="-translate-x-10 opacity-0"
        enter-active-class="transition duration-150 ease-in-out transform"
        enter-to-class="translate-x-0 opacity-100"
        leave-from-class="translate-x-0 opacity-100"
        leave-active-class="transition duration-150 ease-in-out transform"
        leave-to-class="-translate-x-10 opacity-0"
    >
        <nav  class="h-full lg:sticky top-0 flex w-full lg:w-[226px] absolute flex-col border-r border-stone-300 shadow-[1px_0_10px_2px_rgba(0,0,0,0.1)] dark:bg-gray-700 dark:border-gray-700 bg-stone-200 z-50">
        <div class="text-white">TESTE</div>
        </nav>
    </transition>
</template>