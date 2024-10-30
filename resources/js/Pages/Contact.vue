<script setup>
defineProps({
    email: String
})
</script>

<template>
    <Head :title="`| ${$page.component}`" />
    <h1>
        Página Contact que usa o e-mail {{ email }}
    </h1>
</template>