<?php require_once('../../private/initialize.php'); ?>

<?php
if(isset($_POST['Next']))
{
    $barberid = $_POST['id'];
    $name = $_POST['name']; 
    $surname = $_POST['surname'];   
    $date = $_POST['day'];
    $id = Client::create_new($name, $surname, $barberid);
    redirect_to(url_for('barber/new.php?id=' . h(u($barberid)) . '&date=' . h(u($date)) . '&clientid=' . $id . '&checker=0'));
}

$barbers = Barber::find_all();
?>

<html>
<body>

<form action="<?php echo url_for('/barber/createnew.php')?>" method="post">


<dl>
  <dt>Barber</dt>
  <dd>
    <select name="id">
      <option value=""></option>
    <?php foreach($barbers as $barber) { ?>
      <option value="<?php echo $barber->id; ?>"><?php echo $barber->name; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<input type="date" name="day">

<dl>
  <dt>Name</dt>
  <dd><input type="text" name="name" value=""></dd>
</dl>

<dl>
  <dt>Surname</dt>
  <dd><input type="text" name="surname" value=""></dd>
</dl>

  <input type="submit" name="Next" value="Next" />
</form>
</body>
</html>