<?php
class Books {
    protected $collection_books;
        
    public function __construct($collection_books) {
        $this->collection_books = $collection_books;
    }
        
    public function newBook($bookTitle, $bookCategory, $bookAuthor, $price, $description, $img) {
        // check if the document exists by checking $bookTitle and $bookCategory
        $document = $this->collection_books->findOne([
            "bookTitle"=>$bookTitle,
            "bookCategory"=>$bookCategory],
            ["projection"=>["_id"=>1]]);
        
        // otherwise we just insert a new document
        if(is_null($document)) {
            $insertBook = $this->collection_books->insertOne([
                "bookTitle"=>$bookTitle,
                "bookCategory"=>$bookCategory,
                "bookAuthor"=>$bookAuthor,
                "price"=>$price,
                "description"=>$description,
                "image"=>new MongoDB\BSON\Binary(file_get_contents($img), MongoDB\BSON\Binary::TYPE_GENERIC),
                "created_at"=>new MongoDB\BSON\UTCDateTime()
            ]);
        }
        else {
        // if there is an ObjectId retrieved then we update that document for that specific ObjectId
            $findAndUpdate = $this->collection_books->FindOneAndUpdate([
                "_id"=>new MongoDB\BSON\ObjectId($document->_id)],
                ['$set'=>[
                    "bookTitle"=>$bookTitle,
                    "bookCategory"=>$bookCategory,
                    "bookAuthor"=>$bookAuthor,
                    "price"=>$price,
                    "description"=>$description,
                    "image"=>new MongoDB\BSON\Binary(file_get_contents($img), MongoDB\BSON\Binary::TYPE_GENERIC),
                    "updated_at"=>new MongoDB\BSON\UTCDateTime()
                ]]);
        }
    }
    
    public function display($categ="") {
        if($categ == "") {
            $queryBooks = $this->collection_books->find();
        }
        else {
            $queryBooks = $this->collection_books->find(["bookCategory"=>$categ]);
        }
        
        foreach($queryBooks as $val) {
            $title = (strlen($val->bookTitle) <= 17) ? $val->bookTitle : substr($val->bookTitle, 0, 17) . "...";
            $picture = $val->image;
            echo "<div class='col-md-2' style='width:170px; margin-top:30px;'>
            <img src='data:jpeg;base64,". base64_encode($picture->getData()) ."' width='100%' height='150px'>
            <br>
            <strong>" . $title . "</strong>
            <br>
            <strong> Price: &euro;" . $val->price . "</strong>
            <br>
            <button class='col-md-5 btn btn-danger btn-sm' role='button'>Buy</button>
            <button class='col-md-5 btn btn-info btn-sm' role='button' style='float: right;'>Description</button>
            
            </div>";
        }
    }
}
?>