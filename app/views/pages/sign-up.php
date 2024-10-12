<section class="grid text-center p-8 bg-gradient-to-b from-white to-blue-50">
    <div class="bg-white shadow-lg rounded-lg border border-blue-300 p-8 mx-auto max-w-[26rem]">
        <h3 class="text-3xl font-semibold mb-2 text-blue-900">Sign Up</h3>
        <p class="text-base text-blue-600 mb-8">Create your account by filling in the details below</p>

        <form action="/my-blog/handle-sign-up" method="POST" class="text-left">
            <div class="mb-6">
                <label for="name" class="block font-medium text-blue-900 mb-2">Full Name</label>
                <input id="name" type="text" name="name" placeholder="Your Full Name"
                    class="w-full h-11 px-3 py-3 text-sm rounded-md border border-blue-300 focus:border-blue-600 focus:ring focus:ring-blue-200 transition duration-200"
                    required />
            </div>
            
            <div class="mb-6">
                <label for="username" class="block font-medium text-blue-900 mb-2">Username</label>
                <input id="username" type="text" name="username" placeholder="Your Username"
                    class="w-full h-11 px-3 py-3 text-sm rounded-md border border-blue-300 focus:border-blue-600 focus:ring focus:ring-blue-200 transition duration-200"
                    required />
            </div>

            <div class="mb-6">
                <label for="email" class="block font-medium text-blue-900 mb-2">Your Email</label>
                <input id="email" type="email" name="email" placeholder="name@mail.com"
                    class="w-full h-11 px-3 py-3 text-sm rounded-md border border-blue-300 focus:border-blue-600 focus:ring focus:ring-blue-200 transition duration-200"
                    required />
            </div>

            <div class="mb-4">
                <label for="password" class="block font-medium text-blue-900 mb-2">Password</label>
                <div class="relative w-full h-11">
                    <input type="password" id="password" name="password" placeholder="********"
                        class="w-full h-11 px-3 py-3 text-sm rounded-md border border-blue-300 focus:border-blue-600 focus:ring focus:ring-blue-200 transition duration-200 pr-10"
                        required />
                    <div class="absolute inset-y-0 right-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="h-5 w-5 text-blue-600">
                            <!-- SVG path here -->
                        </svg>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full py-3.5 bg-blue-900 text-white rounded-lg font-bold uppercase mt-4 hover:bg-blue-800 transition duration-200">
                Sign up
            </button>
            <p class="text-sm text-blue-700 mt-4 text-center">
                Already have an account? <a href="/my-blog/sign-in"
                    class="font-medium text-blue-900 hover:underline">Sign in</a>
            </p>
        </form>
    </div>
</section>
