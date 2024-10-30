<script setup>
</script>

<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link" :class="{ 'bg-slate-700': $page.component === 'Home' }">
                    Home</Link>
                </div>
                <div v-if="$page.props.auth.user" class="space-x-6 flex">
                    <img class="avatar" :src="$page.props.auth.user.avatar ? ('storage/' + $page.props.auth.user.avatar) : ('storage/avatars/default-avatar.jpg')" alt="Seu avatar">
                    <Link :href="route('dashboard')" class="nav-link"
                        :class="{ 'bg-slate-700': $page.component === 'Dashboard' }">Admin</Link>
                    <Link :href="route('logout')" class="nav-link" method="post" as="button" type="button">Sair</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link class="nav-link" :href="route('register')"
                        :class="{ 'bg-slate-700': $page.component === 'Auth/Register' }">Register</Link>
                    <Link class="nav-link" :href="route('login')"
                        :class="{ 'bg-slate-700': $page.component === 'Auth/Login' }">Login</Link>
                </div>
            </nav>
        </header>
        <main>
            <slot />
        </main>
    </div>
</template>