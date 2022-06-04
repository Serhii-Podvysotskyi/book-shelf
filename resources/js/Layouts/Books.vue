<template>
    <Layout>
        <template #header>
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 flex justify-between">
                    <div>Search</div>
                    <Link as="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add book
                    </Link>
                </div>
            </header>
        </template>
    </Layout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import Layout from './Default'

export default {
    components: {
        Link,
        Layout
    }
}
</script>
