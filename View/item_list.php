<?php
include '../view/header.php'; ?>
<div id="main">


  <div id="category_dropdown">
    <!-- list of categories in dropdown menu -->
    <form action="index.php" method="post" name="action">
    <input type="hidden" name="action" value="categorize
    _items"/>
    <label for="categories">Choose a Task Category:</label>
      <select id="categories" name="categoryID">
        <option value="">Select a category</option>
        <option value="*">View All Categories</option>
       
        <?php foreach($categories as $category) : ?>
        <option value="<?php echo $category['categoryID']; ?>">
        <?php echo $category['categoryName']; ?>
        </option>
        <?php endforeach; ?>
      </select>
      <input type="submit" name="action" value="Show Category" />
    </form>
  </div>



  <div id="content">
    <!-- display to do list -->
    <h2><?php if ( isset($category_Name) ) {  echo $category_Name; } ?></h2>
      <table>
        <tr>
          <th>Category:</th>
          <th>Task:</th>
          <th>Description:</th>
          <th>&nbsp;</th>
        </tr>

        <?php 
        $items = array();
        // if (empty($items)) {
        //   $error = "No tasks entered. To do list empty.";
        // } else {
        foreach($items as $item) : ?>
        <tr>
          <td><?php echo isset($item['categoryName']); ?></td>
          <td><?php echo isset($item['Title']); ?></td>
          <td><?php echo isset($item['Description']); ?></td>
          <td><form action="." method="post">
            <input type="hidden" name="action" value="delete_item"/>
            <input type="hidden" name="ItemNum" value="<?php echo $item['ItemNum'];?>"/>
            <input type="hidden" name="category_ID" value="<?php echo $item['categoryID'];?>"/>
            <input type="submit" value="Delete"/>
          </form></td>
        </tr>

        <?php endforeach; ?>
      </table>
    <p><a href="?action=show_add_form">Add Items to List</a></p>
    <p><a href="?action=show_category_list">View/Edit Categories</a></p>
  </div>
  <?php include '../view/footer.php'; ?>
