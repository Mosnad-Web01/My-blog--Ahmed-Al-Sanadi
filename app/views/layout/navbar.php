<?php
session_start();
$base_url = '/my-blog/';

$nav_items = [
    'Home' => 'home',
    'About' => 'about',
    'Blog' => 'blogs',
    'Contact' => 'contact',
];
?>

<header class="bg-gradient-to-br from-black via-indigo-900 to-indigo-900 text-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">

        <a href="index.php" class="text-2xl font-bold">
            MyBlog
        </a>
        <nav class="hidden md:flex items-center space-x-8"> <!-- Added items-center -->
            <?php foreach ($nav_items as $name => $page): ?>
                <a href="<?php echo $base_url . $page; ?>"
                    class="text-gray-200 hover:text-white font-semibold transition duration-300">
                    <?php echo $name; ?>
                </a>
            <?php endforeach; ?>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="<?php echo $base_url; ?>sign-in"
                    class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-2 px-4 rounded transition duration-300">
                    Sign In
                </a>
            <?php else: ?>
                <!-- logout Button -->
                <a href="/my-blog/logout"
                    class="bg-red-600 hover:bg-red-500 text-white font-semibold py-2 px-4 rounded transition duration-300">
                    Logout
                </a>
            <?php endif; ?>
        </nav>

        <button id="menu-btn" class="md:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <div id="mobile-menu"
            class="hidden md:hidden absolute top-16 left-0 right-0 bg-gradient-to-br from-black via-indigo-900 to-black shadow-lg">
            <nav class="flex flex-col items-center space-y-4 py-4">
                <?php foreach ($nav_items as $name => $page): ?>
                    <a href="<?php echo $base_url . $page; ?>"
                        class="text-gray-200 hover:text-white font-semibold transition duration-300"><?php echo $name; ?></a>
                <?php endforeach; ?>
                <!-- Sign In Button -->
                <a href="<?php echo $base_url; ?>sign-in"
                    class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-2 px-4 rounded transition duration-300">
                    Sign In
                </a>
            </nav>
        </div>
    </div>
</header>