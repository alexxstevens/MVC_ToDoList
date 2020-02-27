<?php include '../view/header.php'; ?>
<div id="main">
  <h1>Add Product</h1>
  <form action="index.php" method="post" id="add_item_form">
    <input type="hidden" name="action" value="add_item" />

    <label>Category:</label>
    <select name="categoryID">
    <?php foreach ( $categories as $category) : ?>
        <option value="<?php echo $category['categoryID']; ?>">
          <?php echo $category['categoryName']; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <br>

    <label>Task:</label>
    <input type="text" name="Title"/>
    <br>

    <label>Description:</label>
    <input type="text" name="Description"/>
    <br>

    <lavel>&nbsp;</label>
    <input type="submit" value="Add Item"/>
    <br>
  </form>
  <p><a href="index.php?action=list_items">View To Do List</a></p>

</div>
<?php include '../view/footer.php'; ?>
