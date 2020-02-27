<?php

function get_items_by_category ($category_ID) {
  global $db;
  $query = "SELECT * FROM todoitems
             WHERE todoitems.categoryID IN(0,1,2,3,4,5)
             ORDER BY ItemNum";
  $items = $db->query($query);
  return $items;
}

function get_item($item_Num) {
  global $db;
  $query = "SELECT * FROM todoitems
            WHERE ItemNum = '$item_Num'";
  $item = $db->query($query);
  $item = $item->fetch();
  return $item;
}

function delete_items ($item_Num) {
  global $db;
  $query ="DELETE FROM todoitems
           WHERE ItemNum = '$item_Num'";
  $db->exec($query);
}

function add_items ($category_ID, $item_Num, $title, $description) {
  global$db;
  $query = "INSERT INTO todoitems
              (categoryID, ItemNum, Title, Description)
            VALUES
              ('$category_ID', '$item_Num', '$title', '$description')";
  $db->exec($query);
}


?>