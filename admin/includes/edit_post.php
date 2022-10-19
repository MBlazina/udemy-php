<?php
if (isset($_GET['p_id'])) {
  $post_to_edit_id = $_GET['p_id'];
}
  $query = "SELECT * FROM posts where post_id=$post_to_edit_id";
  $select_posts_by_id = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
  }
if(isset($_POST['update_post'])){
  

  $post_title = $_POST['post-title'];
  $post_author = $_POST['post-author'];
  $post_category_id = $_POST['post-category'];
  $post_status = $_POST['post-status'];

  $post_image = $_FILES['post-image']['name'];
  $post_image_temp = $_FILES['post-image']['tmp_name'];

  $post_tags = $_POST['post-tags'];
  $post_content = $_POST['post-content'];
  /* $post_date = date('d-m-y');
  $post_comment_count = 4; */

  move_uploaded_file($post_image_temp, "../images/$post_image");

if(empty($post_image)) {
  $query = "SELECT * FROM posts WHERE post_id = $post_to_edit_id ";
  $select_image = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($select_image)) {
    $post_image = $row['post_image'];
  }
}




  $query = "UPDATE posts SET ";
  $query .= "post_title = '$post_title', ";
  $query .= "post_category_id = '$post_category_id', ";
  $query .= "post_date = now(), ";
  $query .= "post_author = '$post_author', ";
  $query .= "post_status = '$post_status', ";
  $query .= "post_tags = '$post_tags', ";
  $query .= "post_content = '$post_content', ";
  $query .= "post_image = '$post_image' ";
  $query .= "WHERE post_id = $post_to_edit_id ";
 
  $update_post = mysqli_query($connection, $query);

  confirmQuery($update_post);
}
?>


<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="post-title">Title</label>
    <input value="<?php echo $post_title ?>" type="text" name="post-title">
  </div>

  <div class="form-group">
    <label for="post-category-id">Category Id</label>
    <select name="post-category" id="">


      <?php
      $query = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection, $query);

      confirmQuery($select_categories);

      while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        if ($cat_id == $post_category_id) {
          echo "<option selected='selected' value='$cat_id'>$cat_title</option>";
        } else {
          echo "<option value='$cat_id'>$cat_title</option>";
        }
      }
      ?>


    </select>
  </div>

  <div class="form-group">
    <label for="post-author">Author</label>
    <input value="<?php echo $post_author ?>" type="text" name="post-author">
  </div>

  <div class="form-group">
    <label for="post-status">Status</label>
    <input value="<?php echo $post_status ?>" type="text" name="post-status">
  </div>

  <div class="form-group">
    <img src="../images/<?php echo $post_image ?>" alt="">
    <input type="file" name="post-image">
  </div>

  <div class="form-group">
    <label for="post-tags">Tags</label>
    <input value="<?php echo $post_tags ?>" type="text" name="post-tags">
  </div>

  <div class="form-group">
    <label for="post-content">Content</label>
    <textarea name="post-content"><?php echo $post_content ?></textarea>
  </div>

  <div class="form-group">
    <input type="submit" name="update_post" value="Publish post">
  </div>

</form>