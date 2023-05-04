<x-app-layout>
    <div x-data="{ cartOpen: false, isOpen: false }">
        {{-- <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-end w-full">
                        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </button>

                        <div class="flex sm:hidden">
                            <button @click="isOpen = !isOpen" type="button"
                                    class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                                    aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                    <path fill-rule="evenodd"
                                          d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
                    <div class="flex flex-col sm:flex-row">
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Home</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Shop</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Categories</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Contact</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">About</a>
                    </div>
                </nav>
            </div>
        </header> --}}

        {{-- Cart sidebar --}}
        {{-- <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
             class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
                <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <hr class="my-3">
            <div class="flex justify-between mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded"
                         src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                         alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                        <div class="flex items-center mt-2">
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <span class="text-gray-700 mx-2">2</span>
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600">20$</span>
            </div>
            <div class="flex justify-between mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded"
                         src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                         alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                        <div class="flex items-center mt-2">
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <span class="text-gray-700 mx-2">2</span>
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600">20$</span>
            </div>
            <div class="flex justify-between mt-6">
                <div class="flex">
                    <img class="h-20 w-20 object-cover rounded"
                         src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80"
                         alt="">
                    <div class="mx-3">
                        <h3 class="text-sm text-gray-600">Mac Book Pro</h3>
                        <div class="flex items-center mt-2">
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <span class="text-gray-700 mx-2">2</span>
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600">20$</span>
            </div>
            <div class="mt-8">
                <form class="flex items-center justify-center">
                    <input class="form-input w-48" type="text" placeholder="Add promocode">
                    <button
                            class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <span>Apply</span>
                    </button>
                </form>
            </div>
            <a
               class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                <span>Chechout</span>
                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div> --}}

        <x-slot name="slot">
            {{-- Hero --}}
            <section>
                <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                    <div class="lg:flex-grow flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            
                        <h1 class="text-yellow font-display tracking-wide sm:text-3xl md:text-6xl xl:text-7xl mb-4 font-bold ">
                            FireShop
                        </h1>
            
                        <p class="mb-8 leading-relaxed text-white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lacus, sit ut fermentum posuere platea. Cras turpis adipiscing varius id sed leo morbi. Morbi amet, lectus pretium et vitae duis lectus in lorem.
                        </p>
                        
                        <div class="flex justify-center">
                            <x-primary-button>
                                About
                            </x-primary-button>
                        </div>
                    </div>
                    
                    <div class="w-full h- flex justify-center items-center m-auto">
                        <img class="object-cover object-center rounded-xl" alt="hero" src="images/firework-tower.jpg">
                    </div>
                </div>
            </section>

            <section>
                <div class="container mx-auto px-5 py-5">
                    <h1 class="my-3 text-white text-2xl font-semibold font-display underline decoration-yellow decoration-wavy underline-offset-8 sm:mx-3 sm:mt-0">
                        New products
                    </h1>
                    <div class="container flex items-center">
                        <div class="inline-grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
                            <x-product-card />
                            <x-product-card />
                            <x-product-card />
                        </div>
                    </div>
                </div>
            </section>
        </x-slot>
</x-app-layout>
