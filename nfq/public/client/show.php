<?php require_once('../../private/initialize.php'); ?>
<?php
if(isset($_POST['Show']))
{
   $clients =  Client::find_by_name_surname($_POST['name'], $_POST['surname']);
   $reservation = Reservation::find_by_clientid($clients->id);
   echo "Your reservation:" . $reservation->date;
}
if(isset($_POST['Yes']))
{
   $id = $_GET['id'];
   $reservation = Reservation::find_by_id($id);
   $reservation->delete();
   redirect_to(url_for('index.php'));
}
?>


<h2>You want to delete it?</h2>
<form action="<?php echo url_for('/client/show.php?id=' . $reservation->id); ?>" method="post">
  <input type="submit" name="Yes" value="Yes" />
</form>