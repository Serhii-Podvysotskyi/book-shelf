<template>
    <Layout>
        <template #header>
            <Head>
                BookShelf - Register
            </Head>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-200">
                Create new account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-200">
                Or
                {{ ' ' }}
                <Link href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                    already have account
                </Link>
            </p>
        </template>

        <form class="space-y-6" @submit.prevent="submit">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Username
                </label>
                <div class="mt-1">
                    <input v-model="form.name" id="name" name="name" type="text" autocomplete="nickname" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    <p class="mt-2 text-sm text-red-400" v-if="form.errors.name">
                        {{ form.errors.name }}
                    </p>
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Email address
                </label>
                <div class="mt-1">
                    <input v-model="form.email" id="email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    <p class="mt-2 text-sm text-red-400" v-if="form.errors.email">
                        {{ form.errors.email }}
                    </p>
                </div>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <div class="mt-1">
                    <input v-model="form.password" id="password" name="password" type="password" autocomplete="new-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    <p class="mt-2 text-sm text-red-400" v-if="form.errors.password">
                        {{ form.errors.password }}
                    </p>
                </div>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Password confirmation
                </label>
                <div class="mt-1">
                    <input v-model="form.password_confirmation" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    <p class="mt-2 text-sm text-red-400" v-if="form.errors.password_confirmation">
                        {{ form.errors.password_confirmation }}
                    </p>
                </div>
            </div>
            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create account
                </button>
            </div>
        </form>
    </Layout>
</template>

<script>
import { useForm, usePage } from '@inertiajs/inertia-vue3'
import { Link, Head } from '@inertiajs/inertia-vue3'
import Layout from '../../Layouts/Auth'

export default {
    components: {
        Link, Head, Layout
    },
    computed: {
        csrfToken: () => usePage().props.value.csrf_token
    },
    data: () => ({
        form: useForm({
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        })
    }),
    methods: {
        submit() {
            this.form.transform((data) => ({
                ...data, _token: this.csrfToken
            })).post('/register')
        }
    }
}
</script>
