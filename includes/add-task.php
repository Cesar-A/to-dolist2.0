<?php
	$task = strip_tags($_POST['task']);
	$date = date('Y-m-d');
	$time = time('H:i:s');

	include('connect.php');


	$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
	$mysqli ->query("INSERT INTO task VALUES ('', '$task', '$date', '$time')");

	$query = "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time' ";

	if($result = $mysqli->query($query)) {
		while($row = $result->fetch_assoc()){
			$task_id = $row['id'];
			$task_name = $row['task'];
		}
	}

	$mysqli->close();

	echo '<li><span>'.$task.'</span><img id= ".$id." ,  class="delete-button" width="10px" src="img/close.svg"/></li>';

?>