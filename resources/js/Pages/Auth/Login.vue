<template>
    <Layout>
        <template #header>
            <Head>
                BookShelf - Login
            </Head>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-200">
                Sign in to your account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-200">
                Or
                {{ ' ' }}
                <Link href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">
                    create new account
                </Link>
            </p>
        </template>

        <form class="space-y-6" @submit.prevent="submit">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Email address
                </label>
                <div class="mt-1">
                    <input v-model="form.email" :disabled="form.processing" id="email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
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
                    <input v-model="form.password" :disabled="form.processing" id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
            </div>
            <div class="flex justify-between">
                <div></div>
                <div class="flex items-center">
                    <input v-model="form.remember" :disabled="form.processing" id="remember" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>
            </div>
            <div>
                <button :disabled="form.processing" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign in
                </button>
            </div>
        </form>
    </Layout>
</template>

<script>
import {useForm, usePage} from '@inertiajs/inertia-vue3'
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
            email: null,
            password: null,
            remember: false,
        })
    }),
    methods: {
        submit() {
            this.form.transform((data) => ({
                ...data, _token: this.csrfToken
            })).post('/login')
        }
    }
}
</script>
