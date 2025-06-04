<template>
    <transition-group
        tag="div"
        enter-from-class="translate-x-full opacity-0"
        enter-active-class="duration-500 ease-out"
        leave-active-class="duration-500 ease-in"
        enter-to-class="translate-x-0 opacity-100"
    >
        <div class="rounded-md border border-gray-300 bg-white p-4 shadow-sm">
            <div class="flex items-start gap-4">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    :class="['size-6', iconColorClass]"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>

                <div class="flex-1">
                    <p class="mt-0.5 text-sm text-gray-700">{{ $props.message }}</p>
                </div>
            </div>
        </div>
    </transition-group>
</template>

<script setup>
import {computed} from "vue";

const props = defineProps({
    type: {
        type: String,
        default: 'success',
        validator: (value) => ['success', 'error', 'info', 'warning'].includes(value),
    },
    message: {
        type: String,
        default: null,
    },
})

const iconColorClass = computed(() => {
    switch (props.type) {
        case 'success':
            return 'text-green-600';
        case 'error':
            return 'text-red-600';
        case 'info':
            return 'text-blue-600';
        case 'warning':
            return 'text-yellow-500';
        default:
            return 'text-blue-500';
    }
});
</script>

<style lang="scss" scoped>

</style>
