<?php
require "./connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $rawData = file_get_contents("php://input");
  $data = json_decode($rawData, true);
  $status = $data['status'];
  $id = $data['id'];


  // Connect to database and prepare query
  $sql = "UPDATE schedule SET status = ? WHERE TaskNo = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param('ss', $status, $id);
  if ($stmt->execute()) {
    echo 'success';
    echo $rawData;
  } else {
    echo 'error: ' . $con->error;
  }

  $conn = null;
}

?>