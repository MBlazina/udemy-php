<form action="" method="POST">
  <div class="form-group">
    <label for="cat_title">Edit Category</label>

    <?php
    if (isset($_GET['edit'])) {
      $cat_to_update = $_GET['edit'];
      $query = "SELECT * FROM categories WHERE cat_id = $cat_to_update";

      $edit_query = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($edit_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];


    ?>
        <input type="text" name="cat_title" value="<?php
                                                    if (isset($cat_title)) {
                                                      echo $cat_title;
                                                    }
                                                    ?>">
    <?php
      } /* WHILE */
    } /* ISSET */
    ?>



    <?php
    if (isset($_POST['update_category'])) {
      $cat_title_to_update = $_POST['cat_title'];
      $query = "UPDATE categories SET cat_title = '$cat_title_to_update' WHERE cat_id = $cat_id";
      $update_query = mysqli_query($connection, $query);
      if (!$update_query) {
        die("UPDATE FAILED" . mysqli_error($connection));
      }
    }
    ?>
  </div>
  <div class="form-group">
    <input type="submit" name="update_category" value="Edit Category">
  </div>
</form>