<template>
    <div>
        <header class="sticky top-0 z-50 bg-indigo-600">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
                <div class="w-full py-3 flex items-center justify-between border-b border-indigo-500 lg:border-none">
                    <div class="flex items-center">
                        <div class="hidden space-x-8 md:block">
                            <Link v-for="link in navigation" :key="link.name" :href="link.href" class="text-base font-medium text-white hover:text-indigo-50">
                                {{ link.name }}
                            </Link>
                        </div>
                    </div>
                    <div class="ml-10 space-x-4">
                        <Link href="/logout" class="inline-block bg-indigo-500 py-2 px-4 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-75">
                            Sign out
                        </Link>
                    </div>
                </div>
                <div class="py-4 flex flex-wrap justify-center space-x-6 md:hidden">
                    <Link v-for="link in navigation" :key="link.name" :href="link.href" class="text-base font-medium text-white hover:text-indigo-50">
                        {{ link.name }}
                    </Link>
                </div>
            </nav>
            <slot name="header">
                <Head>
                    BookSelf - Books
                </Head>
            </slot>
        </header>
        <main class="relative">
            <slot />
        </main>
    </div>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3'

export default {
    components: {
        Head,
        Link
    },
    data: () => ({
        navigation: [
            {name: 'Books', href: '/books'},
        ]
    })
}
</script>
