<template>
    <div class="relative">
        <header>
            <nav>
                <div class="space-x-6">
                    <Link v-if="!$page.props.auth.user" :href="route('home')" preserve-scroll class="nav-link"
                          :class="{'bg-slate-700': $page.component === 'Home'}">Home
                    </Link>
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')" preserve-scroll class="nav-link"
                          :class="{'bg-slate-700': $page.component === 'Dashboard'}">Dashboard
                    </Link>
                </div>
                <div class="space-x-6">
                    <div v-if="$page.props.auth.user" class="flex items-center gap-2">
                        <span class="text-white">Welcome, {{ $page.props.auth.user.name }}</span>
                        <Link :href="route('logout')" method="post" as="button" type="button" preserve-scroll
                              class="nav-link">
                            Logout
                        </Link>
                    </div>

                    <div v-else class="flex items-center gap-2">
                        <Link :href="route('register')" as="button" type="button" preserve-scroll class="nav-link"
                              :class="{'bg-slate-700': $page.component === 'Auth/Register'}">
                            Register
                        </Link>
                        <Link :href="route('login')" as="button" type="button" preserve-scroll class="nav-link"
                              :class="{'bg-slate-700': $page.component === 'Auth/Login'}">
                            Login
                        </Link>
                    </div>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot/>
        </main>
    </div>

    <div class="absolute top-25 right-5">
        <FlashMessage v-if="$page.props.flash.success" type="success" :message="$page.props.flash.success"/>
    </div>
</template>

<script setup lang="ts">
import {route} from "../../../vendor/tightenco/ziggy/src/js/index.js";
import FlashMessage from "../Pages/Components/FlashMessage.vue";
</script>
