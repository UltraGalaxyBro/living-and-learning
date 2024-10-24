<template>
    <div>
        <header class="bg-indigo-500 text-white">
            <nav class="flex items-center justify-between p-4 max-w-screen-lg">
                <div>
                    <a class="m-4" href="/">Home</a>
                    <a class="m-4" href="/about">About</a>
                    <a class="m-4" href="/contact">Contact</a>
                </div>
            </nav>
        </header>
        <main>
            <slot />
        </main>
    </div>
</template>