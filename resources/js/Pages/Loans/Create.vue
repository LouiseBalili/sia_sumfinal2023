<script setup>
import { ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const photoPreview = ref(null);
const photoInput = ref(null);

const form = useForm({
    profile_pic: '',
    fname: null,
    lname: null,
    address: null,
    phone: null,
    email: null,
    initial_loan: null,
    issuance_date: '',
});

function addLoan() {
    form.post('/loans')
}

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};
</script>

<template>
    <AppLayout title="Request">
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">Request Loan</h2>
                <Link class="button1 border border-gray-300 p-2 rounded shadow flex -mt-2" as="button" href="/dashboard">Back</Link>
            </div>
        </template>

        <div class="bg-dots-darker">
            <div class="max-w-4xl py-10 ml-40">
            <FormSection @submitted="addLoan">
                <template #form>

                    <div class="col-span-8 sm:col-span-8">
                        <input
                            ref="photoInput"
                            type="file"
                            @input="form.profile_pic = $event.target.files[0]"
                            class="hidden"
                            @change="updatePhotoPreview"
                        >

                        <InputLabel for="photo" value="Client Photo" />

                        <!-- Current Profile Photo -->
                        <div v-show="! photoPreview" class="mt-2">
                            <img src="https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" alt="client profile" class="rounded-full h-40 w-40 object-cover">
                        </div>

                        <!-- New Profile Photo Preview -->
                        <div v-show="photoPreview" class="mt-2">
                            <span
                                class="block rounded-full w-40 h-40 bg-cover bg-no-repeat bg-center"
                                :style="'background-image: url(\'' + photoPreview + '\');'"
                            />
                        </div>

                        <SecondaryButton class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                            Select A Photo
                        </SecondaryButton>

                        <InputError :message="form.errors.photo" class="mt-2" />
                    </div>

                    <div class="col-span-8 sm:col-span-8">
                        <InputLabel for="fname" value="First Name" />
                        <TextInput
                            id="fname"
                            v-model="form.fname"
                            type="text"
                            class="mt-1 block w-full"
                        />
                        <InputError :message="form.errors.fname" class="mt-2" />
                    </div>

                    <div class="col-span-8 sm:col-span-8">
                        <InputLabel for="lname" value="Last Name" />
                        <TextInput
                            id="lname"
                            v-model="form.lname"
                            type="text"
                            class="mt-1 block w-full"
                        />
                        <InputError :message="form.errors.lname" class="mt-2" />
                    </div>

                    <div class="col-span-8 sm:col-span-8">
                        <InputLabel for="address" value="Address" />
                        <TextInput
                            id="address"
                            v-model="form.address"
                            type="text"
                            class="mt-1 block w-full"
                        />
                        <InputError :message="form.errors.address" class="mt-2" />
                    </div>

                    <div class="col-span-8 sm:col-span-8">
                        <InputLabel for="phone" value="Phone" />
                        <TextInput
                            id="phone"
                            v-model="form.phone"
                            type="text"
                            class="mt-1 block w-full"
                        />
                        <InputError :message="form.errors.phone" class="mt-2" />
                    </div>

                    <div class="col-span-8 sm:col-span-8">
                        <InputLabel for="email" value="Email" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full"
                        />
                        <InputError :message="form.errors.email" class="mt-2" />
                    </div>

                    <div class="col-span-8 sm:col-span-8">
                        <InputLabel for="initial_loan" value="Initial Loan" />
                        <TextInput
                            id="initial_loan"
                            v-model="form.initial_loan"
                            type="text"
                            class="mt-1 block w-full"
                        />
                        <InputError :message="form.errors.initial_loan" class="mt-2" />
                    </div>

                    <div class="col-span-8 sm:col-span-8">
                        <InputLabel for="issuance_date" value="Issuance Date" />
                        <TextInput
                            id="issuance_date"
                            v-model="form.issuance_date"
                            type="date"
                            class="mt-1 block w-full"
                        />
                        <InputError :message="form.errors.issuance_date" class="mt-2" />
                    </div>
                </template>

                <template #actions>
                    <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                        Saved.
                    </ActionMessage>

                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </PrimaryButton>
                </template>
            </FormSection>
        </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

.form-field {
    margin-bottom:8px;

}
</style>
