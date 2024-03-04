<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: 'chesley.mraz@example.net',
    password: 'password',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="tw-mb-4 tw-font-medium tw-text-sm tw-text-green-600">
            {{ status }}
        </div>

        <!-- <v-form @submit.prevent="submit"> -->
        <v-form>
            <div>
                <InputLabel for="email" value="Email" />

                <v-text-field
                    id="email"
                    type="email"
                    class="tw-mt-1 tw-block tw-w-full"
                    v-model="form.email"
                    variant="outlined"
                    required
                    autocomplete="username"
                    :error="form.errors.email"
                    @click="form.clearErrors('email')"
                />

                <InputError class="tw-mt-2 text-red" :message="form.errors.email" />
            </div>

            <div class="tw-mt-4">
                <InputLabel for="password" value="Password" />

                <v-text-field
                    id="password"
                    type="password"
                    variant="outlined"
                    class="tw-mt-1 tw-block tw-w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    :error="form.errors.password"
                    @click="form.clearErrors('passord')"

                />

                <InputError class="tw-mt-2 text-red" :message="form.errors.password" />
            </div>

            <div class="tw-block tw-mt-4">
                <!-- <label class="tw-flex tw-items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="tw-ml-2 tw-text-sm tw-text-gray-600">Remember me</span>
                </label> -->
                <label class="tw-flex tw-items-center">
                    <span class="tw-ml-2 tw-text-sm tw-text-gray-600">
                        You don't have an account?
                        <Link
                        :href="route('register')"
                        class="tw-ml-4 tw-text-sm text-blue"
                        >Register</Link>
                    </span>
                </label>
            </div>

            <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-blue tw-underline tw-text-sm tw-text-gray-600 hover:tw-text-gray-900 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500"
                >
                    Forgot your password?
                </Link>

                <v-btn
                    color="primary"
                    class="mb-6"
                    :disabled="form.processing"
                    @click="submit"
                    >
                        Log in
                </v-btn>
            </div>
        </v-form>
    </GuestLayout>
</template>
