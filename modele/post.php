<?php

 class Post {

     public $conn;

     private $table='posts';

      public $id;

      public $category_id ;

      public  $category_name;

      public  $author ;

       public  $title;

       public $created_at ;

         public  $body ;



         //Initialiser la connexion

         public function __construct($db){

           $this->conn=$db ;

          }
     /**
      * @return mixed
      */
     //Read Post
     public function read() {
         // Create query
         $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
                                FROM posts p
                                LEFT JOIN
                                  categories c ON p.category_id = c.id
                                ORDER BY
                                  p.created_at DESC';

         // Prepare statement
         $stmt = $this->conn->prepare($query);

         // Execute query
         $stmt->execute();

         return $stmt;
     }

     // Get Single Post
     public function read_single() {
         // Create query
         $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
                                    FROM ' . $this->table . ' p
                                    LEFT JOIN
                                      categories c ON p.category_id = c.id
                                    WHERE
                                      p.id = ?
                                    LIMIT 0,1';

         // Prepare statement
         $stmt = $this->conn->prepare($query);

         // Bind ID
         $stmt->bindParam(1, $this->id);

         // Execute query
         $stmt->execute();

         $row = $stmt->fetch(PDO::FETCH_ASSOC);

         // Set properties
         $this->title = $row['title'];
         $this->body = $row['body'];
         $this->author = $row['author'];
         $this->category_id = $row['category_id'];
         $this->category_name = $row['category_name'];
     }

     public function create(){

         $query='INSERT INTO posts SET title=:title, body=:body,author=:author,
                  category_id=:category_id';

         $requeteprepare = $this->conn->prepare($query);

         $this->title = htmlspecialchars(strip_tags($this->title));
         $this->body = htmlspecialchars(strip_tags($this->body));
         $this->author = htmlspecialchars(strip_tags($this->author));
         $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        // $stmt->bindParam(':category_name', $this->category_name);

         $requeteprepare->bindParam(':title', $this->title);
         $requeteprepare->bindParam(':body', $this->body);
         $requeteprepare->bindParam(':author', $this->author);
         $requeteprepare->bindParam(':category_id', $this->category_id);

            if($requeteprepare->execute()){

                return true ;
            }
            else{
                printf("Error FATY: %s.\n", $requeteprepare->error);

                return  false ;
            }

     }

     public function update(){


         $requete=' UPDATE posts SET title= :title,body= :body,author=:author,category_id=:category_id WHERE id=:id';


         $requeteprepare = $this->conn->prepare($requete);

         //recuperation des valeurs saisies par le client

         $this->title = htmlspecialchars(strip_tags($this->title));
         $this->body = htmlspecialchars(strip_tags($this->body));
         $this->author = htmlspecialchars(strip_tags($this->author));
         $this->category_id = htmlspecialchars(strip_tags($this->category_id));
         $this->id = htmlspecialchars(strip_tags($this->id));

         //modification effectuee

         $requeteprepare->bindParam(':title', $this->title);
         $requeteprepare->bindParam(':body', $this->body);
         $requeteprepare->bindParam(':author', $this->author);
         $requeteprepare->bindParam(':category_id', $this->category_id);
         $requeteprepare->bindParam(':id', $this->id);

       if($requeteprepare->execute()){
           return true ;
       }
    else
    {
        printf("Error FATY: %s.\n", $requeteprepare->error);

        return  false ;
    }

     }

     public function delete(){


         $requete= 'DELETE FROM '.$this->table.' WHERE id=:id';

       ///  Log::debug('An informational message.');

         $prepare=$this->conn->prepare($requete);

         //recuperation de lid

         $this->id=htmlspecialchars(strip_tags($this->id));

         $prepare->bindParam(':id',$this->id);

         if($prepare->execute()){

             return true ;
         }
         else
         {
             printf("Error : %s.\n", $prepare->error);

             return  false ;
         }

     }

 }