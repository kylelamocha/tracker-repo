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
      <a class="nav-link" data-toggle="tab" href="#products"><b>Products</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#category"><b>Category List</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#users"><b>Users</b></a>
    </li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>HOME</h3>
      <a href="login.php">LOGOUT</a>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
  </div>
</div>

<script src="./js/modal.js"></script>

</body>
</html>
