<?php
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskapp</title>
    <script src="./js/script.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
       
       body {
        font-family: var(--font-default);
        color: var(--color-default);
        background-image: url("images/img6.jpg");
      }

      .header {
        padding: 15px;
        text-align: center;
        background: #1abc9c;
        background-image: url("images/img12.AVIF");
        color: white;
        opacity: ;
        }

      footer {
        text-align: center;
        padding: 110px;
        background-color:;
        color: white;
        font-size: 20px;
        }
 
    </style>
</head>

<body class="d-inline p-0 text-bg-secondary ">
    <div class="header">
        <h1 style="font-size: 40px;">Task Manager</h1>
    </div>

<div class="container my-5">

    <button class="btn btn-primary btn-lg"><a href="user.php" 
        class="text-dark">Add Task</a href="user.php" class="text-light"><span class="position-absolute top-0 start-100 translate-middle badge border border-light  p-2"></span></button>
        <table class="table table-success table-striped table-bordered my-5">
        <thead  class="table-dark">
            <tr>
            <th scope="col">TaskNo</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Deadline</th>
            <th scope="col">Operation</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
         <tbody >

            <?php

                $sql="Select * from schedule";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $TaskNo=$row['TaskNo'];
                        $Title=$row['Title'];
                        $Description=$row['Description'];
                        $Deadline=$row['Deadline'];
                        $status = $row['status'];
                        if ($status != 'In Progress') {
                            $dropdown = "<option selected> Completed </option>
                            <option>In Progress</option>";
                        } else {
                            $dropdown = "<option > Completed </option>
                            <option selected>In Progress</option>";
                        }
                        
                        echo '<tr>
                        <th scope="row">'.$TaskNo.'</th>
                        <td>'.$Title.'</td>
                        <td>'.$Description.'</td>
                        <td>'.$Deadline.'</td>
                        <td>
                        <button class="btn btn-primary"><a href="update.php?updateNo='.$TaskNo.'" class="text-light">Update</a> </button>
                        <button class="btn btn-danger"><a href="delete.php?deleteNo='.$TaskNo.'" class="text-light">Delete</a></button>
                        </td>
                        <td>
                        <select label="Status" onchange="updateStatus(this)">
                            ' . $dropdown . '
                        </select>
                        </td>
                    </tr>';
                    }
                }
            ?>

   
  </tbody>
</table>
    </div>
    <div class="footer">
    <footer class="footer">Dus@Editz</footer>
    </div>
</body>
</html>