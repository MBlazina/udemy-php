<table class="table table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Content</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>


  <?php
  if(isset($_GET))
  ?>
    <?php

    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
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

      echo "<tr>";
      echo "<td>$post_id</td>";
      echo "<td>$post_author</td>";
      echo "<td>$post_title</td>";

      $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
      $select_categories = mysqli_query($connection, $query);

      confirmQuery($select_categories);

      while($row = mysqli_fetch_assoc($select_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
      }

      echo "<td>$post_category_id $cat_title</td>";


      echo "<td>$post_status</td>";
      echo "<td><img src='../images/$post_image' style='max-width: 100%'></td>";
      echo "<td>$post_content</td>";
      echo "<td>$post_tags</td>";
      echo "<td>$post_comment_count</td>";
      echo "<td>$post_date</td>";
      echo "<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
      echo "<td><a href='posts.php?delete=$post_id'>Delete</a></td>";
      echo "</tr>";
    }
    ?>

  </tbody>
</table>

<?php
if(isset($_GET['delete'])){
  $post_to_delete = $_GET['delete'];

  $query = "DELETE FROM posts WHERE post_id = $post_to_delete";
  $delete_query = mysqli_query($connection, $query);
}
?>