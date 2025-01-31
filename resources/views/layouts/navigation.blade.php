<nav x-data="{ open: false }" class="bg-white sticky top-0 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 z-30">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex gap-2 xl:gap-4 items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 xl:w-12 xl:h-12" viewBox="0 0 55 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.2104 29.7684C15.6891 35.5154 22.9637 36.9521 27.1661 36.9521C-1.0915 49.7957 54.9889 50.0134 54.3368 41.959C53.8151 35.5154 46.5841 35.9362 43.0338 36.9521C42.686 31.9018 39.8457 28.7525 38.4691 27.8092C36.2954 25.4147 25.8619 22.5847 20.2104 29.7684Z" fill="#0CA0F3"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6483 4.09503C13.0849 1.64866 15.791 0 18.8925 0C23.498 0 27.2316 3.63528 27.2316 8.11962C27.2316 8.71189 27.1665 9.28934 27.0428 9.84557C29.162 12.2831 30.0806 15.7093 29.2086 19.0537C27.8152 24.3978 22.3294 27.6922 16.9852 26.2987L7.55022 23.8387C2.15545 22.432 -1.07758 16.9184 0.329039 11.5237C1.64914 6.46071 6.58657 3.30175 11.6483 4.09503ZM24.1258 7.54707C23.4873 7.21646 22.803 6.95133 22.079 6.76255L14.8546 4.87888C15.8207 3.77448 17.2711 3.07227 18.8926 3.07227C21.5993 3.07227 23.8292 5.02908 24.1258 7.54707Z" fill="#FCF6F6"/>
                            <path d="M27.8899 19.3116C26.395 24.7978 26.1343 27.625 21.2652 26.3339C18.7657 25.6711 17.1369 23.0422 19.1119 15.8004C21.2652 9.65579 23.1135 8.33466 25.613 8.99743C31.84 9.65577 28.9872 13.6059 27.8899 19.3116Z" fill="black"/>
                            <path d="M31.1724 40.0071C35.9062 22.5413 24.3587 25.4891 19.7684 24.31V20.9937V16.7931C34.6152 19.0039 32.0331 25.1943 41.5006 40.0071H31.1724Z" fill="#0CA0F3" stroke="#040404"/>
                         </svg>
                    </a>
                </div>

                <!-- search user input -->
                <div>
                    <x-search-input-result />
                </div>
            </div>

            @guest
                <div class="flex gap-2 xl:gap-3 sm:items-center sm:ms-6">
                   <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white text-xs sm:text-sm lg:text-base font-bold px-2 py-1 sm:px-3 rounded-lg duration-300 ease-in-out">Login</a>
                   <a href="{{ route('register') }}" class="bg-gray-700 hover:bg-gray-600 text-white text-xs sm:text-sm lg:text-base font-bold py-1 px-2 sm:px-3 rounded-lg duration-300 ease-in-out">Register</a }}"></a>
                </div>
            @endguest

            @auth
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:gap-10 sm:ms-6 hover:bg-gray-600 duration-300 ease-in-out sm:px-2 xl:px-3 py-1 rounded-lg">
                    {{-- foto dan username dan juga nama --}}
                    <a href="{{ route('profile.show', Auth::user()) }}" class="flex items-center gap-2">
                        <img class="sm:w-6 sm:h-6 md:w-8 md:h-8 rounded-full object-cover" src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('images-profil/gambar-foto-profil-7.jpg') }}" alt="">
                        <div>
                            <p class="sm:text-xs md:text-sm">{{ Auth::user()->name }}</p>
                            <p class="sm:text-[10px] md:text-xs">{{ Auth::user()->username }}</p>
                        </div>
                    </a>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center py-1 border border-transparent text-sm leading-4 font-medium ">
                                <div class="ms-1">
                                    <svg class="w-5 h-5" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="fill-black dark:fill-white"  d="M9.99994 5.99994C9.20881 5.99994 8.43546 6.23454 7.77766 6.67406C7.11986 7.11359 6.60717 7.7383 6.30442 8.4692C6.00167 9.20011 5.92246 10.0044 6.0768 10.7803C6.23114 11.5562 6.6121 12.269 7.17151 12.8284C7.73092 13.3878 8.44365 13.7687 9.21958 13.9231C9.9955 14.0774 10.7998 13.9982 11.5307 13.6955C12.2616 13.3927 12.8863 12.88 13.3258 12.2222C13.7653 11.5644 13.9999 10.7911 13.9999 9.99994C13.9999 8.93907 13.5785 7.92166 12.8284 7.17151C12.0782 6.42137 11.0608 5.99994 9.99994 5.99994ZM9.99994 11.9999C9.60438 11.9999 9.2177 11.8826 8.8888 11.6629C8.5599 11.4431 8.30355 11.1308 8.15218 10.7653C8.0008 10.3999 7.9612 9.99772 8.03837 9.60976C8.11554 9.2218 8.30602 8.86543 8.58573 8.58573C8.86543 8.30602 9.2218 8.11554 9.60976 8.03837C9.99772 7.9612 10.3999 8.0008 10.7653 8.15218C11.1308 8.30355 11.4431 8.5599 11.6629 8.8888C11.8826 9.2177 11.9999 9.60438 11.9999 9.99994C11.9999 10.5304 11.7892 11.0391 11.4142 11.4142C11.0391 11.7892 10.5304 11.9999 9.99994 11.9999ZM19.7099 9.28994L17.3599 6.99994V3.63994C17.3599 3.37472 17.2546 3.12037 17.067 2.93283C16.8795 2.7453 16.6252 2.63994 16.3599 2.63994H13.0499L10.7099 0.289939C10.617 0.196211 10.5064 0.121816 10.3845 0.0710475C10.2627 0.0202789 10.132 -0.00585938 9.99994 -0.00585938C9.86793 -0.00585938 9.73722 0.0202789 9.61536 0.0710475C9.4935 0.121816 9.3829 0.196211 9.28994 0.289939L6.99994 2.63994H3.63994C3.37472 2.63994 3.12037 2.7453 2.93283 2.93283C2.7453 3.12037 2.63994 3.37472 2.63994 3.63994V6.99994L0.289939 9.28994C0.196211 9.3829 0.121816 9.4935 0.0710475 9.61536C0.0202789 9.73722 -0.00585938 9.86793 -0.00585938 9.99994C-0.00585938 10.132 0.0202789 10.2627 0.0710475 10.3845C0.121816 10.5064 0.196211 10.617 0.289939 10.7099L2.63994 13.0499V16.3599C2.63994 16.6252 2.7453 16.8795 2.93283 17.067C3.12037 17.2546 3.37472 17.3599 3.63994 17.3599H6.99994L9.33994 19.7099C9.4329 19.8037 9.5435 19.8781 9.66536 19.9288C9.78722 19.9796 9.91793 20.0057 10.0499 20.0057C10.182 20.0057 10.3127 19.9796 10.4345 19.9288C10.5564 19.8781 10.667 19.8037 10.7599 19.7099L13.0999 17.3599H16.4099C16.6752 17.3599 16.9295 17.2546 17.117 17.067C17.3046 16.8795 17.4099 16.6252 17.4099 16.3599V13.0499L19.7599 10.7099C19.8505 10.6137 19.921 10.5005 19.9676 10.3769C20.0141 10.2532 20.0356 10.1215 20.031 9.98951C20.0264 9.85748 19.9956 9.72767 19.9405 9.6076C19.8854 9.48752 19.807 9.37956 19.7099 9.28994ZM15.6599 11.9299C15.5655 12.0226 15.4903 12.133 15.4388 12.2549C15.3873 12.3767 15.3605 12.5076 15.3599 12.6399V15.3599H12.6399C12.5076 15.3605 12.3767 15.3873 12.2549 15.4388C12.133 15.4903 12.0226 15.5655 11.9299 15.6599L9.99994 17.5899L8.06994 15.6599C7.97732 15.5655 7.86688 15.4903 7.745 15.4388C7.62313 15.3873 7.49225 15.3605 7.35994 15.3599H4.63994V12.6399C4.63939 12.5076 4.61259 12.3767 4.56109 12.2549C4.5096 12.133 4.43443 12.0226 4.33994 11.9299L2.40994 9.99994L4.33994 8.06994C4.43443 7.97732 4.5096 7.86688 4.56109 7.745C4.61259 7.62313 4.63939 7.49225 4.63994 7.35994V4.63994H7.35994C7.49225 4.63939 7.62313 4.61259 7.745 4.56109C7.86688 4.5096 7.97732 4.43443 8.06994 4.33994L9.99994 2.40994L11.9299 4.33994C12.0226 4.43443 12.133 4.5096 12.2549 4.56109C12.3767 4.61259 12.5076 4.63939 12.6399 4.63994H15.3599V7.35994C15.3605 7.49225 15.3873 7.62313 15.4388 7.745C15.4903 7.86688 15.5655 7.97732 15.6599 8.06994L17.5899 9.99994L15.6599 11.9299Z" fill="black"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Edit Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <div class="flex items-center gap-2 text-red-600">
                                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="fill-red-600" d="M0 10C0 10.2652 0.105357 10.5196 0.292893 10.7071C0.48043 10.8946 0.734784 11 1 11H8.59L6.29 13.29C6.19627 13.383 6.12188 13.4936 6.07111 13.6154C6.02034 13.7373 5.9942 13.868 5.9942 14C5.9942 14.132 6.02034 14.2627 6.07111 14.3846C6.12188 14.5064 6.19627 14.617 6.29 14.71C6.38296 14.8037 6.49356 14.8781 6.61542 14.9289C6.73728 14.9797 6.86799 15.0058 7 15.0058C7.13201 15.0058 7.26272 14.9797 7.38458 14.9289C7.50644 14.8781 7.61704 14.8037 7.71 14.71L11.71 10.71C11.801 10.6149 11.8724 10.5028 11.92 10.38C12.02 10.1365 12.02 9.86346 11.92 9.62C11.8724 9.49725 11.801 9.3851 11.71 9.29L7.71 5.29C7.61676 5.19676 7.50607 5.1228 7.38425 5.07234C7.26243 5.02188 7.13186 4.99591 7 4.99591C6.86814 4.99591 6.73757 5.02188 6.61575 5.07234C6.49393 5.1228 6.38324 5.19676 6.29 5.29C6.19676 5.38324 6.1228 5.49393 6.07234 5.61575C6.02188 5.73757 5.99591 5.86814 5.99591 6C5.99591 6.13186 6.02188 6.26243 6.07234 6.38425C6.1228 6.50607 6.19676 6.61676 6.29 6.71L8.59 9H1C0.734784 9 0.48043 9.10536 0.292893 9.29289C0.105357 9.48043 0 9.73478 0 10ZM13 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V6C0 6.26522 0.105357 6.51957 0.292893 6.70711C0.48043 6.89464 0.734784 7 1 7C1.26522 7 1.51957 6.89464 1.70711 6.70711C1.89464 6.51957 2 6.26522 2 6V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H13C13.2652 2 13.5196 2.10536 13.7071 2.29289C13.8946 2.48043 14 2.73478 14 3V17C14 17.2652 13.8946 17.5196 13.7071 17.7071C13.5196 17.8946 13.2652 18 13 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V14C2 13.7348 1.89464 13.4804 1.70711 13.2929C1.51957 13.1054 1.26522 13 1 13C0.734784 13 0.48043 13.1054 0.292893 13.2929C0.105357 13.4804 0 13.7348 0 14V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H13C13.7956 20 14.5587 19.6839 15.1213 19.1213C15.6839 18.5587 16 17.7956 16 17V3C16 2.20435 15.6839 1.44129 15.1213 0.87868C14.5587 0.316071 13.7956 0 13 0Z" fill="black"/>
                                        </svg>
                                       <p>Log Out</p>
                                    </div>

                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endauth

        </div>
    </div>

    @auth
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <a href="{{ route('profile.show', Auth::user()->username) }}" class="px-4 flex items-center gap-2 hover:dark:bg-gray-700 py-1">
                    {{-- Foto User --}}
                    <img class="w-10 h-10 rounded-full object-cover" src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('storage/images/gambar-foto-profil-7.jpg') }}" alt="">

                    <div>
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->username }}</div>
                    </div>

                </a>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Edit Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <div class="text-red-600 flex items-center gap-2">
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-red-600" d="M0 10C0 10.2652 0.105357 10.5196 0.292893 10.7071C0.48043 10.8946 0.734784 11 1 11H8.59L6.29 13.29C6.19627 13.383 6.12188 13.4936 6.07111 13.6154C6.02034 13.7373 5.9942 13.868 5.9942 14C5.9942 14.132 6.02034 14.2627 6.07111 14.3846C6.12188 14.5064 6.19627 14.617 6.29 14.71C6.38296 14.8037 6.49356 14.8781 6.61542 14.9289C6.73728 14.9797 6.86799 15.0058 7 15.0058C7.13201 15.0058 7.26272 14.9797 7.38458 14.9289C7.50644 14.8781 7.61704 14.8037 7.71 14.71L11.71 10.71C11.801 10.6149 11.8724 10.5028 11.92 10.38C12.02 10.1365 12.02 9.86346 11.92 9.62C11.8724 9.49725 11.801 9.3851 11.71 9.29L7.71 5.29C7.61676 5.19676 7.50607 5.1228 7.38425 5.07234C7.26243 5.02188 7.13186 4.99591 7 4.99591C6.86814 4.99591 6.73757 5.02188 6.61575 5.07234C6.49393 5.1228 6.38324 5.19676 6.29 5.29C6.19676 5.38324 6.1228 5.49393 6.07234 5.61575C6.02188 5.73757 5.99591 5.86814 5.99591 6C5.99591 6.13186 6.02188 6.26243 6.07234 6.38425C6.1228 6.50607 6.19676 6.61676 6.29 6.71L8.59 9H1C0.734784 9 0.48043 9.10536 0.292893 9.29289C0.105357 9.48043 0 9.73478 0 10ZM13 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V6C0 6.26522 0.105357 6.51957 0.292893 6.70711C0.48043 6.89464 0.734784 7 1 7C1.26522 7 1.51957 6.89464 1.70711 6.70711C1.89464 6.51957 2 6.26522 2 6V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H13C13.2652 2 13.5196 2.10536 13.7071 2.29289C13.8946 2.48043 14 2.73478 14 3V17C14 17.2652 13.8946 17.5196 13.7071 17.7071C13.5196 17.8946 13.2652 18 13 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V14C2 13.7348 1.89464 13.4804 1.70711 13.2929C1.51957 13.1054 1.26522 13 1 13C0.734784 13 0.48043 13.1054 0.292893 13.2929C0.105357 13.4804 0 13.7348 0 14V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H13C13.7956 20 14.5587 19.6839 15.1213 19.1213C15.6839 18.5587 16 17.7956 16 17V3C16 2.20435 15.6839 1.44129 15.1213 0.87868C14.5587 0.316071 13.7956 0 13 0Z" fill="black"/>
                                </svg>
                                <p>Log Out</p>
                            </div>
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endauth

</nav>
