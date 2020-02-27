<?php
require('../Model/database.php');
require( '../Model/items_db.php');
require('../Model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_items';
    }
}
  
if ($action == 'list_items') {
    $category_ID = filter_input(INPUT_GET, 'categoryID', 
            FILTER_VALIDATE_INT);
    if ($category_ID == NULL || $category_ID == FALSE) {
    $categories = get_categories();
    include '../View/item_add.php';
}
  //Get item and category data
  $category_Name = get_category_name($category_ID);
  $categories = get_categories();
  $items = get_items_by_category($category_ID);

  include '../View/item_list.php';

//Display item list
} else if ($action =='delete_item') {
  //Get the IDs and delete the items
  $item_Num = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
  $category_ID = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
  if ($category_id == NULL || $category_id == FALSE ||
        $product_id == NULL || $product_id == FALSE) {
     $error = "Missing or incorrect product id or category id.";
     include '../Errors/error.php';
  } else { 
      delete_product($item_Num);
      header("Location:  .?categoryID=$category_ID");
  }
  
  //Display the item list page for the current category
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include '../View/item_add.php';
} else if ($action == 'add_item') {
  $category_ID = filter_input(INPUT_POST, 'categoryID', 
            FILTER_VALIDATE_INT);
  $item_Num = filter_input(INPUT_POST, 'ItemNum');
  $title = filter_input(INPUT_POST, 'Title');
  $description = $_POST['Description'];
  if ($category_ID == NULL || $category_ID == FALSE || $item_Num == NULL || 
              $title == NULL || $description == NULL || $description == FALSE) {
          $error = "No Tasks Entered, Please Enter your first Task";
          include '../Errors/error.php';
      } else { 
          add_item($category_ID, $item_Num, $title, $description);
          header("Location: .?categoryID=$category_ID");
      }
} else if ($action == 'show_category_list') {
 $categories = get_categories();
    include '../View/category_list.php';
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Please enter a category name.";
        include '../view/error.php';
    } else {
        add_category($name);
        header('Location: .?action=show_category_list');  // display the Category List page
    }
} else if ($action == 'delete_category') {
    $category_ID = filter_input(INPUT_POST, 'category_ID', 
            FILTER_VALIDATE_INT);
    delete_category($category_ID);
    header('Location: .?action=show_category_list');      // display the Category List page
}
?>






