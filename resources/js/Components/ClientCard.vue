<template>
    <div class="min-w-[350px] mb-4 mx-2 p-4 bg-white rounded shadow border flex-1 cursor-pointer" @click="show(client)">
        <div class="flex justify-between">
            <h3 class="text-xl">{{ client.fname }} {{ client.lname }}</h3>

            <h2 v-if="props.client.active==1" class="text-xl text-green-500 mt-3">₱ {{ client.initial_loan }}</h2>
            <h2 v-if="props.client.active==0" class="text-xl text-yellow-500 mt-3">₱ {{ client.initial_loan }}</h2>
        </div>
        <div class="text-gray-500 italic -mt-3">({{ client.issuance_date }}) {{ client.address }} </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    client: Object
})

function show(client) {
    router.visit('/loans/view/' + client.id)
}

</script>
