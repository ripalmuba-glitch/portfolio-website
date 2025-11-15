<x-admin-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-6" data-aos="fade-up">
            <div class="flex-shrink-0 p-4 bg-indigo-500 rounded-full text-white">
                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Proyek</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalProjects }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-6" data-aos="fade-up" data-aos-delay="100">
            <div class="flex-shrink-0 p-4 bg-sky-500 rounded-full text-white">
                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m16 11.25V12A2.25 2.25 0 0018.75 9.75h-1.5A2.25 2.25 0 0015 12v6.75m-9 0V12A2.25 2.25 0 018.25 9.75h1.5A2.25 2.25 0 0112 12v6.75"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Jasa</p>
                <p class="text-3xl font-bold text-gray-900">{{ $totalServices }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-6" data-aos="fade-up" data-aos-delay="200">
            <div class="flex-shrink-0 p-4 bg-emerald-500 rounded-full text-white">
                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Pesan Masuk</p>
                <p class="text-3xl font-bold text-gray-900">0</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center space-x-6" data-aos="fade-up" data-aos-delay="300">
            <div class="flex-shrink-0 p-4 bg-rose-500 rounded-full text-white">
                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 016-6h6a6 6 0 016 6v1h-3M15 21a3 3 0 01-3-3V6a3 3 0 013-3h6a3 3 0 013 3v12a3 3 0 01-3 3h-6z"/></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Klien</p>
                <p class="text-3xl font-bold text-gray-900">0</p>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">

        <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="400">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Statistik Konten</h3>
            <div x-data="{
                    labels: ['Proyek', 'Jasa', 'Klien', 'Pesan'],
                    data: [{{ $totalProjects }}, {{ $totalServices }}, 0, 0],
                    init() {
                        new Chart(this.$refs.chart, {
                            type: 'bar',
                            data: {
                                labels: this.labels,
                                datasets: [{
                                    label: 'Total Konten',
                                    data: this.data,
                                    backgroundColor: [
                                        'rgba(79, 70, 229, 0.7)',
                                        'rgba(14, 165, 233, 0.7)',
                                        'rgba(220, 38, 38, 0.7)',
                                        'rgba(16, 185, 129, 0.7)',
                                    ],
                                    borderColor: [
                                        'rgba(79, 70, 229, 1)',
                                        'rgba(14, 165, 233, 1)',
                                        'rgba(220, 38, 38, 1)',
                                        'rgba(16, 185, 129, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
                            }
                        });
                    }
                }"
            >
                <canvas x-ref="chart"></canvas>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="500">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Proyek Terbaru</h3>
            <div class="overflow-x-auto">
                <table class="w-full min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Proyek
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentProjects as $project)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $project->title }}
                                </th>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs font-medium rounded-full">
                                        {{ $project->category }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                                    Belum ada proyek.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin-layout>
