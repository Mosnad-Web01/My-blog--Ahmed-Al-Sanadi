<?php
if (!isset($_SESSION["user_id"])) {
    $_SESSION['error'] = "You must be logged in to view this page.";
    header("Location: /my-blog/sign-in");
    exit;
}
?>

<div class="container mx-auto px-4 py-10 relative">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-purple-50 opacity-50 z-0"></div>
    
    <h1 class="text-6xl font-extrabold text-center mb-12 relative">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-teal-400">My Blog</span>
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-blue-500 to-teal-400"></div>
    </h1>
  



    <div class="mb-8 text-right">
        <a href="/my-blog/blog/create" class="inline-flex items-center bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-full hover:from-blue-600 hover:to-purple-700 transition duration-300 shadow-lg transform hover:scale-105">
            <i class="fas fa-plus mr-2"></i>Create New Blog
        </a>
    </div>

    <?php if (count($blogs) > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($blogs as $blog): ?>
                <div class="bg-white rounded-xl shadow-2xl overflow-hidden transition-all duration-300 transform hover:shadow-3xl cursor-pointer flex flex-col h-full">
                    <div class="relative">
                        <?php if (!empty($blog['image_url'])): ?>
                            <img src="./app<?php echo htmlspecialchars($blog['image_url']); ?>" alt="Blog image" class="w-full h-56 object-cover">
                        <?php else: ?>
                            <div class="w-full h-56 bg-gradient-to-br from-blue-200 to-purple-200 flex items-center justify-center text-gray-400">
                                <i class="fas fa-image text-6xl"></i>
                            </div>
                        <?php endif; ?>
                        <span class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 text-sm font-semibold <?php echo $blog['is_published'] ? 'text-green-600' : 'text-red-600'; ?> shadow-md">
                            <?php echo $blog['is_published'] ? 'Published' : 'Draft'; ?>
                        </span>
                    </div>

                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-2xl mb-3 text-gray-800 hover:text-blue-600 transition duration-300"><?php echo htmlspecialchars($blog['title']); ?></h3>
                            <p class="text-gray-600 mb-4 line-clamp-3"><?php echo htmlspecialchars(substr($blog['content'], 0, 150)) . '...'; ?></p>
                        </div>

                        <div>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 mb-4">
                                <?php if (!empty($blog['category'])): ?>
                                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full mr-2 mb-2"><?php echo htmlspecialchars($blog['category']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($blog['tags'])): ?>
                                    <?php foreach (explode(',', $blog['tags']) as $tag): ?>
                                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full mr-2 mb-2">#<?php echo htmlspecialchars(trim($tag)); ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>

                            <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                                <span><i class="far fa-calendar-alt mr-2"></i><?php echo htmlspecialchars($blog['created_at']); ?></span>
                                <span><i class="far fa-user mr-2"></i>John Doe</span>
                            </div>

                            <a href="/my-blog/blog/show?id=<?php echo htmlspecialchars($blog['id']); ?>" class="block text-center bg-gradient-to-r from-blue-500 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-purple-700 transition duration-300 shadow-md transform hover:translate-y-px">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center text-gray-600 py-16 bg-white rounded-xl shadow-lg">
            <i class="fas fa-book-open text-7xl mb-6 text-blue-500"></i>
            <p class="text-2xl font-semibold">No blogs available. Be the first to create one!</p>
            <a href="/my-blog/blog/create" class="mt-6 inline-block bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-full hover:from-blue-600 hover:to-purple-700 transition duration-300 shadow-lg transform hover:scale-105">
                <i class="fas fa-plus mr-2"></i>Create Your First Blog
            </a>
        </div>
    <?php endif; ?>
</div>