<?php require_once('../../private/initialize.php'); ?>

<?php

if(is_post_request())
{
    if(isset($_POST['Yes']))
    {
        $id = $_GET['id'];
        $reservation = Reservation::find_by_id($id);
        $reservation->delete();
        redirect_to(url_for('barber/index.php'));
    }

    else
    {
        redirect_to(url_for('barber/index.php'));
    }
}
$id = $_GET['id'];
$reservation = Reservation::find_by_id($id);

?>

<html>
<body>
<h2> Do You really want to delete this reservation?<h2>

<?php $reservation->date; ?>
<form action="<?php echo url_for('/barber/delete.php?id=' . h(u($id))); ?>" method="post">

<a href=<?php echo url_for('barber/index.php');?>>Back</a>

<dl>
  <input type="submit" name="Yes" value="Yes" />
  <input type="submit" name="No" value="No" />
</form>
</body>
</html>