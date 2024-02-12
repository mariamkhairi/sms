<!DOCTYPE html>
<html>

<head>
  <title>Tripoli Library Book Entry Results</title>
</head>

<body>
  <h1>Tripoli Library Book Entry Results</h1>
  <?php
  require_once $_SERVER["DOCUMENT_ROOT"] . "/library_class/bookphp/Book.php";
  require_once $_SERVER["DOCUMENT_ROOT"] . "/library_class/bookphp/ListBook.php";


  try {

    if (
      !isset($_POST['ISBN']) || !isset($_POST['Author'])
      || !isset($_POST['Title']) || !isset($_POST['Price'])
    ) {
      throw new Exception("<p>You have not entered all the required details.<br />
                        Please go back and try again.</p>");
    }
    // create short variable names
    $isbn = $_POST['ISBN'];
    $author = $_POST['Author'];
    $title = $_POST['Title'];
    $price = $_POST['Price'];
    $price = doubleval($price);
    //create a book object
    $book = new Book($isbn, $author, $title, $price);
    echo ($book->dispaly_book_details());
    //create a list of books object
    ?>
    </p><h2>Tripoli Library Book Entry Results</h2></p>
    <?php
    $listBooks=new ListBooks();
    //display all the books!
    $listBooks->getBooks();

  } catch (Exception $e) {
    //catch exception
    echo '<BR>Message: ' . $e->getMessage();
  } finally {

  }
  ?>
</body>

</html>