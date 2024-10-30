<script setup>

//Caso eu quisesse chamar um layout específico, sobrepondo o que eu defini no meu arquivo principal padrão no javascript (app.js)
//import demo from '../Layouts/demo.vue';
//defineOptions({
//layout: demo
//});
</script>

<template>

    <Head :title="`| ${$page.component}`" />
    <h1>
        Hello, Universe!
    </h1>
</template>