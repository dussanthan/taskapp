<?php
  include 'connect.php';
  $TaskNo=$_GET['updateNo'];
  $sql="Select * from schedule where TaskNo=$TaskNo";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $Title=$row['Title'];
  $Description=$row['Description'];
  $Deadline=$row['Deadline'];



  if(isset($_POST['submit'])){
    
    $Title=$_POST['title'];
    $Description=$_POST['description'];
    $Deadline=$_POST['deadline'];

    $sql="update schedule set TaskNo=$TaskNo,title='$Title',
    description='$Description',deadline='$Deadline' where TaskNo=$TaskNo";

    $result=mysqli_query($con,$sql);
    if($result){
      header("location:display.php");
    }else{
      die(mysqli_error($con));
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Task App</title>
    <style>
       body {
        font-family: var(--font-default);
        color: var(--color-default);
        background-image: url("images/img3.jpg");
        opacity: ;
        }

        label {
            color: White;
            font-size: 25px;
        }
        input[type=text] {
            
            border: 3px solid blue;
            border-radius: 8px;
            padding: 12px 20px;
        }
        input[type=date] {
            
            border: 3px solid blue;
            border-radius: 8px;
            padding: 12px 20px;
        }
        textarea[type=text] {
            
            border: 3px solid blue;
            border-radius: 8px;
        }
        .header {
            padding: 15px;
            text-align: center;
            background: #1abc9c;
            background-image: url("images/img12.AVIF");
            color: white;
            
        }
        footer {
            text-align: center;
            padding: 60px;
            background-color:;
            color: White;
            font-size: 20px;
        }
    </style>
  </head>
 
  <body>
        <div class="header">
             <h1 style="font-size: 40px;">Task Manager</h1>
        </div>

        <div class="container my-5"> 
            <form method="post">
                <div class="form-group">
                    <label for="title" class="form-label">Title :</label>
                    <input type="text" class="form-control" placeholder="Enter your Task" name="title" 
                    autocomplete="off" value=<?php echo $Title; ?>>
                </div>

                <div class="form-group my-1">
                    <label for="Description" class="form-label">Description :</label>
                    <textarea type="text" class="form-control"  rows="3"placeholder="Describe Here" name="description" autocomplete="off" value=<?php echo $Description; ?>></textarea>
                </div>

                <div class="form-group ">
                    <label for="exampleInputPassword1" class="form-label">Deadline :</label>
                    <input type="date" class="form-control" placeholder="" autocomplete="off"
                    name="deadline" value=<?php echo $Deadline; ?>>
                </div>

            <button type="submit" class="btn btn-primary my-3" name="submit">Update</button>
            <button type="submit" class="btn btn-warning my-3" name="back"><a href="display.php">Back</a></button>
            </form>

        </div>

        <div >
         <footer class="footer">Dus@Editz</footer>
        </div>
   
  </body>
</html> 