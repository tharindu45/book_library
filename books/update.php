<?php require_once('connection_database.php'); ?>
<?php 

        if(isset($_POST['update_data'])){
            if(empty($_POST['id'])){
                $errtitle=" Id filed can't empty.Please Enter again.....!";
                header("Location:update.php?err=$errtitle");
            }
            else{
                $id=$_POST['id'];
                $queryL="SELECT * FROM book WHERE id='".$id."'";
                $result=mysqli_query($connection,$queryL);
                $count=mysqli_num_rows($result);
                if($count<1){
                    $errtitle="Id does not match.Please Enter again.....!";
                    header("Location:update.php?err=$errtitle");
                }
                else{

                    $query="SELECT * FROM book WHERE id='".$id."'";
                    $result=mysqli_query($connection,$query);

                    while ($row = mysqli_fetch_array($result)){
                        $title1=$row['title'];
                        $author1=$row['author'];
                        $publishers1=$row['publisher'];
                        $date_of_publish1=$row['date_of_publish'];
                        $page_number1=$row['page_number'];
                    }
                    
                        $title=$_POST['title'];
                        $author=$_POST['author'];
                        $publishers=$_POST['publishers'];
                        $date_of_publish=$_POST['date_of_publish'];
                        $page_number=$_POST['page_number'];

                        if(empty($_POST['title'])){
                            $title=$title1;
                        }

                        if(empty($_POST['author'])){
                            $author=$author1;
                        }

                        if(empty($_POST['publishers'])){
                            $publishers=$publishers1;
                        }
                        
                        if(empty($_POST['date_of_publish'])){
                            $date_of_publish=$date_of_publish1;
                        }
                        if(empty($_POST['page_number'])){
                            $page_number=$page_number1;
                        }

                        $query="UPDATE book SET title='$title',author='$author',publisher='$publishers',date_of_publish='$date_of_publish',page_number='$page_number' WHERE id ='".$id."'";
                        $result=mysqli_query($connection,$query);
                        if($result){
                            header("Location:view.php");
                        }    
                    
                }
            }
            
            
        }	
        
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>

    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background: url("img/p1.jpg");
            background-color:rgba(66, 95, 241, 0.11);
            background-blend-mode: luminosity;
            background-size: cover;
	        background-position: center;
        }
        .add-data-form{
            border-radius: 20px;
            width: 600px;
            position: relative;
            height: 600px;
            top:50px;
            opacity: .9;
            background-color: maroon;
        }
        .add-data-form h1{
            position: relative;
            top: -20px;
            font-size: 20px;
            color: yellow;
        }
        .add-data-form form{
            position: relative;
            color:white;
            width:80%;
            left:20%;
            top:60px;
           
        }
       
        .add-data-form input[type="text"],.add-data-form select{
            width:220px;
            border: none;
            position:relative;
            top:-25px;
            
        }
        .add-data-form input,.add-data-form label,.add-data-form select{
            display: block;
            margin:  auto;
        }
        .add-data-form label{
            display: block;
            position: relative;
            top:1px;
        }
        .add-data-form input[type="submit"]{
            position: relative;
            top:-10px;
            border: none;
            color: white;
            width:100px;
            height: 50px;
            background-color:purple ;
            }
        .error-mess h1{
            font-size: 20px;
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
                    <li class="nav-item"><a class="nav-link " href="view.php">View</a></li>
                    <li class="nav-item"><a class="nav-link " href="add.php">Add</a></li>
                    <li class="nav-item"><a class="nav-link active" href="update.php">Update</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container add-data-form">
        <form action="" method="post">
            <label for="">ID</label>
            <input type="text" name="id"><br>
            <h1>
                <?php if(isset($_GET['err'])){
                    echo $_GET['err'];
                }?>
            </h1>

            <label for="">Book</label>
            <input type="text" name="title" ><br>

            <label for="">Author</label>
            <input type="text" name="author" ><br>

            <label for="">Publishers</label>
            <input type="text" name="publishers" ><br>

            <label for="">Date Of Publish</label>
            <input type="text" name="date_of_publish"><br>

            <label for="">Page section</label>
            <input type="text" name="page_number"><br>

            <input type="submit" name="update_data" value="Update">
        </form>
    </div>
    
    
</body>
</html>