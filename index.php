<?php
// Base class: Book
class Book {
    public $title;
    public $author;
    public $publicationYear;

    // Constructor to initialize common book properties
    public function __construct($title, $author, $publicationYear) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
    }

    // Method to get book details
    public function getDetails() {
        return "Title: {$this->title}, Author: {$this->author}, Year: {$this->publicationYear}";
    }
}

// Derived class: EBook (inherits from Book)
class EBook extends Book {
    public $fileSize;

    // Constructor to initialize EBook specific properties and inherited properties
    public function __construct($title, $author, $publicationYear, $fileSize) {
        parent::__construct($title, $author, $publicationYear);
        $this->fileSize = $fileSize;
    }

    // Override the getDetails method to include file size
    public function getDetails() {
        return parent::getDetails() . ", File Size: {$this->fileSize}MB";
    }
}

// Derived class: PrintedBook (inherits from Book)
class PrintedBook extends Book {
    public $numberOfPages;

    // Constructor to initialize PrintedBook specific properties and inherited properties
    public function __construct($title, $author, $publicationYear, $numberOfPages) {
        parent::__construct($title, $author, $publicationYear);
        $this->numberOfPages = $numberOfPages;
    }

    // Override the getDetails method to include number of pages
    public function getDetails() {
        return parent::getDetails() . ", Pages: {$this->numberOfPages}";
    }
}

// Input handling from web form (simulating input as an array)
$books = [];

// Example input simulation for web-based environment
$bookInputs = [
    ['type' => 'EBook', 'title' => 'The Pragmatic Programmer', 'author' => 'Andrew Hunt', 'year' => 1999, 'sizeOrPages' => 5],
    ['type' => 'PrintedBook', 'title' => 'Clean Code', 'author' => 'Robert C. Martin', 'year' => 2008, 'sizeOrPages' => 464],
    ['type' => 'EBook', 'title' => 'You Don\'t Know JS', 'author' => 'Kyle Simpson', 'year' => 2015, 'sizeOrPages' => 2],
];

// Process the book inputs
foreach ($bookInputs as $input) {
    if ($input['type'] === 'EBook') {
        $books[] = new EBook($input['title'], $input['author'], $input['year'], $input['sizeOrPages']);
    } elseif ($input['type'] === 'PrintedBook') {
        $books[] = new PrintedBook($input['title'], $input['author'], $input['year'], $input['sizeOrPages']);
    }
}

// Example query simulation
$queryIndices = [1, 3]; // Queries based on 1-based index

// Output the details of the books queried
foreach ($queryIndices as $index) {
    $queryIndex = $index - 1; // Convert to 0-based index
    if (isset($books[$queryIndex])) {
        echo $books[$queryIndex]->getDetails() . "<br>";
    }
}
?>
