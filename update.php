<!DOCTYPE html>
<?php 
    include 'db.php';
    $id = (int)$_GET['id'];
    $sql = "select * from tasks where id='$id'";
    $rows = $db-> query($sql);
    $row = $rows->fetch_assoc(); 
    if(isset($_POST['send'])){
        $task = htmlspecialchars($_POST['task']);
        $sql2 = "update tasks set name='$task' where id ='$id'";
        $db->query($sql2);
        header('location: index.php');
    }
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">	
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
	<title>Crud App</title>

</head>
<body>
    <div class="container">              
    	<div class="row">            		
    		<div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <button type="button" class="btn btn-default">Print</button>
                    <hr><br>
                    <form method="post">
                        <div class="form-group">
                            <label>Task name</label>
                            <input type="text" required name="task" value="<?php echo $row['name'];?>" class="form-control">
                        </div>
                            <input type="submit" name="send" value="Add Task" class="btn btn-success">
                            <a href="index.php" class="btn btn-warning" style="margin-left: 10px;">Back</a>
                    </form>
            </div>
    	</div>
    </div>
</body>
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
    crossorigin="anonymous"></script>
</html>