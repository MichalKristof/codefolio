<template>
    <Head :title="` | ${$page.component}`"/>
    <h1 class="title">Register</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label>Name</label>
                <input v-model="form.name" type="text" name="name"/>
                <small v-if="form.errors.name">{{ form.errors.name }}</small>
            </div>
            <div class="mb-6">
                <label>email</label>
                <input v-model="form.email" type="text" name="email"/>
                <small v-if="form.errors.email">{{ form.errors.email }}</small>
            </div>
            <div class="mb-6">
                <label>Password</label>
                <input v-model="form.password" type="password" name="password"/>
                <small v-if="form.errors.password">{{ form.errors.password }}</small>
            </div>
            <div class="mb-6">
                <label>Confirm Password</label>
                <input v-model="form.password_confirmation" type="password" name="password_confirmation"/>
            </div>
            <div>
                <p class="text-slate-600 mb-2">Already a user ? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">
                    Register
                </button>
            </div>
        </form>
    </div>
</template>

<script setup lang="ts">
import {reactive} from "vue";
import {useForm} from '@inertiajs/vue3';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
})

const submit = () => {
    form.post("/register", {
        onSuccess: () => {
            form.reset();
        },
        onError: () => {
            form.reset('password', 'password_confirmation');
        }
    });
}
</script>

<style lang="scss" scoped>

</style>
