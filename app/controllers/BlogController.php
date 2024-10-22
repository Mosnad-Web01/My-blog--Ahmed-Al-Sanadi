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
        
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error'] = "You need to be logged in to create a blog post.";
            header('Location: /my-blog/login');
            exit;
        }

        include '../views/blog/create.php';
    }

    public function store()
    {
        
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error'] = "You need to be logged in to create a blog post.";
            header('Location: /my-blog/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $user_id = $_SESSION['user_id'];
            $is_published = isset($_POST['is_published']) ? 1 : 0;
            $category = trim($_POST['category'] ?? '');
            $tags = trim($_POST['tags'] ?? '');
            $image_url = null;

          
            $errors = [];
            if (empty($title)) $errors[] = "Title cannot be empty.";
            if (empty($content)) $errors[] = "Content cannot be empty.";

           
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $image = $_FILES['image'];
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
                
                if (in_array($image['type'], $allowed_types)) {
                    $target_dir = '../uploads/';
                    if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
                    $target_file = $target_dir . uniqid() . '-' . basename($image['name']);
                    
                    if (move_uploaded_file($image['tmp_name'], $target_file)) {
                        $image_url = '/uploads/' . basename($target_file);
                    } else {
                        $errors[] = "Failed to upload image.";
                    }
                } else {
                    $errors[] = "Invalid image type. Please upload a JPEG, PNG, or GIF.";
                }
            }

            
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old_input'] = $_POST;
                header('Location: /my-blog/blog/create');
                exit;
            }

            
            $this->blogModel->createBlog($title, $content, $user_id, $image_url, $is_published, $category, $tags);
            $_SESSION['message'] = "Blog post created successfully!";
            header('Location: /my-blog/blogs');
            exit;
        } else {
            header('Location: /my-blog/blog/create');
            exit;
        }
    }

    public function edit()
    {
        // Authentication check
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error'] = "You need to be logged in to edit a blog post.";
            header('Location: /my-blog/login');
            exit;
        }

        if (isset($_GET['id'])) {
            $blogId = $_GET['id'];
            $blog = $this->blogModel->getBlogById($blogId);

            if ($blog && $_SESSION['user_id'] == $blog['user_id']) {
                include '../views/blog/edit.php';
            } else {
                $_SESSION['error'] = "You do not have permission to edit this blog.";
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
        
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error'] = "You need to be logged in to update a blog post.";
            header('Location: /my-blog/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $blog = $this->blogModel->getBlogById($id);

            if ($blog && $_SESSION['user_id'] == $blog['user_id']) {
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                $is_published = isset($_POST['is_published']) ? 1 : 0;
                $category = trim($_POST['category']);
                $tags = trim($_POST['tags']);
                $image_url = $_POST['existing_image_url'];

                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $image = $_FILES['image'];
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

                    if (in_array($image['type'], $allowed_types)) {
                        $target_dir = '../uploads/';
                        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
                        $target_file = $target_dir . basename($image['name']);
                        
                        if (move_uploaded_file($image['tmp_name'], $target_file)) {
                            $image_url = '/uploads/' . basename($image['name']);
                        }
                    } else {
                        $_SESSION['error'] = "Invalid image type.";
                        header("Location: /my-blog/blog/edit?id=$id");
                        exit;
                    }
                }

                $this->blogModel->updateBlog($id, $title, $content, $image_url, $is_published, $category, $tags);
                $_SESSION['message'] = "Blog post updated successfully!";
                header('Location: /my-blog/blogs');
                exit;
            } else {
                $_SESSION['error'] = "You do not have permission to update this blog.";
                header('Location: /my-blog/blogs');
                exit;
            }
        } else {
            header('Location: /my-blog/blogs');
            exit;
        }
    }

    public function delete()
    {
        
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error'] = "You need to be logged in to delete a blog post.";
            header('Location: /my-blog/login');
            exit;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $blog = $this->blogModel->getBlogById($id);

            if ($blog && $_SESSION['user_id'] == $blog['user_id']) {
                $this->blogModel->deleteBlog($id);
                $_SESSION['message'] = "Blog post deleted successfully!";
                header('Location: /my-blog/blogs');
                exit;
            } else {
                $_SESSION['error'] = "You do not have permission to delete this blog.";
                header('Location: /my-blog/blogs');
                exit;
            }
        } else {
            header('Location: /my-blog/blogs');
            exit;
        }
    }
}
