<script setup>
import { ref, watch } from 'vue';
import PaginationLinks from './Components/PaginationLinks.vue';
import { router } from '@inertiajs/vue3';
import { debounce } from 'lodash';
const props = defineProps({
    users: Object,
    searchTerm: String,
    can: Object
});

const search = ref(props.searchTerm);

watch(
    search,
    debounce((q) => {
        router.get("/dashboard", { search: q }, { preserveState: true });
    }, 500)
);

const getDate = (date) =>
    new Date(date).toLocaleDateString("pt-br", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>
<template>
    <div>
        <h1 class="title">Área do administrador</h1>
        <h6>Usuário(a) <strong>{{ $page.props.auth.user.name }}</strong>, bem-vindo(a)!</h6>
    </div>

    <div class="container mx-auto p-4">
        <div class="flex justify-end mb-4">
            <div class="w-1/4">
                <input type="search" placeholder="Pesquisar..." id="" v-model="search" />
            </div>

        </div>
        <div class="overflow-x-auto">
            <table class="table-auto min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-800 text-white text-left">
                        <th class="py-3 px-4"></th>
                        <th class="py-3 px-4">Nome</th>
                        <th class="py-3 px-4">E-mail</th>
                        <th class="py-3 px-4">Surgimento</th>

                        <th class="py-3 px-4"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Linha de exemplo de usuário -->
                    <tr v-for="user in users.data" :key="user.id" class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-4 px-4">
                            <img class="avatar"
                                :src="user.avatar ? ('storage/' + user.avatar) : ('storage/avatars/default-avatar.jpg')"
                                alt="Avatar">
                        </td>
                        <td class="py-4 px-4 font-semibold text-gray-700">{{ user.name }}</td>
                        <td class="py-4 px-4 text-gray-600">{{ user.email }}</td>
                        <td class="py-4 px-4 text-gray-600">{{ getDate(user.created_at) }}</td>
                        <td class="py-4 px-4 space-x-1">
                            <button
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Editar</button>
                                <button v-if="can.delete_user"
                                class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Deletar</button>
                        </td>
                    </tr>
                    <!-- Repita essa linha para outros usuários -->
                </tbody>
            </table>
        </div>
        <div>
            <PaginationLinks :paginator="users" />
        </div>
    </div>

</template>