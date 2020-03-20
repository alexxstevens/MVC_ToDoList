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
    //populate dropdown
    $categories = get_categories();
    $categoryID = filter_input(INPUT_GET, 'categoryID', 
            FILTER_VALIDATE_INT);
    //populate to do list
    $aitems = display_all();
    $citems = show_item_by_category($categoryID);
    include '../View/item_list.php';
//delete items
} else if ($action =='delete_item') {
    $ItemNum = $_GET['ItemNum'];
    if ($ItemNum == NULL || $ItemNum == FALSE) {
        $error = "Missing or incorrect product code.";
        include('../errors/error.php');
    } else {
        delete_item($ItemNum);
        header("Location: .?ItemNum=$ItemNum");}
} else if ($action == 'show_add_form') {
    $categories = get_categories();     
    include '../View/item_add.php';
} else if ($action == 'add_item') {
    $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
    $Title = filter_input(INPUT_GET, 'Title');
    $Description = filter_input(INPUT_GET, 'Description');
    if ($categoryID == NULL || $categoryID == FALSE || $Title == NULL || $Description == NULL || $Description == FALSE) {
        $error = "No Tasks Entered, Please Enter your first Task";
        include '../Errors/error.php';
    } else { 
        add_item($Title, $Description, $categoryID);
        header("Location: .?ItemNum=$ItemNum");}
} else if ($action == 'show_category_list') {
    $categories = get_categories();
    include '../View/category_list.php';
} else if ($action == 'delete_category') {
    $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
    delete_category($categoryID);
    header('Location: .?categoryID=$categoryID');
} else if ($action == 'add_category') {
    $categoryName = filter_input(INPUT_GET, 'categoryName');
    if ($categoryName == NULL) {
        $error = "Please enter a category name.";
        include '../Errors/error.php';
    } else {
        add_category($categoryName);
        header('Location: .?action=show_category_list');  }
    }

 ?>






