<?php require_once('../../private/initialize.php'); ?>
<?php
    $barberid = $_GET['id']; 
    $date = $_GET['date'];
    $clientid = $_GET['clientid'];
    $reservations = Reservation::find_by_date_and_barber($date, $barberid);
    $checker = $_GET['checker'];
    if(isset($_POST['Finish']))
    {
        $barberid = $_GET['id']; 
    $date = $_GET['date'];
    $clientid = $_GET['clientid'];
    $hour = $_POST['hour'];
    $minute = $_POST['minute'];
    $checker = $_GET['checker'];
    if($checker == 0)
    {
      Reservation::create($date, $hour, $minute, $clientid);
    }

    if($checker == 1)
    {
      $client = Client::find_by_id($clientid);
      Client::visit($clientid, $client->visit_count+1);
      Reservation::create($date, $hour, $minute, $clientid);
    }
        
        redirect_to(url_for('barber/index.php'));
    }
?>

<?php 
echo "These times are taken the chosen day " . $date .  ":" . "<br>";
foreach($reservations as $reservation)
{
    echo $reservation->hour . ":" . $reservation->minute . "<br>";
}
?>

<html>
<form action="<?php echo url_for('/barber/new.php?date=' . (h(u($date))) . '&clientid=' . h(u($clientid)) . '&checker=' . h(u($checker)))?>" method="post">
<dl>
  <dt>Hour</dt>
  <dd>
    <select name="hour">
      <option value=""></option>
    <?php foreach(Reservation::hours as $hour) { ?>

      <option value="<?php echo $hour; ?>"><?php echo $hour; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Minute</dt>
  <dd>
    <select name="minute">
      <option value=""></option>
    <?php foreach(Reservation::minutes as $minute) { ?>

      <option value="<?php echo $minute; ?>"><?php echo $minute; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>


  <input type="submit" name="Finish" value="Finish" />
</form>
<html>