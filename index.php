<!DOCTYPE html>
<?php 
    include 'db.php';
    $page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
    $perPage = (isset($_GET['per-page']) && (int)$_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5);
    $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
    $sql = "select * from tasks limit ".$start." , ".$perPage." ";
    $total = $db->query("select * from tasks")->num_rows;
    $pages = ceil($total / $perPage);
    $rows = $db-> query($sql);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">	
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" 
    crossorigin="anonymous">
	<title>Crud App</title>

</head>
<body>
    <div class="container">              
    	<div class="row">            		
    		<div class="col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Add Task</button>
                    <button type="button" class="btn btn-default" onclick="print()">Print</button>
                    <hr><br>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Task</h4>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="add.php">
                                <div class="form-group">
                                    <label>Task name</label>
                                    <input type="text" required name="task" class="form-control">
                                </div>
                                <input type="submit" name="send" value="Add Task" class="btn btn-success">
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <thead>
                      <tr>
                        <th>.ID</th>
                        <th>Task</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php while ($row = $rows-> fetch_assoc()): ?>    
                        <th><?php echo $row['id'] ?></th>
                        <td class="col-md-10"><?php echo $row['name'] ?></td>
                        <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                      </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <ul class="pagination">
                    <?php for($i = 1 ; $i <= $pages; $i++): ?>
                    <li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>                   
                    <?php endfor; ?>
                </ul>                  
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