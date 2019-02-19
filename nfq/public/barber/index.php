<?php require_once('../../private/initialize.php'); ?>
<!DOCTYPE html>

<?php

$current_page = $_GET['page'] ?? 1;
$per_page = 5;
$total_count = Reservation::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

if(isset($_POST['Filter']))
{
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $date = isset($_POST['day']) ? $_POST['day'] : '';
  if(isset($name) && $name != "" || isset($date) && $date != "")
  {
    $reservations = Reservation::find_all_by_criteria($date, $name, $order, $per_page, $pagination->offset());
  }

  else
  {
    $reservations = Reservation::find_all($per_page, $pagination->offset());
  }
}
else
{
  if(isset($_GET['message']))
  {
    echo $_GET['message'];
  }
  $reservations = Reservation::find_all($per_page, $pagination->offset());
  if($_GET['check'] != 1)
  {
    $order  = 0;
  }
}

if(isset($_POST['Order']))
{
  if($_GET['order'] == 0)
  {
    $reservations = Reservation::find_all_ord($_GET['order'], $per_page, $pagination->offset());
    $order = 1;
  }

  if($_GET['order'] == 1)
  {
    $reservations = Reservation::find_all_ord($_GET['order'], $per_page, $pagination->offset());
    $order = 0;
  }
  unset($_POST['Order']);
}

?>

<html>
<body>

<form action="<?php echo url_for('/barber/index.php'); ?>" method="post">

<dl>
  <dt>Name</dt>
  <dd><input type="text" name="name" value=""></dd>
</dl>
<input type="date" name="day">
  <input type="submit" name="Filter" value="Filter" />
</form>

<table class="table table-hover">
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Client</th>
        <th>Visit count</th>
        <th>Barber</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>

      </tr>

      <?php foreach($reservations as $reservation) { ?>
        <tr>
          <td><?php echo h($reservation->id); ?></td>
          <td><?php echo h($reservation->date); ?></td>
          <?php $client = Client::find_by_id($reservation->client); ?>
          <td><?php echo h($client->name) . " " . h($client->surname); ?></td>
          <td><?php echo h($client->visit_count); 
          if($client->quantity($client->visit_count) == true)
          {
             echo "(10% OFF)";
          } ?></td>
          <?php $barber = Barber::find_by_id($client->barberid); ?>
          <td><?php echo h($barber->name); ?></td>
          <td><a class="action" href="<?php echo url_for('/barber/delete.php?id=' . h(u($reservation->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
     <form action="<?php echo url_for('/barber/index.php?order=' . h(u($order)) . "&check=1"); ?>" method="post">
  <input style="float:right" type="submit" name="Order" value="Order" />
</form>
  	</table>

    <?php
$url = url_for('/barber/index.php');
echo $pagination->page_links($url);
?>
<a style="float: right" href="<?php echo url_for('index.php')?>">Back</a>
<form action="<?php echo url_for('/barber/createnew.php'); ?>" method="post">
  <input type="submit" value="Create new client reservation" />
</form>

<form action="<?php echo url_for('/barber/existingnew.php'); ?>" method="post">
  <input type="submit" value="Create reservation" />
</form>
</body>
</html>