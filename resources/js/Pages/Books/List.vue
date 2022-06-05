<template>
    <Layout>
        <template #header>
            <Head>
                <title>
                    Bookshelf - Books
                </title>
            </Head>
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 flex justify-between">
                    <div>Search</div>
                    <Link href="/book" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add book
                    </Link>
                </div>
            </header>
        </template>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto mt-4">
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <li v-for="book in books" :key="book.id" class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200 overflow-hidden">
                        <img class="w-full flex-shrink-0 mx-auto" :src="book.image" alt=""/>
                        <div class="flex-1 flex flex-col px-4 pb-4">
                            <h3 class="mt-3 text-gray-900 text-sm font-medium">
                                {{ book.name }}
                            </h3>
                            <dl class="mt-1 flex-grow flex flex-col justify-between">
                                <dt class="sr-only">
                                    Author
                                </dt>
                                <dd class="text-gray-500 text-sm">
                                    {{ book.author }}
                                </dd>
                                <template v-if="book.genres.length">
                                    <dt class="sr-only">
                                        Genre
                                    </dt>
                                    <dd class="mt-3">
                                    <span v-for="genre in book.genres" :key="genre.id" class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">
                                        {{ genre.name }}
                                    </span>
                                    </dd>
                                </template>
                            </dl>
                        </div>
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="w-0 flex-1 flex">
                                    <Link :href="`/books/${book.id}`" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-3 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                        <span class="ml-3">
                                            Edit
                                        </span>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </Layout>
</template>

<script>
import {Link, Head} from '@inertiajs/inertia-vue3'
import Layout from '../../Layouts/Default'

export default {
    props: {
        books: Array,
    },
    components: {
        Head,
        Link,
        Layout,
    }
}
</script>
