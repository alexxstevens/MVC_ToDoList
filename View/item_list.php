<?php
include '../view/header.php'; ?>
<div id="main">



  <div class="category_dropdown">
    <form action="." method="GET" id="category">
        <select name="categoryID" class="custom-select my-1    mr-sm-2" >
          <option  value="" selected>Choose a task category...</option>
          <?php foreach($categories as $category) : ?>
          <option value="<?php echo $category['categoryID'];?>"><?php echo $category['categoryName']; ?></option>
          <?php endforeach; ?>
          <div class="dropdown-divider"></div>
          <option value="0">View All Categories</option>
        </select>
        <div id="submit">
          <input class="btn btn-primary " type="submit" value="Submit">
        </div>
      </form>

          

  <div id="content">
    <!-- display to do list -->
      <table>
        <tr>
          <th>ID:</th>
          <th>Category:</th>
          <th>Task:</th>
          <th>Description:</th>
          <th>&nbsp;</th>
        </tr>

        <?php if ($categoryID == NULL || $categoryID == FALSE) { 
        foreach($aitems as $aitem) : ?>
        <tr>
          <td><?php echo ($aitem['categoryID']); ?></td>
          <td><?php echo ($aitem['categoryName']); ?></td>
          <td><?php echo ($aitem['Title']); ?></td>
          <td><?php echo ($aitem['Description']); ?></td>
          <td><form action="." method="GET">
            <input type="hidden" name="action" value="delete_item"/>
            <input type="hidden" name="ItemNum" value="<?php echo $aitem['ItemNum'];?>"/>
            <input type="hidden" name="categoryID" value="<?php echo $aitem['categoryID'];?>"/>
            <input type="submit" value="Delete"/>
          </form></td>
        </tr>
        <?php endforeach; } ?>

        <?php if (isset($categoryID)) { 
        foreach($citems as $citem) : ?>
        <tr>
          <td><?php echo ($citem['categoryID']); ?></td>
          <td><?php echo ($citem['categoryName']); ?></td>
          <td><?php echo ($citem['Title']); ?></td>
          <td><?php echo ($citem['Description']); ?></td>
          <td><form action="." method="GET">
            <input type="hidden" name="action" value="delete_item"/>
            <input type="hidden" name="ItemNum" value="<?php echo $citem['ItemNum'];?>"/>
            <input type="hidden" name="categoryID" value="<?php echo $citem['categoryID'];?>"/>
            <input type="submit" value="Delete"/>
          </form></td>
        </tr>
        <?php endforeach; } ?>
      </table>



    <p><a href="?action=show_add_form">Add Items to List</a></p>
    <p><a href="?action=show_category_list">View/Edit Categories</a></p>
  </div>
  <?php include '../view/footer.php'; ?>
