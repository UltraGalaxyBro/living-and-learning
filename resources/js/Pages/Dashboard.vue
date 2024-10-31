<script setup>
import PaginationLinks from './Components/PaginationLinks.vue';
defineProps({
    users: Object
})

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
        <h6>Bem-vindo(a), <strong>{{ $page.props.auth.user.name }}</strong>.</h6>
    </div>

    <div class="container mx-auto p-4">
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
                        <td class="py-4 px-4">
                            <button
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Editar</button>
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