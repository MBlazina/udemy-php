<?php
if(isset($_POST['create_post'])){
  $post_title = $_POST['post-title'];
  $post_author = $_POST['post-author'];
  $post_category_id = $_POST['post-category-id'];
  $post_status = $_POST['post-status'];

  $post_image = $_FILES['post-image']['name'];
  $post_image_temp = $_FILES['post-image']['tmp_name'];

  $post_tags = $_POST['post-tags'];
  $post_content = $_POST['post-content'];
  $post_date = date('d-m-y');
  $post_comment_count = 4;

  move_uploaded_file($post_image_temp, "../images/$post_image");

  $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
  $query .= "VALUES($post_category_id, '$post_title','$post_author', now(), '$post_image', '$post_content','$post_tags','$post_comment_count', '$post_status')";

  $create_post_query = mysqli_query($connection, $query);

 confirmQuery($create_post_query);
}
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="post-title">Title</label>
    <input type="text" name="post-title">
  </div>

  <div class="form-group">
    <label for="post-category-id">Category Id</label>
    <input type="text" name="post-category-id">
  </div>

  <div class="form-group">
    <label for="post-author">Author</label>
    <input type="text" name="post-author">
  </div>

  <div class="form-group">
    <label for="post-status">Status</label>
    <input type="text" name="post-status">
  </div>

  <div class="form-group">
    <label for="post-image">Browse Image</label>
    <input type="file" name="post-image">
  </div>

  <div class="form-group">
    <label for="post-tags">Tags</label>
    <input type="text" name="post-tags">
  </div>

  <div class="form-group">
    <label for="post-content">Content</label>
    <textarea name="post-content"></textarea>
  </div>

  <div class="form-group">
    <input type="submit" name="create_post" value="Publish post">
  </div>

</form>