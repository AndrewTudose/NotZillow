<template>
    <div>
        <div>
            Index Page
        </div>
        <Link href="/hello"> Show page vue</Link>
        <div>
            The message is {{ message }}
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({
    message: String
})
</script>

<!-- <script> | example if needed in some scripts
import MainLayout from '../../Layouts/MainLayout.vue';
export default {
    layout: MainLayout
}
</script> -->