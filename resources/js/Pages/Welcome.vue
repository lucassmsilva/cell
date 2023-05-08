<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="h-screen w-full bg-stone-100 dark:bg-slate-600">

    
    <transition
        enter-from-class="-translate-x-10 opacity-0"
        enter-active-class="transition duration-150 ease-in-out transform"
        enter-to-class="translate-x-0 opacity-100"
        leave-from-class="translate-x-0 opacity-100"
        leave-active-class="transition duration-150 ease-in-out transform"
        leave-to-class="-translate-x-10 opacity-0"
    >
        <nav v-if="menuVisible" class="h-full lg:sticky top-0 flex w-full lg:w-[226px] absolute flex-col border-r border-stone-300 shadow-[1px_0_10px_2px_rgba(0,0,0,0.1)] dark:bg-gray-700 dark:border-gray-700 bg-stone-200 z-50">
        NAV
        </nav>

        <main class="flex flex-col w-3/4 flex-1 h-screen dark:bg-slate-800 bg-stone-100 relative">
            CHAVE
        </main>
    </transition>


    </div>

</template>
