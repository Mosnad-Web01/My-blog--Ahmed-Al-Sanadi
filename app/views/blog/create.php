<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: /my-blog/sign-in');
    exit;
}
?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Create a New Blog Post</h1>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">' . htmlspecialchars($_SESSION['error']) . '</div>';
        unset($_SESSION['error']);
    }
    ?>

    <!-- Add enctype="multipart/form-data" to the form -->
    <form action="/my-blog/blog/store" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" required class="shadow border rounded w-full py-2 px-3 text-gray-700" placeholder="Enter blog title">
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
            <textarea name="content" id="content" required class="shadow border rounded w-full py-2 px-3 text-gray-700" rows="10" placeholder="Enter blog content"></textarea>
        </div>
        <!-- File input for the image -->
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
            <input type="file" name="image" id="image" class="shadow border rounded w-full py-2 px-3 text-gray-700" accept="image/*">
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-bold mb-2">Category</label>
            <input type="text" name="category" id="category" class="shadow border rounded w-full py-2 px-3 text-gray-700" placeholder="Enter category">
        </div>
        <div class="mb-4">
            <label for="tags" class="block text-gray-700 font-bold mb-2">Tags</label>
            <input type="text" name="tags" id="tags" class="shadow border rounded w-full py-2 px-3 text-gray-700" placeholder="Enter tags, separated by commas">
        </div>
        <div class="mb-4">
            <input type="checkbox" name="is_published" id="is_published" class="mr-2 leading-tight">
            <label for="is_published" class="text-gray-700 font-bold">Publish Now</label>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Blog</button>
    </form>
</div>
