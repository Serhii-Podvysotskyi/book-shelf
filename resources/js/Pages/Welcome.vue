<template>
    <div class="relative overflow-hidden">
        <Head>
            <title>
                BookShelf - Welcome
            </title>
        </Head>
        <Popover as="header" class="relative">
            <div class="bg-gray-900 pt-6">
                <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-between w-full md:w-auto">
                            <div class="-mr-2 flex items-center md:hidden">
                                <PopoverButton class="bg-gray-900 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white">
                                    <span class="sr-only">
                                        Open main menu
                                    </span>
                                    <MenuIcon class="h-6 w-6" aria-hidden="true" />
                                </PopoverButton>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:flex md:items-center md:space-x-6">
                        <Link href="/login" class="text-base font-medium text-white hover:text-gray-300">
                            Log in
                        </Link>
                        <Link href="/register" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                            Create account
                        </Link>
                    </div>
                </nav>
            </div>
            <transition enter-active-class="duration-150 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
                <PopoverPanel focus class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top md:hidden">
                    <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="px-5 pt-4 flex items-center justify-between">
                            <div class="-mr-2">
                                <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                                    <span class="sr-only">Close menu</span>
                                    <XIcon class="h-6 w-6" aria-hidden="true" />
                                </PopoverButton>
                            </div>
                        </div>
                        <div class="pt-5 pb-6">
                            <div class="mt-6 px-5">
                                <Link href="/login" class="block text-center w-full py-3 px-4 rounded-md shadow bg-indigo-600 text-white font-medium hover:bg-indigo-700">
                                    Create account
                                </Link>
                            </div>
                            <div class="mt-6 px-5">
                                <p class="text-center text-base font-medium text-gray-500">
                                    Already have account? <Link href="/register" class="text-gray-900 hover:underline">Login</Link>
                                </p>
                            </div>
                        </div>
                    </div>
                </PopoverPanel>
            </transition>
        </Popover>
        <main class="h-full">
            <div class="pt-10 bg-gray-900 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
                <div class="mx-auto max-w-7xl lg:px-8">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                        <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                            <div class="lg:py-24">
                                <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                                    <span class="block uppercase">
                                        Book
                                    </span>
                                    <span class="block text-indigo-400 uppercase">
                                        Shelf
                                    </span>
                                </h1>
                                <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                                    Best way to store and organize your book library
                                </p>
                                <div class="mt-10 sm:mt-12">
                                    <Link href="/demo" as="button" class="block w-full py-3 px-4 rounded-md shadow bg-indigo-500 text-white font-medium hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-300 focus:ring-offset-gray-900">
                                        Demo
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 -mb-16 sm:-mb-48 lg:m-0 lg:relative">
                            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
                                <img class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="/img/book.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
import { Link, Head } from '@inertiajs/inertia-vue3'
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
import { MenuIcon, XIcon } from '@heroicons/vue/outline'
import { ChevronRightIcon } from '@heroicons/vue/solid'

export default {
    components: {
        Link,
        Head,
        Popover,
        PopoverButton,
        PopoverPanel,
        MenuIcon,
        XIcon,
        ChevronRightIcon
    }
}
</script>
