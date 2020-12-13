<?php require_once ("../model/users/users.model.php"); ?>
<?php 

$Users = new User();
$User = $Users->showCategories();
$ListUsers = $User->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="table is-bordered is-striped is-fullwidth">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Firts Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($ListUsers as $ListUser): ?>
          <tr>
            <td><?= $ListUser['id'] ?> </td> 
            <td> <?= $ListUser['username'] ?>  </td> 
            <td><?= $ListUser['user_firtsname'] ?> </td>
            <td> <?= $ListUser['user_lastname'] ?>  </td>
            <td> <?= $ListUser['user_email'] ?></td>
            <td> <?= $ListUser['user_role'] ?> </td>
            <td><a href='/controller/updateUserAdmin.php?change_to_admin=<?= $ListUser['id'] ?>'>ADMIN</a></td>
            <td><a href='/controller/updateUserSubscriber.php?change_to_subscriber=<?= $ListUser['id'] ?>'>Subscriber</a></td>
            <td><a href='/controller/deleteUser.php?delete=<?= $ListUser['id'] ?>'> Delete</a></td>
            <td><a href='users.php?source=edit_user&edit_user=<?= $ListUser['id'] ?>'> Edit</a></td>
          </tr>  
      <?php endforeach; ?>                                                          
  </tbody>
</table>