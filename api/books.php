<?php
/**
 * Created by PhpStorm.
 * User: pawelklecha
 * Date: 07/06/2017
 * Time: 22:40
 */

require_once 'src/conn.php';
require_once 'src/Book.php';

if (isset($_SERVER['HTTP_THIS_IS_AJAAAAAX'])) {
    # LOAD ALL BOOKS
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && empty($_GET['id'])) {
        $books = Book::loadAll($conn);
        $list = [];
        foreach ($books as $book) {
            $list[$book->getId()] = $book->getTitle();
        }
        echo json_encode($list);
    # LOAD SINGLE BOOK DETAILS
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['id'])) {
        $book = Book::loadById($conn, $_GET['id']);
        echo json_encode($book);
    # ADD BOOK
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errorMessage = [];
        if (empty($_POST['add-title'])) {
            $errorMessage["title-validation"] = "Title not provided";
        }
        if (empty($_POST['add-author'])) {
            $errorMessage["author-validation"] = "Author not provided";
        }
        if (empty($_POST['add-isbn'])) {
            $errorMessage["isbn-validation"] = "ISBN not provided";
        }
        if (empty($_POST['add-description'])) {
            $errorMessage["description-validation"] = "Description not provided";
        }
        if (empty($errorMessage)) {
            $book = new Book();

            $book->setTitle($conn->real_escape_string($_POST['add-title']));
            $book->setAuthor($conn->real_escape_string($_POST['add-author']));
            $book->setIsbn($conn->real_escape_string($_POST['add-isbn']));
            $book->setDescription($conn->real_escape_string($_POST['add-description']));

            $book->create($conn);
            echo "Success";

        } else {
            echo json_encode($errorMessage);
        }
    # DELETE BOOK
    } else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $id = intval(file_get_contents('php://input'));
        if ($book = Book::loadById($conn, $id)) {
            if ($book->delete($conn)) {
                echo "Success";
            } else {
                echo $conn->error;
            }
        } else {
            echo $conn->error;
        }
    # UPDATE BOOK
    } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        parse_str(file_get_contents('php://input'), $data);
        $id = $data['id'];
        $title = $data['add-title'];
        $author = $data['add-author'];
        $isbn = $data['add-isbn'];
        $description = $data['add-description'];

        $errorMessage = [];
        if (empty($title)) {
            $errorMessage["title-validation"] = "Title not provided";
        }
        if (empty($author)) {
            $errorMessage["author-validation"] = "Author not provided";
        }
        if (empty($isbn)) {
            $errorMessage["isbn-validation"] = "ISBN not provided";
        }
        if (empty($description)) {
            $errorMessage["description-validation"] = "Description not provided";
        }

        if (empty($errorMessage)) {
            if ($book = Book::loadById($conn, $id)) {
                $book->setTitle($conn->real_escape_string($title));
                $book->setAuthor($conn->real_escape_string($author));
                $book->setIsbn($conn->real_escape_string($isbn));
                $book->setDescription($conn->real_escape_string($description));

                if ($book->update($conn)) {
                    echo "Success";
                } else {
                    $errorMessage[] = $conn->error;
                    echo json_encode($errorMessage);
                }
            } else {
                $errorMessage[] = $conn->error;
                echo json_encode($errorMessage);
            }
        } else {
            echo json_encode($errorMessage);
        }
    }
} else {
    die("This page cannot be displayed directly");
}