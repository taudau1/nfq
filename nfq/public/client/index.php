<?php require_once('../../private/initialize.php'); ?>
<html>

<?php if(isset($_GET['message']))
  {
    echo $_GET['message'];
  }?>

<form action="<?php echo url_for('/client/show.php'); ?>" method="post">

<dl>
  <dt>Name</dt>
  <dd><input type="text" name="name" value=""></dd>
</dl>
<dl>
  <dt>Surname</dt>
  <dd><input type="text" name="surname" value=""></dd>
</dl>
  <input type="submit" name="Show" value="Show" />
</form>
</html>