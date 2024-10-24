<script setup>
defineProps({
    email: String
})
</script>

<template>
    <Head title="| Contact" />
    <h1>
        Página Contact que usa o e-mail {{ email }}
    </h1>
</template>