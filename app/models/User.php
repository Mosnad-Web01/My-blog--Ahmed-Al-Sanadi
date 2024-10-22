<?php
class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function signIn($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $user['id'];
                return true;
            }
        }
        return false;
    }

    public function signUp($name, $username, $email, $password)
    {
       
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

       
        $query = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)";
        $stmt = $this->conn->prepare($query);

      
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute(); //returns true or false
    }
}


