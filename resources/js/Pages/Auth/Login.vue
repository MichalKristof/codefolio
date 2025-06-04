<template>

    <Head :title="` | ${$page.component}`"/>
    <h1 class="title">Login</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput name="email" v-model="form.email" type="email" :message="form.errors.email"/>
            <TextInput name="password" v-model="form.password" type="password" :message="form.errors.password"/>

            <div class="flex justify-between items-center mb-2">
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" v-model="form.remember">
                    <label for="remember">Remember me</label>
                </div>
                <p class="text-slate-600">Not a user ?
                    <Link :href="route('register')" class="text-link">Register</Link>
                </p>
            </div>
            <div>
                <button type="submit" class="primary-btn" :disabled="form.processing">
                    Login
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3';
import TextInput from "../Components/TextInput.vue";

const form = useForm({
    email: null,
    password: null,
    remember: false,
})

const submit = () => {
    form.post(route('login'), {
        onSuccess: () => {
            form.reset();
        },
        onError: () => {
            form.reset('password', 'remember');
        }
    });
}

</script>

<style lang="scss" scoped>

</style>
