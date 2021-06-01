<?php require_once('connection_database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="css/style.css">  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books Library</title>
  
    <style>
        body{
            /* background: url("img/p9.jpg"); */
            /* background-color:rgba(66, 95, 241, 0.11); */
            background: #111111;
            background-blend-mode: darken;
            /* background-size: cover; */
	        background-position: center;
        }

        table {
                width:960px;
                margin:40px auto;
                background-position:center center;
                
                
            }
            th {
                text-transform: uppercase;
                letter-spacing: 0.1em;
                font-size: 90%;
                border-bottom: 2px solid white;
                border-top: 1px solid white;
                font-family: Georgia, Times, serif; 
                color: yellow;
                
                }
            th, td {
                padding: 7px 10px 10px 10px;
                
                } 
            td{
                height: 50px;
                border-bottom: 2px solid purple;
                font-family: Arial, Verdana, sans-serif; 
                color: white;
            }	
            .add-data:link, .add-data:visited {
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            }

            .add-data:hover, .add-data:active {
            background-color: red;
            }
            .btn a{
                width:300px;
               
                position: relative;
                left:30px;
                top:20px;
            }
            .btn a:link, .btn a:visited {
            background-color:purple;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            }
            .btn a:hover, .btn a:active {
                background-color: red;
            }
            .text-center{
                position: relative;
                left:20%;
            }
    </style>
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#!"><i>Books were my pass to personal freedom.......</i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="view.php">View</a></li>
                    <li class="nav-item"><a class="nav-link" href="add.php">Add</a></li>
                    <li class="nav-item"><a class="nav-link" href="update.php">Update</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class=" btn">
            <a href="add.php" >Add Book Details</a>
        </div>
    </div>
    <?php 
            
            $queryL=" SELECT * FROM book  ";
            $result=mysqli_query($connection,$queryL);
            $count=mysqli_num_rows($result);

            // Display tthe available jobs detail as table
            if($result){ ?>
                <table>
                    <thead>
                        <tr>
                            <th > Book Id</th>
                            <th> Book </th>
                            <th> Author</th>
                            <th> Publishers</th>
                            <th > Date Of Publish  </th>
                            <th > Page Number</th>
                            <th colspan>Delete</th>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                         <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['publisher']; ?></td>
                            <td><?php echo $row['date_of_publish']; ?></td>
                            <td><?php echo $row['page_number']; ?></td>
						    <td>
						        <a href="delete.php?delete=<?php echo $row['id']; ?>" class="delivered_btn add-data" name="delivered">Delete</a>
						    </td>
                        </tr>
                    <?php } ?>
                </table> 
                            
				<?php
                     }if($count<1){
                        echo '<script>alert("Table is empty") </script>';
                        header("Location:index.html");
                    }
    ?>
    <div class="text-center">
         <div id="piechart" style="width: 900px; height:500px;"></div>
    </div>
</body>
</html>
<?php mysqli_close($connection); ?>
