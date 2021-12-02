<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  require_once("./includes/header.php");
  require_once("./classes/db.class.php");

  require_once("./classes/task.class.php");

  $tasks = new Task();

  $task = $tasks->editTask($_GET['id']);
  $id = $task['id'];
  $name = $task['task_name'];
  $decription = $task['task_description'];

  $start_date = $task['start_date'];
  
  $start_date = date("c", strtotime($start_date));
  list($Date)=explode('+', $start_date);
  $start_date = $Date;

  $due_date = $task['due_date'];

  $due_date = date("c", strtotime($due_date));
  list($Date)=explode('+', $due_date);
  $due_date = $Date;

?>

  <div class="text-center my-5">
    <h3>Edit Task</h3>
  </div>
  <div class="row">
    <div class="col-md-7 mx-auto">
      <!-- form input -->
      <form method="POST" action="index.php?send=update&id=<?= $id ?>">
        <div class="form-group">
          <label>Task Name: </label>
          <input class="form-control" name="task_name" type="text" value="<?= $name ?>" required>
        </div>
        <div class="form-group">
          <label>task Description: </label>
          <textarea class="form-control"  name="task_description" rows="8" required><?= $decription ?></textarea>
        </div>
        <div class="form-group">
          <label>Start Date: </label>
          <input class="form-control" name="start_date" type="datetime-local" value="<?= $start_date ?>">
        </div>
        <div class="form-group">
          <label>Due Date: </label>
          <input class="form-control" name="due_date" type="datetime-local" value="<?= $due_date ?>">
        </div>
          <a href="index.php" class="btn btn-secondary">Close</a>
          <button type="submit" class="btn btn-primary">Update post</button>
      </form>
    </div>
  </div>
<?php 
  require_once("./includes/footer.php");
?>