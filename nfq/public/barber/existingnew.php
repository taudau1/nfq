<?php require_once('../../private/initialize.php'); ?>

<?php
if(isset($_POST['Next']))
{
    $name = $_POST['name']; 
    $surname = $_POST['surname'];   
    $date = $_POST['day'];
    $client = Client::find_by_name_surname($name, $surname);
    $reservation = Reservation::find_by_clientid($client->id);
    echo $reservation->id;
    if($reservation == false)
    {
        redirect_to(url_for('barber/new.php?id=' . h(u($client->barberid)) . '&date=' . h(u($date)) . '&clientid=' . h(u($client->id)) . '&checker=1'));
    }

    if($reservation == true)
    {
        $message = 'This person already has a reservation';
        redirect_to(url_for('barber/index.php?message=' . h(u($message))));
    }
}

$barbers = Barber::find_all();
?>

<html>
<body>

<form action="<?php echo url_for('/barber/existingnew.php')?>" method="post">

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