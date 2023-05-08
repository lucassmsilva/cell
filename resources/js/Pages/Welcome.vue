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
    <div class="flex h-screen w-full bg-stone-100 dark:bg-slate-600">
        <div class="w-full bg-gradient-to-br from-sky-900 to-indigo-500 flex items-center justify-center">
            <div class="w-full px-2 space-y-2 flex flex-col items-center lg:w-1/3">

                <div class="w-[300px] h-[200px] border border-white text-center">
                LOGO
                </div>

                <div class="w-full flex flex-col space-y-2">

                <button type="button" class="rounded-lg p-2 bg-stone-200 shadow-lg leading">
                    ENTRAR
                </button>

                <button type="button" class="rounded-lg p-2 bg-stone-200 shadow-lg leading">
                    REGISTRAR
                </button>
                </div>
            </div>
        </div>
    </div>

</template>
