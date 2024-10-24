<?php
 $title = 'Menu Section';
 $page = 'Menu';
 include_once('./assets/header.php');
 include_once('./assets/navbar.php');

?>
<body>

<div class="container">
<!--<h3>Menu Section</h3>-->
    <br>
    <!--button for modal-->
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

            <label for="code">Product Code:</label>
            <input type="text" id="code" name="code" required><br>
            
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

            <!--<button type="submit" class="trigger" value="Submit">Add Product</button>-->
            <br><br><button type="submit" class="btn btn-primary">Add Product</button>
            
            </form>

            </div>
            </div>
        </div>
        </div>

        <br><br>
        <form method="POST" action="">
				<div class="form-inline">
					<label>Category:</label>
					<select class="form-control" name="category">
						<option value="Caffeinated Drinks">Caffeinated Drinks</option>
						<option value="Non-Caffeinated Drinks">Non-Caffeinated Drinks</option>
					
					</select>
					<button class="btn btn-primary" name="filter">Filter</button>
                    <br>
					<button class="btn btn-success" name="reset">Reset</button>
				</div>
			</form>
        <!--<input type="submit" name="submit" value="Submit"> -->


        <!--<option selected>Categories</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>-->

        

        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Code</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <!--<th scope="col">Stock</th>-->
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
		   <?php include'filter.php'?>
        </tbody>
       
        
        </table>


</div>





    
</body>
</html>