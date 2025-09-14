<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6 border-b">
                <h1 class="text-xl font-bold text-emerald-600">Chaplaincy Admin</h1>
            </div>
            <nav class="p-4 space-y-2 text-gray-700">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center p-2 rounded-md
                          {{ request()->routeIs('dashboard') ? 'bg-emerald-50 text-emerald-700 font-medium' : 'hover:bg-gray-100' }}">
                    Dashboard
                </a>
                <a href="{{ route('members.index') }}"
                   class="block p-2 rounded-md
                          {{ request()->routeIs('members.*') ? 'bg-emerald-50 text-emerald-700 font-medium' : 'hover:bg-gray-100' }}">
                    Members
                </a>

                <a href="#" class="block p-2 rounded-md hover:bg-gray-100">Settings</a>
                <a href="{{ url('/') }}" class="block p-2 rounded-md hover:bg-gray-100 text-emerald-600 font-semibold">&larr; Home</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <!-- Top Bar -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
            </div>

            <!-- Print Button -->
            <div class="flex justify-end mb-4">
                <button onclick="printStats()" class="px-5 py-2 bg-emerald-600 text-white rounded-lg font-semibold shadow hover:bg-emerald-700 transition print:hidden">
                    🖨 Print Stats
                </button>
            </div>
            <!-- Stats Cards -->
            <div id="statsSection" class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center">
                    <p class="text-sm text-gray-500">Members</p>
                    <p class="text-4xl font-extrabold text-emerald-700">
                        {{ \App\Models\Member::count() }}
                    </p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center">
                    <p class="text-sm text-gray-500">Events</p>
                    <p class="text-4xl font-extrabold text-blue-600">
                        0
                    </p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center">
                    <p class="text-sm text-gray-500">Ministries</p>
                    <p class="text-4xl font-extrabold text-purple-600">
                        0
                    </p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center">
                    <p class="text-sm text-gray-500">Gallery</p>
                    <p class="text-4xl font-extrabold text-pink-600">
                        0
                    </p>
                </div>
            </div>
            <style>
                @media print {
                    body * { visibility: hidden !important; }
                    #statsSection, #statsSection * { visibility: visible !important; }
                    #statsSection { position: absolute; left: 0; top: 0; width: 100vw; margin: 0; padding: 0; }
                }
            </style>
            <script>
                function printStats() {
                    window.print();
                }
            </script>
        </main>
    </div>
</x-app-layout>
