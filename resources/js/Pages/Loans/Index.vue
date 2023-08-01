<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import ClientCard from '@/Components/ClientCard.vue';

const props = defineProps({
    clients: Array
})

const search = (ev) => {
    router.visit('/loans/search/' + ev.target.value)
}
</script>

<template>
    <Head title="Loans" />

    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Transactions</h2>
                <div class="-mt-2">
                    <input type="text" name="search" id="search" class="rounded-full px-4 py-1" placeholder="Search..." @keydown.enter="search($event)">
                </div>
            </div>
        </template>

        <div class="py-12 bg-dots-darker ">
            <div class="max-w-7xl mx-auto">
                <ClientCard class="-mt-2" v-for="client in props.clients" :client="client" :key="client.id" />
            </div>
        </div>

    </AppLayout>
</template>

<style scoped>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
</style>
