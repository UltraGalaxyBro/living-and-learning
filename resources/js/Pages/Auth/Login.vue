<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';

const form = useForm({
    email: null,
    password: null,
    remember: null,
})

const submit = () => {
    form.post(route('login'), {
        onError: () => form.reset('password'),
    });
};

</script>

<template>

    <Head :title="` | ${$page.component}`" />
    <div>
        <h1 class="title">Fazer login</h1>
        <div class="w-2/4 mx-auto"></div>
        <form @submit.prevent="submit">
            <TextInput name="E-mail" v-model="form.email" type="email" :message="form.errors.email" />
            <TextInput name="Senha" v-model="form.password" type="password" :message="form.errors.password" />
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <label for="remember">Lembrar de mim</label>
                    <input id="remember" type="checkbox" v-model="form.remember">
                </div>
                <p class="text-slate-600 mb-2">Não possui conta? Clique
                    <Link :href="route('register')" class="text-link">aqui</Link>!
                </p>
            </div>
            <button class="primary-btn">Entrar</button>
        </form>
    </div>
</template>