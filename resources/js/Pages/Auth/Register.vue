<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    preview: null,
})
//CAPTURANDO UM ARQUIVO DO INPUT
const change = (e) => {
    form.avatar = e.target.files[0];
    form.preview = URL.createObjectURL(e.target.files[0]);
};

const submit = () => {
    form.post(route('register'), {
        onError: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>

    <Head :title="` | ${$page.component}`" />
    <div>
        <h1 class="title">Crie uma conta</h1>
        <div class="w-2/4 mx-auto"></div>
        <div class="flex flex-col items-center">
            <label for="avatar" class="mb-2 text-lg font-semibold">Sua foto</label>
            <input type="file" id="avatar" @input="change" class="mb-4 border border-gray-300 rounded-lg" />

            <div
                class="relative w-32 h-32 border border-gray-300 rounded-lg overflow-hidden flex items-center justify-center">
                <img :src="form.preview ?? 'storage/avatars/default-avatar.jpg'" alt="Preview da imagem" class="object-cover w-full h-full" />
                
            </div>

            <small class="text-red-500" v-if="form.errors.avatar">{{ form.errors.avatar }}</small>
        </div>

        <form @submit.prevent="submit">
            <TextInput name="Nome" v-model="form.name" :message="form.errors.name" />
            <TextInput name="E-mail" v-model="form.email" type="email" :message="form.errors.email" />

            <TextInput name="Senha" v-model="form.password" type="password" :message="form.errors.password" />

            <TextInput name="Confirmar Senha" v-model="form.password_confirmation" type="password" />
            <div>
                <p class="text-slate-600 mb-2">Já é um usuário? Clique
                    <Link :href="route('login')" class="text-link">aqui</Link>!
                </p>
                <button class="primary-btn">Criar</button>
            </div>
        </form>
    </div>
</template>