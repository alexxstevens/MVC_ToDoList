<?php include '../view/header.php'; ?>
<div id="main">

    <h1>Category List</h1>
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
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>    
    </table>
 
    <h2>Add Category</h2>
    <form action="index.php" method="GET"
          id="add_category_form">
    <input type="hidden" name="action" value="add_category" />
        <label>Name:</label>
        <input type="text" name="categoryName"/>
        <input type="submit" value="Add Category"/>
    </form>
    
    <p><a href="index.php?action=list_items">View To Do List</a></p>

    </main>
<?php include '../view/footer.php'; ?>
