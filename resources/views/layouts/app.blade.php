<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'myMoney') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <!-- Datepicker -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="welcomeFont antialiased" 
        x-data="{ darkMode: localStorage.getItem('dark') === 'true' }"
        x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
        x-bind:class="{'dark': darkMode}"
        x-cloak
    >
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <script>
            // Initilize flatpicker
            document.addEventListener('DOMContentLoaded', () => {
            updateTotals();

            // Initialize flatpickr
            flatpickr("#date-picker", {
                mode: "range", // allows for date range selection
                dateFormat: "Y-m-d",
                onClose: function(selectedDates, dateStr, instance) {
                    if (selectedDates.length > 0) {
                        const startDate = selectedDates[0];
                        const endDate = selectedDates[1] || startDate; // If no end date, use start date

                        // Add your filtering logic here
                        console.log(`Selected dates: ${startDate} to ${endDate}`);
                        // For example, you can make an AJAX request to fetch filtered data
                        // Or, redirect the page with selected date range as query parameters
                    }
                }
            });
        });
    </script>
</html>
