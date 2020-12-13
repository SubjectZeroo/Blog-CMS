<form action="/controller/createUser.controller.php" method="post" enctype="multipart/form-data">
  <div class="field">
    <label class="label" for="">Firtsname</label>
    <div class="control">
      <input class="input" name="user_firtsname" type="text">
    </div>
  </div>
  <div class="field">
    <label class="label" for="">Lastname</label>
    <input class="input" name="user_lastname" type="text">
  </div>
  <div class="field">
    <div class="select">
      <select name="user_role" id="user_role">
        <option selected value='0'>Seleccione</option>
        <option value='admin'>admin</option>
        <option value='subcriber'>subcriber</option>
      </select>
    </div>
  </div>
  <div class="field">
    <label class="label" for="username">Username</label>
    <input class="input" name="username" type="text">
  </div>
  <div class="field">
    <label class="label" for="user_email">Email</label>
    <div class="control">
      <input class="input" name="user_email" type="text"></input>
    </div>
  </div>
  <div class="field">
    <label class="label" for="user_password">Password</label>
    <div class="control">
      <input class="input" name="user_password" type="text"></input>
    </div>
  </div>
  <div class="control">
    <input class="button is-link is-success" type="submit" name="create_user" value="Add User">
  </div>
</form>