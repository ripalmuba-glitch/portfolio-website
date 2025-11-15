<x-public-layout>

    <x-slot name="title">
        Home - Portfolio Profesional
    </x-slot>

    <section id="home" class="relative bg-transparent overflow-hidden">
        <div class="absolute top-0 right-0 h-full w-full lg:w-1/2 -z-0" aria-hidden="true">
            <div class="absolute inset-0 bg-gradient-to-l from-indigo-600/20 via-transparent to-transparent blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-6 lg:px-8 pt-24 pb-16 sm:pt-32 sm:pb-24 z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div class="text-center lg:text-left"
                     x-data
                     x-init="
                        new Typed('#typed-subtitle', {
                            strings: [
                                '{{ $settings['hero_subtitle'] ?? 'I am a Web Developer' }}'
                            ],
                            typeSpeed: 50,
                            backSpeed: 30,
                            loop: true,
                            backDelay: 1500,
                            showCursor: true,
                            cursorChar: '|',
                        });
                     "
                >
                    <p data-aos="fade-right" data-aos-delay="100" class="text-lg font-medium text-teal-300 tracking-wide">
                        Hi, my name is
                    </p>
                    <h1 data-aos="fade-right" data-aos-delay="200" class="mt-2 text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-100 leading-tight">
                        {{ $settings['hero_title'] ?? '[Nama Anda].' }}
                    </h1>
                    <h2 data-aos="fade-right" data-aos-delay="300" class="mt-2 text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-400 min-h-[48px] lg:min-h-[60px]">
                        <span id="typed-subtitle"></span>
                    </h2>

                    <p data-aos="fade-right" data-aos-delay="400" class="mt-6 text-lg text-gray-400 max-w-lg mx-auto lg:mx-0">
                        {{ $settings['hero_description'] ?? 'Saya seorang developer...' }}
                    </p>

                    <div data-aos="fade-right" data-aos-delay="500" class="mt-10">
                        <a href="#projects" class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-lg hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1">
                            Lihat Proyek Saya
                        </a>
                    </div>
                </div>

                <div class="mt-12 lg:mt-0" data-aos="fade-left" data-aos-delay="300">
                    <div class="relative p-2 bg-gradient-to-br from-indigo-500/50 to-purple-500/50 rounded-3xl shadow-2xl">
                        <img src="{{ isset($settings['hero_photo_path']) ? Storage::url($settings['hero_photo_path']) : asset('images/my-photo.png') }}"
                             alt="Foto Profesional [Nama Anda]"
                             class="relative w-full h-auto object-cover rounded-2xl">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="stats" class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center" data-aos="fade-up">
            <div class="md:border-r md:border-gray-700">
                <h3 class="text-4xl font-bold text-indigo-400">{{ $settings['stat_1_number'] ?? '1+' }}</h3>
                <p class="mt-2 text-base font-medium text-gray-400">{{ $settings['stat_1_text'] ?? 'Tahun Pengalaman' }}</p>
            </div>

            <div class="md:border-r md:border-gray-700">
                <h3 class="text-4xl font-bold text-indigo-400">{{ $settings['stat_2_number'] ?? '10+' }}</h3>
                <p class="mt-2 text-base font-medium text-gray-400">{{ $settings['stat_2_text'] ?? 'Proyek Selesai' }}</p>
            </div>

            <div>
                <h3 class="text-4xl font-bold text-indigo-400">{{ $settings['stat_3_number'] ?? '5+' }}</h3>
                <p class="mt-2 text-base font-medium text-gray-400">{{ $settings['stat_3_text'] ?? 'Klien Puas' }}</p>
            </div>
        </div>
    </section>

    <section id="about" class="bg-[#112240] py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-8" data-aos="fade-up">
            <h2 class="section-title">About Me</h2>
            <p class="section-subtitle">
                Sedikit tentang latar belakang dan keahlian yang saya miliki.
            </p>

            <div class="mt-16 grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                <div class="space-y-4 text-gray-300 text-lg">
                    {!! nl2br(e($settings['about_text'] ?? 'Paragraf tentang Anda...')) !!}
                </div>

                <div class="mt-8 lg:mt-0">
                    <h3 class="text-2xl font-semibold text-white mb-4">Teknologi yang Saya Kuasai:</h3>
                    <div class="flex flex-wrap gap-3">
                        @php
                            $skills = explode(',', $settings['tech_skills'] ?? 'Laravel,PHP');
                        @endphp

                        @foreach ($skills as $skill)
                            <span class="tech-skill">{{ trim($skill) }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="bg-transparent py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-8" data-aos="fade-up">
            <h2 class="section-title">My Services</h2>
            <p class="section-subtitle">
                Layanan yang saya tawarkan untuk membantu mewujudkan ide Anda.
            </p>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($services as $service)
                    <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                        <div class="text-indigo-400 mb-4">
                            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>

                        <h3 class="text-2xl font-bold text-white mb-3">{{ $service->name }}</h3>
                        <p class="text-gray-300">
                            {{ $service->description }}
                        </p>
                    </div>
                @empty
                    <div class="md:col-span-2 lg:col-span-3 text-center text-gray-400">
                        Belum ada jasa yang ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="projects" class="bg-[#112240] py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-8" data-aos="fade-up">
            <h2 class="section-title">My Projects</h2>
            <p class="section-subtitle">
                Beberapa proyek pilihan yang telah saya kerjakan.
            </p>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($projects as $project)
                    <div class="project-card group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <a href="{{ $project->project_url ?? '#' }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}"
                                 class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">
                        </a>

                        <div class="p-6">
                            <span class="inline-block px-3 py-1 text-xs font-semibold text-teal-300 bg-teal-800/50 rounded-full mb-3">
                                {{ $project->category }}
                            </span>
                            <h3 class="text-2xl font-bold text-white mb-3">{{ $project->title }}</h3>
                            <p class="text-gray-300 mb-6 text-sm">
                                {{ Str::limit($project->description, 120, '...') }}
                            </p>

                            <div class="flex space-x-6">
                                @if($project->project_url)
                                    <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="project-link">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                        <span>Live Demo</span>
                                    </a>
                                @endif

                                @if($project->shopee_url)
                                    <a href="{{ $project->shopee_url }}" target="_blank" rel="noopener noreferrer" class="project-link">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.2 6.2H17.4V4.5c0-.9-.7-1.6-1.6-1.6h-7.6c-.9 0-1.6.7-1.6 1.6v1.7H3.8c-.9 0-1.6.7-1.6 1.6v11.4c0 .9.7 1.6 1.6 1.6h16.4c.9 0 1.6-.7 1.6-1.6V7.8c0-.9-.7-1.6-1.6-1.6zM9.9 4.5h4.2v1.7H9.9V4.5zm8.7 14.7H5.4c-.3 0-.5-.2-.5-.4V9.6h14.2v9.2c0 .2-.2.4-.5.4zM12 10.3c-2.3 0-4.2 1.9-4.2 4.2s1.9 4.2 4.2 4.2 4.2-1.9 4.2-4.2-1.9-4.2-4.2-4.2zm0 6.7c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5z"/></svg>
                                        <span>Shopee</span>
                                    </a>
                                @endif
                                </div>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-2 lg:col-span-3 text-center text-gray-400">
                        Belum ada proyek yang ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="contact" class="bg-transparent py-24 sm:py-32">
        <div class="max-w-7xl mx-auto px-6 lg:px-8" data-aos="fade-up">
            <h2 class="section-title">Contact Me</h2>
            <p class="section-subtitle">
                Punya pertanyaan atau proyek? Jangan ragu untuk menghubungi saya.
            </p>

            <div class="mt-16 max-w-2xl mx-auto">

                @if (session('success'))
                    <div class="bg-teal-500/10 text-teal-300 p-4 rounded-lg shadow-md mb-6"
                         x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" x-transition>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="mt-1 block w-full bg-[#112240] border-gray-700 text-gray-200 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('name')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                   class="mt-1 block w-full bg-[#112240] border-gray-700 text-gray-200 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('email')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="subject" class="block text-sm font-medium text-gray-300">Subjek</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                                   class="mt-1 block w-full bg-[#112240] border-gray-700 text-gray-200 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('subject')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="block text-sm font-medium text-gray-300">Pesan</label>
                            <textarea name="message" id="message" rows="5" required
                                      class="mt-1 block w-full bg-[#112240] border-gray-700 text-gray-200 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <button type="submit" class="px-10 py-3 text-base font-semibold text-white bg-indigo-600 rounded-lg shadow-lg hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer class="bg-transparent py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">

            <div class="flex justify-center flex-wrap gap-6 mb-8">

                @if(!empty($settings['social_whatsapp']))
                    <a href="https://wa.me/{{ $settings['social_whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="WhatsApp">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.433-9.89-9.889-9.89-5.455 0-9.887 4.434-9.889 9.89-.001 2.225.651 4.315 1.907 6.03l-.351 1.291z"/></svg>
                    </a>
                @endif

                @if(!empty($settings['social_instagram']))
                    <a href="{{ $settings['social_instagram'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="Instagram">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                @endif

                @if(!empty($settings['social_facebook']))
                    <a href="{{ $settings['social_facebook'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="Facebook">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                    </a>
                @endif

                @if(!empty($settings['social_tiktok']))
                    <a href="{{ $settings['social_tiktok'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="TikTok">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-2.1.04-4.14-.6-5.73-2.04-2.83-2.5-3.87-6.27-2.94-9.8.7-2.6 2.6-4.7 4.9-5.9 2.2-1.1 4.7-1.2 7.1-1.1.02 1.54-.01 3.08-.01 4.61-.99-.16-1.93-.42-2.8-.81-1.39-.61-2.03-2.13-2.02-3.64.01-1.55.72-2.9 2-3.75 1.25-.8 2.76-1.1 4.27-1.1z"/></svg>
                    </a>
                @endif

                @if(!empty($settings['social_github']))
                    <a href="{{ $settings['social_github'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="GitHub">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.03-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.026 2.747-1.026.546 1.379.202 2.398.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.852 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                    </a>
                @endif

                @if(!empty($settings['social_linkedin']))
                    <a href="{{ $settings['social_linkedin'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="LinkedIn">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                @endif

                @if(!empty($settings['social_twitter']))
                    <a href="{{ $settings['social_twitter'] }}" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="X (Twitter)">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                @endif

            </div>

            <p class="text-gray-500 text-sm">
                Didesain & Dibangun oleh [Nama Anda]
            </p>
            <p class="text-gray-500 text-sm mt-1">
                © {{ date('Y') }} All rights reserved.
            </p>
        </div>
    </footer>

</x-public-layout>
