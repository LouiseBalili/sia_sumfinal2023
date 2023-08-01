<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref } from 'vue'
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    client: Object,
    loans: Array
})

function toggleActive(client) {
    const newStatus = client.active ? 0 : 1;
    router.visit('/loans/toggle/' + client.id, {
        method: 'POST',
        data: {
            active: newStatus,
        },
        preserveScroll: true
    })
}

function isActive(id) {
    if(id == 1){
        return true;
    } else {
        return false;
    }
}

const confirmingAccountDeletion = ref(false);

const confirmAccountDeletion = () => {
    confirmingAccountDeletion.value = true;
};

const closeModal = () => {
    confirmingAccountDeletion.value = false;
};

const deleteAccount = () => {
    form.delete(route('clients.delete', { client: props.client.id}), {
        onSuccess: () => closeModal(),
    });
};
</script>
<template>
    <AppLayout title="View">
        <template #header>
            <div class="flex ">
                <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">View Transaction</h2>
                <Link :href="'/loans/view/' + props.client.id + '/send-overdue-notice'" as="button"
                class="inline-flex items-center px-4 -mt-2 mx-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >SEND OVERDUE NOTICE</Link>
                <Link class="button1 border border-gray-300 p-2 rounded shadow flex -mt-2" as="button" href="/loans">Back</Link>
            </div>
        </template>

        <div class="bg-dots-darker">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex items-start flex-wrap lg:flex-nowrap lg:space-x-4">
                <div class="lg:w-2/5 sm:w-full rounded-lg shadow-sm h-auto p-4 bg-gray-50">
                    <img :src="props.client.profile_pic_url" class="w-full mb-4 border rounded" alt="">

                    <p class="text-base font-normal">Name:
                        <span class="font-semibold">{{ props.client.fname }} {{ props.client.lname }}</span>
                    </p>
                    <p class="text-base font-normal">Address:
                        <span class="font-semibold">{{ props.client.address }}</span>
                    </p>
                    <p class="text-base font-normal">Phone:
                        <span class="font-semibold">{{ props.client.phone }}</span>
                    </p>
                    <p class="text-base font-normal">Email:
                        <span class="font-semibold">{{ props.client.email }}</span>
                    </p>
                    <p class="text-base font-normal">Initial Loan:
                        <span class="font-semibold">₱ {{ props.client.initial_loan }}</span>
                    </p>
                    <p class="text-base font-normal">Issuance Date:
                        <span class="font-semibold">{{ props.client.issuance_date }}</span>
                    </p>
                    <p class="text-base font-normal">Status:
                        <span v-if="props.client.active==1" class="font-semibold text-green-500">Active</span>
                        <span v-if="props.client.active==0" class="font-semibold text-yellow-500">Pending</span>
                    </p>
                    <div class="flex justify-center items-center mt-4 mb-4 space-x-2">
                        <label class="relative inline-flex items-center cursor-pointer" :for="'status-' + props.client.id" >
                            <input type="checkbox" :checked="isActive(props.client.active)" :id="'status-' + props.client.id" class="sr-only peer" @change.prevent="toggleActive(client)">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[1px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Toggle Active</span>
                        </label>
                        <Link @click="confirmAccountDeletion"
                        as="button"
                        method="delete"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        >Delete</Link>

                        <DialogModal :show="confirmingAccountDeletion" @close="closeModal">
                            <template #title>
                                Delete Account
                            </template>
                            <template #content>
                                Are you sure you want to delete this account? Once this account is deleted, all of its resources and data will be permanently deleted. Please click "Confirm" to confirm you would like to permanently delete this account.
                            </template>

                            <template #footer>
                                <SecondaryButton @click="closeModal">
                                    Cancel
                                </SecondaryButton>

                                <DangerButton
                                    class="ml-3"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    @click="deleteAccount"
                                >
                                    Confirm
                                </DangerButton>
                            </template>
                        </DialogModal>

                        <Link :href="'/loans/edit/' + props.client.id"
                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        >Edit</Link>
                    </div>
                </div>
                <div class="lg:3/5 sm:w-full bg-gray-50 rounded-lg shadow-sm h-auto p-4">
                    <div class="flex justify-between items-center">
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Payment Records</h1>
                        <Link :href="'/loans/add-payment/' + props.client.id"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Add Payment</Link>
                    </div>
                    <hr class="mb-2 mt-2">

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Payment
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Balance
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        ...
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="loan in props.loans" :key="loan.id" class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ loan.payment }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ loan.payment_date}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ loan.balance}}
                                    </td>
                                    <td class="px-6 py-4 space-x-2 text-center">
                                        <Link :href="'/loans/view/' + props.client.id + '/' + loan.id + '/edit'" as="button"
                                        class="px-2 py-1 rounded-lg bg-blue-500 text-sm font-semibold text-white"
                                        ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                          </svg>
                                        </Link>
                                        <Link :href="'/loans/view/' + props.client.id + '/' + loan.id" as="button" method="delete"
                                        class="px-2 py-1 rounded-lg bg-red-500 text-sm font-semibold text-white"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                          </svg>
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p v-if="loans.length <= 0" class="text-sm text-center text-gray-500 font-semibold">No records</p>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>

<style scoped>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
</style>
