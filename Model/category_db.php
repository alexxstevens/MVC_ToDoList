<?php


function get_categories() {
  global $db;
  $query = "SELECT * FROM categories 
            ORDER BY categoryID";
  $statement = $db->prepare($query);
  $statement->execute();
  $categories = $statement->fetchAll();
  $statement->closeCursor();
  return $categories;
}

function delete_category($categoryID) {
  global $db;
  global $categoryID;
  $query = "DELETE FROM categories WHERE categoryID = :categoryID";
  $statement = $db->prepare($query);
  $statement->bindValue(':categoryID', $categoryID);
  $statement->execute();
  $statement->closeCursor();
}

function add_category($categoryName) {
  global $db;
  global $categoryName;
  $query = "INSERT INTO categories (categoryName) VALUES (:categoryName)";
  $statement = $db->prepare($query);
  $statement->bindValue(':categoryName', $categoryName);
  $statement->execute();
  $statement->closeCursor();
  }



?>

