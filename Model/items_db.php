<?php

function display_all() {
  global $db;
  global $categoryID;
  if ($categoryID == NULL || $categoryID == FALSE) {
  $query = "SELECT * FROM todoitems T
            LEFT JOIN categories C ON T.categoryID = C.categoryID";
  $statement = $db->prepare($query);
  $statement->execute();
  $aitems = $statement->fetchAll();
  $statement->closeCursor();
  return $aitems;
}}

function show_item_by_category($categoryID) {
  global $db;
  global $categoryID;
  if (isset($categoryID)) {
  $query = "SELECT * FROM todoitems T
            LEFT JOIN categories C ON T.categoryID = C.categoryID WHERE T.categoryID = $categoryID";
  $statement = $db->prepare($query);
  $statement->execute();
  $citems = $statement->fetchAll();
  $statement->closeCursor();
  return $citems;}
}

function delete_item($ItemNum) {
  global $db;
  global $ItemNum;
  $query = "DELETE FROM todoitems WHERE ItemNum = :ItemNum";
  $statement = $db->prepare($query);
  $statement->bindValue(':ItemNum', $ItemNum);
  $statement->execute();
  $statement->closeCursor();
}

function add_item($Title, $Description, $categoryID) {
  global $db;
  global $Title;
  global $Description;
  global $categoryID;
  $query = "INSERT INTO todoitems (Title, Description, categoryID) VALUES (:Title, :Description, :categoryID)";
  $statement = $db->prepare($query);
  $statement->bindValue(':Title', $Title);
  $statement->bindValue(':Description', $Description);
  $statement->bindValue(':categoryID', $categoryID);
  $statement->execute();
  $statement->closeCursor();
    }


?>