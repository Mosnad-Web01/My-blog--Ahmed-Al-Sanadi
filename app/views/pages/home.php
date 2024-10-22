<?php if (isset($content)): ?>

    <section
        class="relative bg-gradient-to-br from-black via-indigo-900 to-black min-h-screen flex items-center justify-center overflow-hidden">


        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="floating-shape left-1/4 top-1/4"></div>
            <div class="floating-shape right-1/4 bottom-1/4"></div>
            <div class="floating-shape left-1/3 bottom-1/3"></div>
            <div class="floating-shape right-1/3 top-1/3"></div>
        </div>

        <!-- Content container -->
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
            <h1 class="text-5xl sm:text-7xl font-extrabold text-white mb-6 animate-fade-in-up">
                <span class="bg-clip-text text-transparent text-white">
                    Discover. Learn. Grow.
                </span>
            </h1>
            <p class="text-xl sm:text-2xl text-gray-300 mb-10 animate-fade-in-up animation-delay-300">
                Explore our curated collection of insightful articles, thought-provoking ideas, and expert knowledge.
            </p>
            <div
                class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 animate-fade-in-up animation-delay-600">
                <a href="#latest-posts"
                    class="px-8 py-3 bg-teal-500 text-white font-semibold rounded-full hover:bg-teal-600 transition duration-300 ease-in-out transform hover:scale-105">
                    Latest Posts
                </a>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="/my-blog/sign-up"
                        class="px-8 py-3 bg-purple-600 text-white font-semibold rounded-full hover:bg-purple-700 transition duration-300 ease-in-out transform hover:scale-105">
                        Sign Up Now
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Animated scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

<?php endif; ?>

<!-- Innovative Content Section -->
<section class="bg-gray-100 py-20">
    <div class="container mx-auto px-4">
        <!-- Floating Navigation -->
        <div
            class=" top-4 z-50 bg-white rounded-full shadow-lg p-2 mb-12 max-w-md mx-auto flex justify-around items-center">
            <a href="#trending" class="text-gray-600 hover:text-blue-600 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
            </a>
            <a href="#featured" class="text-gray-600 hover:text-blue-600 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
            </a>
            <a href="#categories" class="text-gray-600 hover:text-blue-600 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
            </a>
        </div>

        <!-- Trending Section -->
        <section id="trending" class="mb-20">
            <h2 class="text-4xl font-bold text-center mb-12 relative">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-teal-400">Trending
                    Now</span>
                <div
                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-blue-500 to-teal-400">
                </div>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- card 1 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="relative">
                        <img src="./app/images/the-future.png" alt="Tech" class="w-full h-48 object-cover">
                        <div class="absolute top-0 right-0 bg-blue-500 text-white px-3 py-1 rounded-bl-lg">#1</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">The Future of AI: What's Next?</h3>
                        <p class="text-gray-600 mb-4">Explore the cutting-edge developments in artificial intelligence
                            and their potential impact on our lives.</p>
                        <a href="#"
                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition-colors duration-300">Read
                            More</a>
                    </div>
                </div>

                <!-- card 2 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="relative">
                        <img src="./app/images/fashion2.jpg" alt="Tech" class="w-full h-48 object-cover">
                        <div class="absolute top-0 right-0 bg-blue-500 text-white px-3 py-1 rounded-bl-lg">#2</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Sustainable Fashion: The Future of Apparel</h3>
                        <p class="text-gray-600 mb-4">This post examines innovative brands and practices that prioritize
                            eco-friendly materials.</p>
                        <a href="#"
                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition-colors duration-300">Read
                            More</a>
                    </div>
                </div>

                <!-- card 3 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="relative">
                        <img src="./app/images/mental.jpg" alt="Tech" class="w-full h-48 object-cover">
                        <div class="absolute top-0 right-0 bg-blue-500 text-white px-3 py-1 rounded-bl-lg">#1</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">The Impact of Remote Work on Mental Health</h3>
                        <p class="text-gray-600 mb-4">This article investigates the psychological effects of remote work
                            on employees. </p>
                        <a href="#"
                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition-colors duration-300">Read
                            More</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Article -->
        <section id="featured" class="mb-20">

            <!-- Featured Article 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img src="./app/images/fashion3.jpg" alt="Featured-1"
                            class="h-full w-full object-cover md:w-48">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Featured Article
                        </div>
                        <a href="#"
                            class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Embracing
                            Sustainable Living: Small Changes, Big Impact</a>
                        <p class="mt-2 text-gray-500">Discover how small lifestyle adjustments can lead to a more
                            sustainable future for our planet.</p>
                        <div class="mt-4">
                            <a href="#"
                                class="inline-block bg-indigo-500 text-white px-4 py-2 rounded-full hover:bg-indigo-600 transition-colors duration-300">Read
                                Full Article</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Article 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mt-8 ">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img src="./app/images/fashion2.jpg" alt="Featured-2"
                            class="h-full w-full object-cover md:w-48">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Featured Article
                        </div>
                        <a href="#"
                            class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Embracing
                            Sustainable Living: Small Changes, Big Impact</a>
                        <p class="mt-2 text-gray-500">Discover how small lifestyle adjustments can lead to a more
                            sustainable future for our planet.</p>
                        <div class="mt-4">
                            <a href="#"
                                class="inline-block bg-indigo-500 text-white px-4 py-2 rounded-full hover:bg-indigo-600 transition-colors duration-300">Read
                                Full Article</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Featured Article 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mt-8">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img src="./app/images/fashion4.jpg" alt="Featured" class="h-full w-full object-cover md:w-48">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Featured Article
                        </div>
                        <a href="#"
                            class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Embracing
                            Sustainable Living: Small Changes, Big Impact</a>
                        <p class="mt-2 text-gray-500">Discover how small lifestyle adjustments can lead to a more
                            sustainable future for our planet.</p>
                        <div class="mt-4">
                            <a href="#"
                                class="inline-block bg-indigo-500 text-white px-4 py-2 rounded-full hover:bg-indigo-600 transition-colors duration-300">Read
                                Full Article</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Categories Section -->
        <section id="categories" class="bg-white py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center mb-12 relative">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-pink-500">Explore
                        Categories</span>
                    <div
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500">
                    </div>
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="#"
                        class="bg-blue-100 rounded-lg p-6 text-center hover:bg-blue-200 transition duration-300">
                        <i class="fas fa-laptop-code text-3xl mb-2 text-blue-600"></i>
                        <h3 class="font-semibold">Technology</h3>
                    </a>
                    <a href="#"
                        class="bg-green-100 rounded-lg p-6 text-center hover:bg-green-200 transition duration-300">
                        <i class="fas fa-leaf text-3xl mb-2 text-green-600"></i>
                        <h3 class="font-semibold">Lifestyle</h3>
                    </a>
                    <a href="#" class="bg-red-100 rounded-lg p-6 text-center hover:bg-red-200 transition duration-300">
                        <i class="fas fa-heartbeat text-3xl mb-2 text-red-600"></i>
                        <h3 class="font-semibold">Health</h3>
                    </a>
                    <a href="#"
                        class="bg-yellow-100 rounded-lg p-6 text-center hover:bg-yellow-200 transition duration-300">
                        <i class="fas fa-book text-3xl mb-2 text-yellow-600"></i>
                        <h3 class="font-semibold">Education</h3>
                    </a>
                </div>
            </div>
        </section>
        <!-- About Us Section -->
        <?php if (!isset(($_SESSION['user_id']))): ?>
            <section id="about" class="relative py-20 overflow-hidden">
                <!-- Background Animation -->
                <div class="absolute inset-0 z-0">
                    <div class="absolute inset-0 bg-gradient-to-br from-black via-indigo-900 to-black opacity-90"></div>
                    <div class="absolute inset-0" id="particles-js"></div>
                </div>

                <div class="container mx-auto px-4 relative z-10">
                    <div class="max-w-4xl mx-auto">
                        <h2 class="text-5xl font-bold mb-8 text-center text-white">
                            <span
                                class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500">
                                Our Story
                            </span>
                        </h2>

                        <!-- Timeline -->
                        <div class="relative mt-16">
                            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-white"></div>

                            <!-- Timeline Item 1 -->
                            <div class="relative mt-5  mb-16">
                                <div
                                    class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-12 h-12 rounded-full border-4 border-white bg-indigo-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div class="ml-8   bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                                    <h3 class="text-2xl font-semibold mb-2">Our Inception</h3>
                                    <p class="text-gray-600">Born from a passion for knowledge sharing, we embarked on this
                                        journey
                                        to create a hub of inspiration and learning.</p>
                                </div>
                            </div>

                            <!-- Timeline Item 2 -->
                            <div class="relative mb-16">
                                <div
                                    class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-12 h-12 rounded-full border-4 border-white bg-purple-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div
                                    class="mr-8 bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow text-right">
                                    <h3 class="text-2xl font-semibold mb-2">Growing Community</h3>
                                    <p class="text-gray-600">As our readership grew, so did our commitment to delivering
                                        high-quality, diverse content that resonates with our audience.</p>
                                </div>
                            </div>

                            <!-- Timeline Item 3 -->
                            <div class="relative">
                                <div
                                    class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-12 h-12 rounded-full border-4 border-white bg-pink-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <div class="ml-8 bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow ">
                                    <h3 class="text-2xl font-semibold mb-2">Our Mission Today</h3>
                                    <p class="text-gray-600">We continue to evolve, innovate, and inspire, committed to
                                        being your
                                        trusted source for knowledge, growth, and discovery.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Team Section -->
                        <div class="mt-20">
                            <h3 class="text-3xl font-bold mb-8 text-center text-white">Meet Our Team</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <!-- Team Member 1 -->
                                <div
                                    class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                                    <img src="./app/images/women1.jpg" alt="Team Member 1" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h4 class="font-bold text-xl mb-2">Jane Doe</h4>
                                        <p class="text-gray-600">Founder & Editor-in-Chief</p>
                                    </div>
                                </div>
                                <!-- Team Member 2 -->
                                <div
                                    class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                                    <img src="./app/images/women2.jpg" alt="Team Member 2" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h4 class="font-bold text-xl mb-2">John Smith</h4>
                                        <p class="text-gray-600">Lead Writer</p>
                                    </div>
                                </div>
                                <!-- Team Member 3 -->
                                <div
                                    class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                                    <img src="./app/images/man1.jpg" alt="Team Member 3" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h4 class="font-bold text-xl mb-2">Emily Brown</h4>
                                        <p class="text-gray-600">Creative Director</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CTA -->
                        <div class="mt-16 text-center">
                            <a href="#"
                                class="inline-block bg-white text-indigo-900 px-8 py-3 rounded-full font-semibold hover:bg-indigo-100 transition duration-300 transform hover:scale-105">
                                Join Our Journey
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>