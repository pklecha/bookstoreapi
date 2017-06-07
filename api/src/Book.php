<?php

/**
 * Created by PhpStorm.
 * User: pawelklecha
 * Date: 07/06/2017
 * Time: 22:40
 */

require_once 'conn.php';

class Book
{
    private $id;
    private $title;
    private $author;
    private $description;
    private $isbn;

    public function __construct()
    {
        $this->id = -1;
        $this->title = "";
        $this->author = "";
        $this->description = "";
        $this->isbn = "";
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function create($conn) {
        if ($this->id == -1) {
            $sql = "INSERT INTO book (title, author, description, isbn) VALUES ('$this->title', '$this->author', '$this->description', '$this->isbn')";
            $result = $conn->query($sql);
            if ($result == true) {
                $this->id = $conn->insert_id;
                return true;
            } else {
                return $conn->error_list;
            }
        }
        return null;
    }

    public function update($conn)
    {
        if ($this->id != -1) {
            $sql = "UPDATE book SET title='$this->title', author='$this->author', description='$this->description', isbn='$this->isbn' WHERE id=" . $this->id;
            $result= $conn->query($sql);
            if ($result == true) {
                $this->id = $conn->insert_id;
                return true;
            } else {
                return $conn->error_list;
            }
        }
        return null;
    }

    public function delete($conn)
    {
        if ($this->id != -1) {
            $sql = "DELETE FROM book WHERE id=" . $this->id;
            $result = $conn->query($sql);
            if ($result == true) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }
    
    static public function loadAll($conn)
    {
        $sql = "SELECT * FROM book";
        $books = [];
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            foreach ($result as $row) {
                $book = new Book();
                $book->id = $row['id'];
                $book->title = $row['title'];
                $book->author = $row['author'];
                $book->description = $row['description'];
                $book->isbn = $row['isbn'];
                $books[] = $book;
            }
            return $books;
        }
        return null;
    }
    
    static public function loadById($conn, $id)
    {
        $sql = "SELECT * FROM book WHERE id=" . $id;
        $result = $conn->query($sql);
        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $book = new Book();
            $book->id = $row['id'];
            $book->title = $row['title'];
            $book->author = $row['author'];
            $book->description = $row['description'];
            $book->isbn = $row['isbn'];

            return $book;
        }
        return null;
    }



}