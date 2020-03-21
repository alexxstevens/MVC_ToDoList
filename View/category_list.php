<?php include '../view/header.php'; ?>
<div id="main">
    <br>

    <div class="heading">
    <h1 class="heading">Category List</h1>
  </div><br>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>        
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="index.php" method="GET">
                    <input type="hidden" name="action" value="delete_category"/>
                    <input type="hidden" name="categoryID"
                    value="<?php echo $category['categoryID']; ?>"/>
                    <input class="delete" type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>    
    </table>
 <br><br>
    <div class="heading">
    <h2 class="heading">Add Category</h2>
  </div><br>
    <form action="index.php" method="GET"
          id="add_category_form">
    <input type="hidden" name="action" value="add_category" />
        <label class="my-1 mr-2">Name:</label>
        <input type="text" name="categoryName" class="form-control"/><br>
        <input class="btn btn-primary btn-lg btn-block"  type="submit" value="Add Category"/>
    </form>
    <br>
    <p id="second"><a href="index.php?action=list_items">Return to To Do List</a></p>
<br>
    </main>
<?php include '../view/footer.php'; ?>
