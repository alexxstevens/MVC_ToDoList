<?php include '../view/header.php'; ?>
<br>
<div id="main">
  <div class="heading">
    <h1 class="heading">Add Product</h1>
  </div><br>
  <form action="." method="GET" id="add_item_form">
    <input type="hidden" name="action" value="add_item" />
    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Category:</label>
    <select class="custom-select my-1 mr-sm-2" name="categoryID">
    <?php foreach ($categories as $category) : ?>
        <option value="<?php echo $category['categoryID']; ?>">
          <?php echo $category['categoryName']; ?>
        </option>
      <?php endforeach; ?>
    </select>
    

    <label class="my-1 mr-2" >Task:</label>
    <input type="text" name="Title" class="form-control" />
    <br>

    <label class="my-1 mr-2" >Description:</label>
    <input type="text" name="Description" class="form-control" />
    <br>

  
    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Add Item" />
    <br>
  </form>

  <div >
  <p id="second"><a href="index.php?action=list_items">Return to To Do List</a></p>
    </div>
   
    <br>

</div>
<?php include '../view/footer.php'; ?>
