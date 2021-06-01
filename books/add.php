<?php require_once('connection_database.php'); ?>
<?php 
if(isset($_POST['add']))
    {
        
        $title=$_POST['title'];
        $author=$_POST['author'];
        $publishers=$_POST['publishers'];
        $date_of_publish=$_POST['date_of_publish'];
        $page_number=$_POST['page_number'];

        if(empty($_POST['title'])){
            $errtitle="Book field can't empty....!";
            header("Location:add.php?err=$errtitle");
        }
         else if(empty($_POST['author'])){
            $errtitle="Author field can't empty.....!";
            header("Location:add.php?err=$errtitle");
        }
        else if (empty($_POST['publishers'])){
            $errtitle="Publisher field can't empty....!";
            header("Location:add.php?err=$errtitle");
        }
        else if(empty($_POST['date_of_publish'])){
            $errtitle="date of publish field can't empty....!";
            header("Location:add.php?err=$errtitle");
        }
        else if(empty($_POST['page_number'])){
            $errtitle="page number of publish field can't empty....!";
            header("Location:add.php?err=$errtitle");
        }
        else{
            
        $query="INSERT INTO book(title,author,publisher,date_of_publish,page_number)
        VALUES('$title','$author','$publishers','$date_of_publish','$page_number')";
            $result=mysqli_query($connection,$query);
            if($result){
                header("Location:view.php");
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
    <title>Add Data</title>

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
                    <li class="nav-item"><a class="nav-link active" href="add.php">Add</a></li>
                    <li class="nav-item"><a class="nav-link" href="update.php">Update</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container add-data-form">
        <form action="" method="post">
        <div class="error-mess" style="color:yellow ">
            <h1>
                <?php if(isset($_GET['err'])){
                    echo $_GET['err'];
                }?>
            </h1>
        </div>
        <form action="">
            <label for="">ID</label>
            <?php 
                $queryL=" SELECT max(id) FROM book  ";
                $result=mysqli_query($connection,$queryL);
            ?>
            <input type="text" name="id" value="Automatically Update">

            <label for="">Book</label>
            <input type="text" name="title" ><br>

            <label for="">Author</label>
            <input type="text" name="author" ><br>

            <label for="">Publishers</label>
            <input type="text" name="publishers" ><br>

            <label for="">Date Of Publish</label>
            <input type="text" name="date_of_publish"><br>

            <label for="">Page Section</label>
            <input type="text" name="page_number"><br>

            <input type="submit" name="add" value="Add">
        </form>
    </div>
    
    
</body>
</html>