<?php
// app/views/blog/show.php
?>

<div class="max-w-4xl mx-auto px-4 py-8">
    <?php if ($blog): ?>
        <nav class="mb-8 flex justify-between items-center">
            <a href="/my-blog/blogs"
                class="text-indigo-600 hover:text-indigo-800 transition duration-300 ease-in-out flex items-center group">
                <i
                    class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"></i>
                <span class="relative">
                    Back to Blogs
                    <span
                        class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                </span>
            </a>
            <div class="space-x-2">
                <a href="/my-blog/blog/edit?id=<?php echo $blog['id']; ?>"
                    class="inline-flex items-center px-4 py-2 bg-emerald-500 text-white rounded-md hover:bg-emerald-600 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-edit mr-2"></i>
                    <span>Edit</span>
                </a>
                <button onclick="confirmDelete(<?php echo $blog['id']; ?>)"
                    class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-trash-alt mr-2"></i>
                    <span>Delete</span>
                </button>
            </div>
        </nav>

        <article class="bg-white shadow-lg rounded-lg overflow-hidden">

            <?php if (!empty($blog['image_url'])): ?>
                <div class="relative h-96 overflow-hidden">
                    <img src="../app<?php echo htmlspecialchars($blog['image_url']); ?>"
                        alt="<?php echo htmlspecialchars($blog['title']); ?>"
                        class="w-full h-full object-cover transition duration-300 ease-in-out transform hover:scale-105">
                </div>
            <?php endif; ?>


            <div class="p-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    <?php echo htmlspecialchars($blog['title']); ?>
                </h1>

                <div class="flex items-center text-sm text-gray-600 mb-6">
                    <i class="far fa-calendar-alt mr-2"></i>
                    <span>Posted on: <?php echo date('F j, Y', strtotime($blog['created_at'])); ?></span>
                </div>

                <div class="prose prose-lg max-w-none mb-8">
                    <?php echo nl2br(htmlspecialchars($blog['content'])); ?>
                </div>

                <div class="flex flex-wrap items-center justify-between border-t border-gray-200 pt-6">
                    <div class="flex items-center mb-4 md:mb-0">
                        <span class="bg-indigo-100 text-indigo-800 py-1 px-3 rounded-full text-sm font-semibold mr-2">
                            <?php echo htmlspecialchars($blog['category']); ?>
                        </span>
                    </div>
                    <div class="flex flex-wrap">
                        <?php
                        $tags = explode(',', $blog['tags']);
                        foreach ($tags as $tag):
                            $tag = trim($tag);
                            if (!empty($tag)):
                                ?>
                                <span class="bg-gray-200 text-gray-700 py-1 px-2 rounded text-sm mr-2 mb-2">
                                    #<?php echo htmlspecialchars($tag); ?>
                                </span>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </article>

        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Share this post</h2>
            <div class="flex space-x-4">
                <a href="#" class="text-blue-600 hover:text-blue-800">
                    <i class="fab fa-facebook-square text-2xl"></i>
                </a>
                <a href="#" class="text-blue-400 hover:text-blue-600">
                    <i class="fab fa-twitter-square text-2xl"></i>
                </a>
                <a href="#" class="text-red-600 hover:text-red-800">
                    <i class="fab fa-pinterest-square text-2xl"></i>
                </a>
                <a href="#" class="text-green-600 hover:text-green-800">
                    <i class="fab fa-whatsapp-square text-2xl"></i>
                </a>
            </div>
        </div>

    <?php else: ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
            <p class="font-bold">Error</p>
            <p>Blog post not found.</p>
        </div>
    <?php endif; ?>
</div>