<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Elisabeth Cibot</title>

    <link rel="icon" type="image/png" href="{{ asset('/storage/admin/faviconEC1.png') }}">

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/5fc9c8ed9e.js" crossorigin="anonymous"></script>

</head>

<body class="font-sans antialiased">
    <div class="flex flex-col flex-1 h-full overflow-hidden">
        @include('partialsBack.sidebar')

        <!-- Page Heading -->
        @include('partialsBack.header')


        <!-- Page Content -->
        {{-- @include('partialsBack.settings') --}}

        <main class="my-15">
            {{ $slot }}
        </main>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script>
    const setup = () => {
        return {
            loading: true,
            isSidebarOpen: false,
            toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
            },
            isSettingsPanelOpen: false,
            isSearchBoxOpen: false,
        }
    }
</script>

</html>