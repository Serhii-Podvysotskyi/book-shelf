<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
    <title>@yield('title')</title>
</head>
<body class="h-full bg-gray-900">
<div class="min-h-full px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
    <div class="max-w-max mx-auto">
        <main class="sm:flex">
            <p class="text-4xl font-extrabold text-indigo-600 sm:text-5xl">
                @yield('code')
            </p>
            <div class="sm:ml-6">
                <div class="sm:border-l sm:border-gray-200 sm:pl-6">
                    <h1 class="text-4xl font-extrabold text-gray-200 tracking-tight sm:text-5xl">
                        @yield('message')
                    </h1>
                    <p class="mt-1 text-base text-gray-500">
                        Please check the URL in the address bar and try again.
                    </p>
                </div>
                <div class="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                    <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Go back home
                    </a>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
