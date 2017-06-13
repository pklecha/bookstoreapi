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
    }
} else {
    die("This page cannot be displayed directly");
}