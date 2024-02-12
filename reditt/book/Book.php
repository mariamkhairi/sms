<?php
include $_SERVER["DOCUMENT_ROOT"] . "/library_class/database/Database.php";
include $_SERVER["DOCUMENT_ROOT"] . "/library_class/database/SqlServices.php";

class Book
{
    private $isbn, $author, $title, $price;

    function __construct($isbn, $author, $title, $price)
    {
        $this->ensureIsValidBookDetails($isbn);
        $this->ensureIsValidBookDetails($author);
        $this->ensureIsValidBookDetails($title);

        $this->isbn = $isbn;
        $this->author = $author;
        $this->title = $title;
        $this->price = $price;
    }
    public function get_book_author(){
        return $this->author;
    }

    public function get_book_title()
    {
        return $this->title;
    }
    public function get_book_isbn()
    {
        return $this->isbn;
    }
    public  function get_book_price(){
        return $this->price;
    }
    public function dispaly_book_details()
    {
        
        $msg = "<p><strong>Title: " . $this->title . "</strong>";
        $msg = $msg . "<br />Author: " . $this->author;
        $msg = $msg . "<br />ISBN: " . $this->isbn;
        $msg = $msg . "<br />Price: " . number_format($this->price, 2) . " LYD </p>";

        echo $msg;
    }
    private function ensureIsValidBookDetails(string $book_value): void
    {
        if (empty(trim($book_value))) {
            throw new InvalidArgumentException(
                (
                    'Book details is Empty, You Must Enter All Book Details'
                )
            );
        }
    }
}