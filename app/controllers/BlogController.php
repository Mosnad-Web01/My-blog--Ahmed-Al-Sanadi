<?php
require_once '../models/Blog.php';

class BlogController
{
    private $blogModel;

    public function __construct($db)
    {
        $this->blogModel = new Blog($db);
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            $blogId = $_GET['id'];
            $blog = $this->blogModel->getBlogById($blogId);

            if ($blog) {
                include '../views/blog/show.php';
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
            error_log("POST request received");
            error_log("POST data: " . print_r($_POST, true));
            error_log("FILES data: " . print_r($_FILES, true));

            // Initialize variables
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $user_id = $_SESSION['user_id'] ?? null;
            $is_published = isset($_POST['is_published']) ? 1 : 0;
            $category = trim($_POST['category'] ?? '');
            $tags = trim($_POST['tags'] ?? '');
            $image_url = null;

            // Validation
            $errors = [];
            if (empty($title)) {
                $errors[] = "Title cannot be empty.";
            }
            if (empty($content)) {
                $errors[] = "Content cannot be empty.";
            }
            if (!$user_id) {
                $errors[] = "User ID is missing.";
            }


            // Check if a new image is uploaded
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {

                $image = $_FILES['image'];
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];

                // Check if the uploaded file is an allowed type
                if (!in_array($image['type'], $allowed_types)) {
                    $errors[] = "Invalid image type. Please upload a JPEG, PNG, or GIF.";
                } else {

                    $target_dir = '../uploads/';
                    // Create the upload directory if it doesn't exist
                    if (!file_exists($target_dir)) {
                        if (!mkdir($target_dir, 0777, true)) {
                            $errors[] = "Failed to create upload directory.";
                        }
                    }
                    // Generate a unique filename
                    $target_file = $target_dir . uniqid() . '-' . basename($image['name']);
                    if (!move_uploaded_file($image['tmp_name'], $target_file)) {
                        $errors[] = "Failed to move the uploaded file.";
                    } else {
                        $image_url = '/uploads/' . basename($target_file);
                    }
                }
            } else {
                $upload_error = isset($_FILES['image']) ? $_FILES['image']['error'] : 'No file uploaded';
                error_log("File upload error: " . $upload_error);
                $errors[] = "Image upload failed. Error: " . $upload_error;
            }

            // If there are errors, redirect back with error messages
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old_input'] = $_POST;  // Store old input for form repopulation
                header('Location: /my-blog/blog/create');
                exit;
            }

            // If no errors, proceed with blog creation
            try {
                $this->blogModel->createBlog($title, $content, $user_id, $image_url, $is_published, $category, $tags);
                $_SESSION['message'] = "Blog post created successfully!";
                header('Location: /my-blog/blogs');
                exit;
            } catch (Exception $e) {
                error_log("Error creating blog post: " . $e->getMessage());
                $_SESSION['error'] = "An error occurred while creating the blog post. Please try again.";
                $_SESSION['old_input'] = $_POST;  // Store old input for form repopulation
                header('Location: /my-blog/blog/create');
                exit;
            }
        } else {
            // If not a POST request, redirect to the create page
            header('Location: /my-blog/blog/create');
            exit;
        }
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
        } else {
            header('Location: /my-blog/blogs');
        }
    }

    public function delete()
    {

        $id = $_GET['id'];
        $blog = $this->blogModel->getBlogById($id);

        // check if the user is authorized to delete this blog
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $blog['user_id']) {
            $this->blogModel->deleteBlog($id);
            $_SESSION['message'] = "Blog post deleted successfully!";
            header('Location: /my-blog/blogs');
            exit;
        } else {
            // redirect with an error message
            $_SESSION['error'] = "You do not have permission to delete this blog post.";
            header('Location: /my-blog/blogs');
            exit;
        }
    }


}

