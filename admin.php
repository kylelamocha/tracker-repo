<?php
    include 'db.php';
    $month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<br>

<div class="container">
  <h2>AORBTS Admin Page</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" >
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home"><b>Home</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#guest"><b>Guest</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#products"><b>Products</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#category"><b>Category</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#users"><b>Users</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#report"><b>Reports</b></a>
    </li>
    
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>HOME</h3>
      <a href="login.php" >LOGOUT</a><br><br>

      

      
      
    </div>

    <div id="guest" class="container tab-pane fade"><br>
    <!--<h3>Guest List</h3><br>-->

    <h3 style="font-size: 16px;">Guests' that are Currently Time In</h3>
      <table>
      <tr>
      <th style="text-align: center;">Guest No</th>
      <th style="text-align: center;">Guest Name</th>
      <th style="text-align: center;">Time In</th>
      <th style="text-align: center;">Guest Rate</th>
      <th style="text-align: center;">Guest Status</th>
      <th style="text-align: center;">Guest Current Status</th>
      </tr>
       
      <?php
                  include_once 'db.php';
                  $result = mysqli_query($database,"SELECT * FROM guest_tbl");
                  ?>
                  <?php
                    if (mysqli_num_rows($result) > 0) {
                  ?>
                   <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                      $dateString = $row['guest_timein'];
                      $dateObject = new DateTime($dateString);
                    ?>
       <tr>
      <td style="text-align: center;"><?php echo $row['g_id']?? '' ; ?></td>
      <td style="text-align: center;"><?php echo $row['guest_name']?? '' ; ?></td>
      <td style="text-align: center;"><?php echo $dateObject->format('d/m/y h:i A'); ?></td>
      <td style="text-align: center;"><?php echo $row['guest_rate']?? '' ; ?></td>
      <td style="text-align: center;"><?php echo $row['guest_status']?? '' ; ?></td>
      <td style="text-align: center;"><?php echo $row['guest_desc']?? '' ; ?></td>

      <?php
                    $i++;
                    }
                    ?>
                    <?php
                    }
                    else{
                        echo "No guest found";
                    }
                    ?>
       </tr>
       
      </table>

      <br><h3 style="font-size: 16px;">Guests' that are Timed Out</h3>
    <table>
      <tr>
        <th>Guest No</th>
        <th>Guest Name</th>
        <th>Time In</th>
        <th>Time out</th>
        <th>Total Hours</th>
        <th>Guest Rate</th>
        <th>Guest Status</th>
        <th>Guest Current Status</th>
        <th>Additional Fee</th>
        <th>Total</th>
      
      </tr>
      <?php
                  include_once 'db.php';
                  $result = mysqli_query($database,"SELECT * FROM bill");
                  ?>
                  <?php
                    if (mysqli_num_rows($result) > 0) {
                  ?>
                   <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                      $dateString = $row['guest_timein'];
                      $dateString1 = $row['guest_timeout'];
                      $dateObject = new DateTime($dateString);
                      $dateObj = new DateTime($dateString1);
                    ?>

      <tr>
        <td style="text-align: center;"><?php echo $row['g_id']?? '' ; ?></td>
        <td style="text-align: center;"><?php echo $row['guest_name']?? '' ; ?></td>
        <td style="text-align: center;"><?php echo $dateObject->format('d/m/y h:i A'); ?> </td>
        <td style="text-align: center;"><?php echo $dateObj->format('d/m/y h:i A'); ?></td>
        <td style="text-align: center;"><?php echo $row['guest_hrs']?? '' ; ?></td>
        <td style="text-align: center;"><?php echo $row['guest_rate']?? '' ; ?></td>
        <td style="text-align: center;"><?php echo $row['guest_status']?? '' ; ?></td>
        <td style="text-align: center;"><?php echo $row['guest_desc']?? '' ; ?></td>
        <td style="text-align: center;"><?php echo $row['add_fee']?? '' ; ?></td>
        <td style="text-align: center;"><?php echo $row['g_total']?? '' ; ?></td>
      
      <?php
                    $i++;
                    }
                    ?>
                    <?php
                    }
                    else{
                        echo "No guest found";
                    }
                    ?>
      </tr> 
    </table>

    </div>

    <div id="products" class="container tab-pane fade"><br>
      <h3>Products Section</h3>
      <!--<button class="modal-button" href="#myModal3">Add Product</button>-->
      <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Product
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="addProd" method="post" action="add_prod.php" enctype="multipart/form-data">
            <label for="prod_img">Product Image here:</label>
            <input type="file" name="prod_img" accept="image/jpeg" id="prod_img"><br>

            <label for="prod_name">Product Name:</label>
            <input type="text" id="prod_name" name="prod_name" required><br>

            <label for="prod_price">Product Price:</label>
            <input type="text" id="prod_price" name="prod_price" required><br>

            <label for="prod_stock">Product Stock:</label>
            <input type="number" id="prod_stock" name="prod_stock" min="1" required><br>
            
            <label for="prod_category">Product Category:</label>
            <select name="category_id" class="custom-select browser-default"><br><br>
                <?php
                include_once 'db.php';
                $result = mysqli_query($database,"SELECT * FROM category_list");
                ?>
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                <?php
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                ?>
                  <option value="<?php echo $row['ID'] ?>"><?php echo $row['name'] ?></option>
                  <?php
                $i++;
                }
                ?>
                <?php
                }
                else{
                    echo "No result found";
                }
                ?>
                </select>

            <br><br><button type="submit" class="trigger" value="Submit">Add Product</button>
            
            </form>

            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
               </div>-->
            </div>
        </div>
        </div>
    

        <div style="overflow-x:auto;">

        <?php echo $deleteMsg??''; ?>

        <table>
        <tr>
            <th>Product No</th>
            <th>Product Category</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th> 
            
        </tr>

        <?php
                include_once 'db.php';
                $result = mysqli_query($database,"SELECT p.*, c.name as cat FROM products p inner join category_list c on c.id = p.category_id order by prod_ID asc");
        ?>
        <?php
                if (mysqli_num_rows($result) > 0) {
        ?>
        <?php
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                <td><?php echo $row['prod_ID']?? '' ; ?></td>
                <td><?php echo $row['cat'] ?></td>
                <td><img id="display-image" src="./image/<?php echo $row['prod_img']; ?>"></td>
                <td><?php echo $row['prod_name']?? '' ; ?></td>
                <td><?php echo $row['prod_price']??''; ?></td>
                <td><?php echo $row['prod_stock']??''; ?></td>
                <td>
                <a class="btn_edit" href="edit.php?id=<?php echo $row['prod_ID']; ?>"><i class="fa fa-pencil-square-o"></i></a>
                <a class="btn_edit" href="delete.php?id=<?php echo $row['prod_ID']?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                </td>
                </tr>
                <?php
                $i++;
                }
                ?>
                </table>
                <?php
                }
                else{
                    echo "No result found";
                }
                ?>

                </table>
                </div>
                </div>
           
    <div id="category" class="container tab-pane fade"><br>
      <h3>Category List</h3>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
        Add Category
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="addCategory" method="post" action="add_category.php" enctype="multipart/form-data">
              
              <label for="category_id">Category ID:</label>
              <input type="text" id="ID" name="ID" required><br><br>

              <label for="category_name">Category Name:</label>
              <input type="text" id="name" name="name" required><br><br>


              <button type="submit" class="trigger" value="Submit">Add Category</button>
              
            </form>

            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
               </div>-->
            </div>
        </div>
        </div>
        <table>
            <tr>
              <th>Category No</th>
              <th>Category Name</th>
             
              <th>Action</th>
              
            </tr>
            <tr>

                  <?php
                    include_once 'db.php';
                    $result = mysqli_query($database,"SELECT * FROM category_list" );
                  ?>
                  <?php
                    if (mysqli_num_rows($result) > 0) {
                  ?>
                  <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                  ?>

              <td><?php echo $row['ID']?? '' ; ?></td>
              <td><?php echo $row['name']?? '' ; ?></td>
              
              <td><a class="btn_edit" href="edit_category.php?id=<?php echo $row['ID']; ?>"><i class="fa fa-pencil-square-o"></i></a></td>


            </tr>
            <?php
               $i++;
               }
            ?>
        </table>
        <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
    </div>   
    <div id="users" class="container tab-pane fade"><br>
      <h3>Users List</h3>
      <table>
            <tr>
              <th>User No</th>
              <th>User Name</th>
              <th>Password</th>
              <th>Action</th>
              
            </tr>
            <tr>

                  <?php
                    include_once 'db.php';
                    $result = mysqli_query($database,"SELECT * FROM users");
                  ?>
                  <?php
                    if (mysqli_num_rows($result) > 0) {
                  ?>
                  <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                  ?>

              <td><?php echo $row['id']?? '' ; ?></td>
              <td><?php echo $row['username']?? '' ; ?></td>
              <td><?php echo $row['password']?? '' ; ?></td>
              <td><a class="btn_edit" href="edit_user.php?id=<?php echo $row['id']; ?>" ><i class="fa fa-pencil-square-o"></i></a></td>



            </tr>
            <?php
               $i++;
               }
            ?>
        </table>
        <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
    </div>

    <div id="report" class="container tab-pane fade"><br>
    <label for="month">Month</label>
    <div class="col-sm-3">
        <input type="month" name="month" id="month" value="<?php echo $month ?>" class="form-control">
    </div>

    <table class="table table-bordered" id='report-list'>
    <thead>
    <tr>
        <th class="text-center">#</th>
        <th class="">Date</th>
        <th class="">Invoice</th>
        <th class="">Guest Name</th>
        <th class="">Amount</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php
        $i = 1;
        $total = 0;
        $sales = $database->query("SELECT * FROM bill where g_total > 0 and date_format(date_created,'%Y-%m') = '$month' order by unix_timestamp(date_created) asc ");
        if($sales->num_rows > 0):
			    while($row = $sales->fetch_array()):
                $total += $row['g_total'];
			  ?>
      
      <td><?php echo $i++ ?></td>
      <td>
          <p> <b><?php echo date("M d,Y",strtotime($row['date_created'])) ?></b></p>
      </td>
      <td>
           <p> <b><?php echo $row['g_total'] > 0 ? $row['bill_id'] : 'N/A' ?></b></p>
      </td>
      <td>
           <p> <b><?php echo $row['guest_name'] ?></b></p>
      </td>
      <td>
            <p class="text-right"> <b><?php echo number_format($row['g_total'],2) ?></b></p>
      </td>
    </tr>
    <?php 
        endwhile;
        else:
    ?>
     <tr>
        <th class="text-center" colspan="5">No Data.</th>
      </tr>
    <?php 
         endif;
    ?>
			        
    </tbody>
    <tfoot>
      <tr>
         <th colspan="4" class="text-right">Total</th>
          <th class="text-right"><?php echo number_format($total,2) ?></th>
      </tr>
    </tfoot>
    </table>

    <div class="col-md-12 mb-4">
                    <center>
                        <button class="btn btn-success btn-sm col-sm-3" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                    </center>
    </div>
      

      

      
      
    </div>
  </div>
</div>
<noscript>
	<style>
		table#report-list{
			width:100%;
			border-collapse:collapse
		}
		table#report-list td,table#report-list th{
			border:1px solid
		}
        p{
            margin:unset;
        }
		.text-center{
			text-align:center
		}
        .text-right{
            text-align:right
        }
	</style>
</noscript>
<script>
$('#month').change(function(){
    location.replace('admin.php?page=report&month='+$(this).val())
})
$('#print').click(function(){
		var _c = $('#report-list').clone();
		var ns = $('noscript').clone();
            ns.append(_c)
		var nw = window.open('','_blank','width=900,height=600')
		nw.document.write('<p class="text-center"><b>Order Report as of <?php echo date("F, Y",strtotime($month)) ?></b></p>')
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(() => {
			nw.close()
		}, 500);
	})
</script>

<script src="./js/modal.js"></script>

</body>
</html>
