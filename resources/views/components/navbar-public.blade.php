<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-[#0a192f]/80 dark:bg-[#0a192f]/80 backdrop-blur-sm shadow-md shadow-black/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">

            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-400">
                    MyPortfolio
                </a>
            </div>

            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-10">
                <a href="#home" class="nav-link nav-link-active">Home</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#services" class="nav-link">Services</a>
                <a href="#projects" class="nav-link">Projects</a>
            </div>

            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <a href="#contact" class="px-5 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                    Contact
                </a>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-300 hover:bg-gray-800 focus:outline-none">
                    <span class="sr-only">Buka menu</span>
                    <svg :class="{ 'hidden': open, 'block': !open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg :class="{ 'block': open, 'hidden': !open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open"
         x-transition
         class="sm:hidden"
         @click.away="open = false"
         x-cloak>
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#home" class="nav-link-mobile" @click="open = false">Home</a>
            <a href="#about" class="nav-link-mobile" @click="open = false">About</a>
            <a href="#services" class="nav-link-mobile" @click="open = false">Services</a>
            <a href="#projects" class="nav-link-mobile" @click="open = false">Projects</a>
            <a href="#contact" class="nav-link-mobile" @click="open = false">Contact</a>
        </div>

        </div>
</nav>
