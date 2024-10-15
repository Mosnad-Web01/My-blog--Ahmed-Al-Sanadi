<?php
class Blog
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // fetch all blogs
    public function getAllBlogs()
    {
        $query = "SELECT * FROM blogs ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // create a new blog post
    public function createBlog($title, $content, $user_id, $image_url, $is_published, $category, $tags)
    {
        $query = "INSERT INTO blogs (title, content, user_id, image_url, is_published, category, tags, created_at, updated_at) 
                  VALUES (:title, :content, :user_id, :image_url, :is_published, :category, :tags, NOW(), NOW())";
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':is_published', $is_published, PDO::PARAM_BOOL);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':tags', $tags);

        $stmt->execute(); // Return true if successful
    }

    public function getBlogById($id)
    {
        $query = "SELECT * FROM blogs WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateBlog($id, $title, $content, $image_url, $is_published, $category, $tags)
    {
        $query = "UPDATE blogs SET title = :title, content = :content, image_url = :image_url, 
              is_published = :is_published, category = :category, tags = :tags, updated_at = NOW() 
              WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':is_published', $is_published, PDO::PARAM_BOOL);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':tags', $tags);
        $stmt->execute();
    }
public function deleteBlog($id)
{
    $query = "DELETE FROM blogs WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}
}