<?php
require_once('../../../private/initialize.php');

// Set default values for all variables the page needs.
$errors = array();

if (is_post_request()) {
  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $territory['name'] = $_POST['name']; }
  if(isset($_POST['position'])) { $territory['position'] = $_POST['position']; }
  if(isset($_POST['state_id'])) { $territory['state_id'] = $_POST['state_id']; }

  $result = insert_territory($territory);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('./show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New Territory'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../states/show.php?id=<?php echo $_GET['state_id']; ?>">Back to State Details</a><br />

  <h1>New Territory</h1>
  <?php echo display_errors($errors); ?>

  <form action="./new.php" method="post">
    Territory Name:<br />
    <input type="text" name="name" value="<?php echo $territory['name']; ?>" /><br />
    Territory Position:<br />
    <input type="text" name="position" value="<?php echo $territory['position']; ?>" /><br />
    <input type='hidden' name='state_id' value='<?php echo $_GET['state_id'];?>'/>
    <input type="submit" name="submit" value="Create"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
