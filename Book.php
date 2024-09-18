<?php

class Book {
    private $title;
    private $author;
    private $year;

    public function __construct($title, $author, $year) {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setYear($year);
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setYear($year) {
        if ($year < 1900 || $year > date('Y')) {
            throw new Exception("Year is out of valid range.");
        }
        $this->year = $year;
    }

    public function getYear() {
        return $this->year;
    }
}

?>
