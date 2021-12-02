<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("./classes/db.class.php");
require_once("./classes/task.class.php");
include_once("./includes/header.php");
$tasks=new Task();
if (isset($_GET["send"])=="del") {
 
  $id=$_GET["id"];
  $tasks->delTask($id);
}
if(isset($_GET['send']) ==='update') {
  $id = $_GET['id'];

  $start_date=date("Y-m-d h:i:s",strtotime($_POST["start_date"]));
  $due_date=date("Y-m-d h:i:s",strtotime($_POST["due_date"]));
  $task_name=$_POST["task_name"];
  $task_description=$_POST["task_description"];
  $tasks->updateTask($id,$task_name, $task_description, $start_date,$due_date);

}


if (isset($_POST["task_name"])&& isset($_POST["task_description"])){

  $start_date=date("Y-m-d h:i:s");
  $due_date=date("Y-m-d h:i:s");
  $task_name=$_POST["task_name"];
  $task_description=$_POST["task_description"];
  if (isset($_POST["start_date"])) {
    $start_date=date("Y-m-d h:i:s",strtotime($_POST["start_date"]));
  }
  if (isset($_POST["due_date"])) {
    $due_date=date("Y-m-d h:i:s",strtotime($_POST["due_date"]));
  }


$tasks->addTask($task_name,$task_description,$start_date,$due_date);

}
?>

<div class="row">
  <div class="col"></div>
<div class="col pl-7">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Add Task
</button>

<!-- Modal -->




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>

      </div>
      <div class="modal-body">
        <form method="post" action="">
          <label>Task Name:*</label>
          <div class="form-group">
            <input type="text" class="form-control" name="task_name"  required>
          </div>

          <label>Task Description:*</label>
          <div class="form-group">
            <input type="text" class="form-control" name="task_description" required >
          </div>

          <label>Start Date:</label>
          <div class="form-group">
            <input type="datetime-local" class="form-control" name="start_date" >
          </div>

          <label>Due Date:</label>
          <div class="form-group">
            <input type="datetime-local" class="form-control" name="due_date" >
          </div>
          <button type="submit" class="btn  btn-primary">Submit</button>

        </form>
      </div>
    
    </div>
  </div>
</div>
</div>

  <div class="col"></div>
</div>

<div class="row pt-4">

<table class="table">
  <thead>
    <tr>
      <th scope="col">task id</th>
      <th scope="col">task name</th>
      <th scope="col">task description</th>
      <th scope="col">start date</th>
      <th scope="col">due date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <?php 
   
    if($tasks->getTask()) {
    foreach($tasks->getTask() as $task) {

  echo "<tbody>";
  echo "<tr>";
  echo "<th scope='row'>".$task["id"]."</th>";
  echo "<td>".$task["task_name"]."</td>";
  echo "<td>".$task["task_description"]."</td>";
  echo "<td>".$task["start_date"]."</td>";
  echo "<td>".$task["due_date"]."</td>";
  echo "<td><a href='editForm.php?id=" . $task['id'] . "' class='btn btn-success'>Edit</a> <a href='index.php?send=del&id=" . $task['id'] . "' class='btn btn-danger'>Delete</a></td>";

  echo "</tr>";
  echo "</tbody>";

}}else {
  echo "<p class='mt-5 mx-auto'>No Tasks ...</p>";
}
  ?>
</table>


</div>



<?php
include_once("./includes/footer.php");

?>