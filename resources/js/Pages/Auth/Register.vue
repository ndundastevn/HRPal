<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <v-form>
            <div class="tw-mt-4">
                <InputLabel for="email" value="Email" />

                <v-text-field
                    id="email"
                    type="email"
                    class="tw-mt-1 tw-block tw-w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                    variant="outlined"
                    :error="form.errors.email"
                    @click="form.clearErrors('email')"
                />

                <InputError class="text-red" :message="form.errors.email" />
            </div>

            <div class="tw-mt-2">
                <InputLabel for="password" value="Password" />

                <v-text-field
                    id="password"
                    type="password"
                    class="tw-block tw-w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                    variant="outlined"
                    :error="form.errors.password"
                    @click="form.clearErrors('password')"
                />

                <InputError class="text-red" :message="form.errors.password" />
            </div>

            <div class="tw-mt-2">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <v-text-field
                    id="password_confirmation"
                    type="password"
                    class="tw-mt-1 tw-block tw-w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                    variant="outlined"
                    :error="form.errors.password_confirmation"
                    @click="form.clearErrors('password_confirmation')"
                />

                <InputError class="text-red" :message="form.errors.password_confirmation" />
            </div>

            <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                <Link
                    :href="route('login')"
                    class="tw-underline tw-text-sm text-blue hover:tw-text-gray-900 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500"
                >
                    Already registered? Login
                </Link>

                <v-btn
                    color="primary"
                    class="mb-6 ml-4"
                    :disabled="form.processing"
                    @click="submit"
                    >
                        Register
                </v-btn>
            </div>
        </v-form>
    </GuestLayout>
</template>
