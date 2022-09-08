<?php
include "includes/admin_header.php";
?>


<div id="wrapper">
  <!-- Navigation -->
  <?php
  include "includes/admin_navigation.php";
  ?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome to admin
            <small>Author</small>
          </h1>
          <div class="col-xs-6">
            <form action="">
              <div class="form-group">
                <label for="cat_title">Add Category</label>
                <input type="text" name="cat_title">
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Add Category">
              </div>
            </form>
          </div><!-- Add category form -->
          
          <div class="col-xs-6">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Category</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>aaaa</td>
                  <td>bbbb</td>
                  <td>cccc</td>
                  <td>dddd</td>
                </tr>
              </tbody>
            </table>
          </div>









        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
  <?php
  include "includes/admin_footer.php";
  ?>
</div>
<!-- /#wrapper -->