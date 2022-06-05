<template>
    <Layout>
        <template #header>
            <Head>
                <title>
                    Bookshelf - Book
                </title>
            </Head>
        </template>

        <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <form class="bg-white shadow overflow-hidden sm:rounded-lg" @submit.prevent="submit">
                    <div class="px-4 pt-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            New Book
                        </h3>
                    </div>
                    <div class="px-4 pb-4 sm:mt-5 space-y-6 sm:space-y-5 sm:border-t sm:border-gray-200">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input v-model="form.name" type="text" name="name" id="name" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"/>
                                <p class="mt-2 text-sm text-red-400" v-if="form.errors.name">
                                    {{ form.errors.name }}
                                </p>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Author
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input v-model="form.author" type="text" name="author" id="author" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"/>
                                <p class="mt-2 text-sm text-red-400" v-if="form.errors.author">
                                    {{ form.errors.author }}
                                </p>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="year" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Year
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input v-model="form.year" type="number" min="0" max="2025" name="year" id="year" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"/>
                                <p class="mt-2 text-sm text-red-400" v-if="form.errors.year">
                                    {{ form.errors.year }}
                                </p>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Genres
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select v-model="form.genres" id="genres" name="genres" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md">
                                    <option v-for="genre in genres" :key="genre.id" :value="genre.id">
                                        {{ genre.name }}
                                    </option>
                                </select>
                                <p class="mt-2 text-sm text-red-400" v-if="form.errors.genres">
                                    {{ form.errors.genres }}
                                </p>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Description
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea v-model="form.description" id="description" name="description" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"/>
                                <p class="mt-2 text-sm text-red-400" v-if="form.errors.description">
                                    {{ form.errors.description }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="px-4 pb-4 space-y-6 sm:space-y-5 sm:border-t sm:border-gray-200">
                        <div class="sm:pt-3">
                            <div class="flex justify-end">
                                <Link href="/books" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
                                </Link>
                                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>

<script>
import {Head, Link, useForm, usePage} from '@inertiajs/inertia-vue3'
import Layout from '../../Layouts/Default'

export default {
    components: {
        Head,
        Link,
        Layout,
    },
    props: {
        countries: Array,
        genres: Array,
    },
    computed: {
        csrfToken: () => usePage().props.value.csrf_token
    },
    data: () => ({
        form: useForm({
            name: null,
            author: null,
            year: null,
            genres: null,
            description: null
        })
    }),
    methods: {
        submit() {
            this.form.transform((data) => ({
                ...data, _token: this.csrfToken
            })).post('/book')
        }
    }
}
</script>
