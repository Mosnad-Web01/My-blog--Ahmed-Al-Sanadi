<?php
class Database
{
  // Define constants for database connection
  const DB_HOST = 'localhost';
  const DB_USER = 'root';
  const DB_PASSWORD = '';
  const DB_NAME = 'blog';

  public $conn;

  public function connect()
  {
    $this->conn = null;

    try {
      // Create a new PDO instance
      $this->conn = new PDO("mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME, self::DB_USER, self::DB_PASSWORD);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception) {
      echo "Connection error: " . $exception->getMessage();
    }

    return $this->conn;
  }
}