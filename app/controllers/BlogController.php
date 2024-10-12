<?php
require_once '../models/Blog.php';

class BlogController
{
    private $blogModel;

    public function __construct($db)
    {
        $this->blogModel = new Blog($db);
    }


    public function showAllBlogs()
    {
        $blogs = $this->blogModel->getAllBlogs();
        include '../views/blog/index.php';
    }

    public function create()
    {
        include '../views/blog/create.php';
    }


    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $user_id = $_SESSION['user_id'];
            $is_published = isset($_POST['is_published']) ? 1 : 0;
            $category = trim($_POST['category']);
            $tags = trim($_POST['tags']);
            $image_url = null;

            // Basic validation
            if (empty($title) || empty($content)) {
                $_SESSION['error'] = "Title and content cannot be empty.";
                header('Location: /my-blog/blog/create');
                exit;
            }

            // Check if an image file was uploaded
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $_FILES['image'];
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

                // Validate file type
                if (!in_array($image['type'], $allowed_types)) {
                    $_SESSION['error'] = "Invalid image type. Please upload a JPEG, PNG, or GIF.";
                    header('Location: /my-blog/blog/create');
                    exit;
                }

                // Move uploaded file to the 'uploads' directory
                $target_dir = '../uploads/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($image['name']);
                move_uploaded_file($image['tmp_name'], $target_file);
                $image_url = '/uploads/' . basename($image['name']);
            }

            // Call the model's create method to save the data
            $this->blogModel->createBlog($title, $content, $user_id, $image_url, $is_published, $category, $tags);

            // Set a success message and redirect
            $_SESSION['message'] = "Blog post created successfully!";
            header('Location: /my-blog/blogs');
            exit;
        }
        header('Location: /my-blog/blog/');
        exit;
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $blogId = $_GET['id'];
            $blog = $this->blogModel->getBlogById($blogId);

            if ($blog) {
                include '../views/blog/edit.php';
            } else {
                $_SESSION['error'] = "Blog not found.";
                header('Location: /my-blog/blogs');
                exit;
            }
        } else {
            header('Location: /my-blog/blogs');
            exit;
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $is_published = isset($_POST['is_published']) ? 1 : 0;
            $category = trim($_POST['category']);
            $tags = trim($_POST['tags']);
            $image_url = $_POST['existing_image_url'];

            // Check if a new image is uploaded
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $_FILES['image'];
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

                if (!in_array($image['type'], $allowed_types)) {
                    $_SESSION['error'] = "Invalid image type.";
                    header("Location: /my-blog/blog/edit?id=$id");
                    exit;
                }

                $target_dir = '../uploads/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($image['name']);
                move_uploaded_file($image['tmp_name'], $target_file);
                $image_url = '/uploads/' . basename($image['name']);
            }

            $this->blogModel->updateBlog($id, $title, $content, $image_url, $is_published, $category, $tags);
            $_SESSION['message'] = "Blog post updated successfully!";
            header('Location: /my-blog/blogs');
            exit;
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->blogModel->deleteBlog($id);
        $_SESSION['message'] = "Blog post deleted successfully!";
        header('Location: /my-blog/blogs');
        exit;
    }

}

