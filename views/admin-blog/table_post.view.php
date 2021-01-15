<?php require('partials/head-admin.php'); ?>
<div class="column is-12">
  <h1 class="title">Post Table</h1>
  <form action="/controller/updatePostStatus.php" method="post">
    <div class="table-container">
        <table class="table is-bordered is-striped is-fullwidth ">
            <div class="columns">
              <div id="bulkOptionsContainer" class="column is-2">
                <div class="select">
                  <select class="" name="bulk_options" id="">
                    <option value="">Select Options</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                    <option value="delete">Delete</option>
                  </select>
                </div>
              </div>
              <div class="column is-3">
                <input type="submit" name="submit" class="button is-primary" value="Apply">
                <a href="add_post.php" class="button is-success">Add New</a>
              </div>
            </div>
            <thead>
              <tr class="th is-selected">
                <th>#</th>
                <th> <abbr title="Id">Id</th>
                <th>Users</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <!-- <th>Image</th> -->
                <th>Tags</th>
                <!-- <th>Comments</th> -->
                <th>Date</th>
                <th>Acciones</th>
              
              </tr>
            </thead>
            <tbody>
              <?php foreach ($posts as $post): ?>
              <tr>
                <td>
                  <input class='checkbox' id='selectAllBoxes' type='checkbox' name='checkBoxArray[]' value='<?= $post->post_id ?>'>
                </td>
                <td><?= $post->post_id  ?></td>
                <td><?= $post->username ?> </td>
                <td><?= $post->post_title  ?></td>
                <td><?= $post->category_title ?></td>
                <td><?= $post->post_status  ?></td>
                <td><?= $post->post_tags  ?></td>
                <td><?= $post->post_date ?></td>      
                <td class="is-centered">
                  <a href='posts.php?source=edit_post&p_id=<?= $post->post_id ?>'><i class="fas fa-edit has-text-success"></i></a>
                  <a href='/post.php?p_id=<?= $post->post_id ?>'><i class="far fa-eye has-text-info"></i></a>
                  <a onClick="javascript: return confirm('Are you sure yo want yo delete')" href='/controller/deletePost.controller.php?delete=<?= $post->post_id ?>'> <i  class="fas fa-trash has-text-danger"></i></a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
  </form>
</div>
<?php require('partials/footer-admin.php'); ?>