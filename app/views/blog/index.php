<?php
if (!isset($_SESSION["user_id"])) {
    $_SESSION['error'] = "You must be logged in to view this page.";
    header("Location: /my-blog/sign-in");
    exit;
}
?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8 relative">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-teal-400">My Blog</span>
        <div
            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-blue-500 to-teal-400">
        </div>
    </h1>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <?php echo htmlspecialchars($_SESSION['error']); ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="mb-8 text-right">
        <a href="/my-blog/blog/create"
            class="inline-block bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600 transition-colors duration-300">
            <i class="fas fa-plus mr-2"></i>Create New Blog
        </a>
    </div>

    <?php if (count($blogs) > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($blogs as $blog): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Display blog image if available -->
                    <?php if (!empty($blog['image_url'])): ?>
                        <img src="./app/<?php echo htmlspecialchars($blog['image_url']); ?>" alt="Blog image"
                            class="w-full h-48 object-cover">
                    <?php else: ?>
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                            <i class="fas fa-image text-6xl"></i>
                        </div>
                    <?php endif; ?>

                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2 text-gray-900"><?php echo htmlspecialchars($blog['title']); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo htmlspecialchars(substr($blog['content'], 0, 100)) . '...'; ?>
                        </p>

                        <!-- Blog category and tags -->
                        <div class="flex flex-wrap items-center text-sm text-gray-500 mb-4">
                            <?php if (!empty($blog['category'])): ?>
                                <span
                                    class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full mr-2"><?php echo htmlspecialchars($blog['category']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($blog['tags'])): ?>
                                <?php foreach (explode(',', $blog['tags']) as $tag): ?>
                                    <span
                                        class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full mr-2">#<?php echo htmlspecialchars(trim($tag)); ?></span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <div class="flex justify-between items-center">
                            <small class="text-gray-500">Published on
                                <?php echo htmlspecialchars($blog['created_at']); ?></small>
                            <!-- Show publish status -->
                            <?php if ($blog['is_published']): ?>
                                <span class="text-green-500 font-semibold">Published</span>
                            <?php else: ?>
                                <span class="text-red-500 font-semibold">Draft</span>
                            <?php endif; ?>
                        </div>

                        <a href="/my-blog/blog/<?php echo htmlspecialchars($blog['id']); ?>"
                            class="block mt-4 text-center bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors duration-300">
                            Read More
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center text-gray-600 py-8">
            <i class="fas fa-book-open text-5xl mb-4"></i>
            <p class="text-xl">No blogs available. Be the first to create one!</p>
        </div>
    <?php endif; ?>
</div>