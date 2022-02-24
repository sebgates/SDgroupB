<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Add Record</h1>
        <form class="form-control" action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label class="form-label">Category:</label>
            <select class="form-select" name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label class="form-label">Name:</label>
            <input class="form-control" type="input" name="name" >
            <br>

            <label class="form-label">List Price:</label>
            <input class="form-control" type="input" name="price"">
            <br>        
            
            <label class="form-label">Image:</label>
            <input class="form-control" type="file" name="image" accept="image/*" />
            <br>
            
            <label>&nbsp;</label>
            <input class="form-control btn btn-success" type="submit" value="Add Record">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>