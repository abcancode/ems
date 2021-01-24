<?php 

require 'conn.php';
session_start();


if( !$_SESSION['u_name']){
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | EMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- nav -->

    <?php require 'nav.php'; ?>

    <!-- nav -->

    <!-- main content -->

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                        <li class="list-group-item"><a href="dash.php">View All Employees</a></li>
                    </ul>
                </div>            
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees List</div>
                    <table class= "table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php 
                            
                            $sql = "SELECT * FROM employees";
                            $result =mysqli_query($conn, $sql);
                    
                            if(mysqli_num_rows($result) > 0) {
                                
                                while($employee = mysqli_fetch_assoc($result)){ ?>

                               <tr>
                                    <td><?php echo $employee['e_id']; ?></td>
                                    <td><?php echo $employee['e_name']; ?></td>
                                    <td><a href="single_employee.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-block btn-xs btn-info">Details</a></td>
                                    <td><a href="single_employee_edit.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-block btn-xs btn-warning">Edit</a></td> 
                                    <td><a href="delete_employee.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-block btn-xs btn-danger">Delete</a></td>                                      
                               </tr>     
                             <?php   }
                            } else {
                                echo "0 results";
                            };
                                     
                 
                        ?>
                    </table>
                </div>                        
            </div>
        </div>
    </div>

    <!-- main content -->


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>