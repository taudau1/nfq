<?php require_once('../../private/initialize.php'); ?>

<?php
if(isset($_POST['Next']))
{
    $barberid = $_POST['id'];
    $name = $_POST['name']; 
    $surname = $_POST['surname'];   
    $date = $_POST['day'];
    $client = Client::find_by_name_surname($name, $surname);
    if($client == true)
    {
        $reservation = Reservation::find_by_clientid($client->id);
        if($reservation == false)
        {
            redirect_to(url_for('client/new.php?id=' . h(u($client->barberid)) . '&date=' . h(u($date)) . '&clientid=' . h(u($client->id)) . '&checker=1'));
        }

        if($reservation == true)
        {
            $message = 'This person already has a reservation';
            redirect_to(url_for('client/index.php?message=' . h(u($message))));
        }

    }
    if($client == false)
    {
        $id = Client::create_new($name, $surname, $barberid);
        redirect_to(url_for('client/new.php?id=' . h(u($barberid)) . '&date=' . h(u($date)) . '&clientid=' . $id . '&checker=0'));
    }
}

$barbers = Barber::find_all();
?>

<html>
<body>

<form action="<?php echo url_for('/client/create.php')?>" method="post">


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