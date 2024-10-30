<script setup>
//RECUPERANDO OS PROPS (PARÂMETROS) DO BACK ATRAVÉS DO defineProps
defineProps({
    user: String
})
</script>

<template>

    <Head :title="`| ${$page.component}`" />
    <h1>
        Página About {{ user }}
    </h1>
</template>