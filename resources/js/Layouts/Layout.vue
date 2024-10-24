<script setup>
import { Link, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <meta head-key="description" name="description" content="Meu app com Laravel, Inertia e Vue" />
    </Head>
    <div>
        <header class="bg-rose-950 text-white">
            <nav class="flex items-center justify-between p-4 max-w-screen-lg">
                <div>
                    <Link class="m-4" href="/">Home</Link>
                    <Link class="m-4" href="/about">About</Link>
                    <Link class="m-4" href="/contact">Contact</Link>
                </div>
            </nav>
        </header>
        <main>
            <slot />
        </main>
    </div>
</template>