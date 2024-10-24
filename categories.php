<?php
 $title = 'Category';
 $page = 'categories';
 include_once('./assets/header.php');
 include_once('./assets/navbar.php');

?>
<body>

<div class="container">
<!--<h3>Category List</h3>-->
<!--button for modal-->
<br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add Category
</button>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              
              <!--<label for="category_id">Category ID:</label>
              <input type="text" id="ID" name="ID" required><br><br>-->

              <label for="category_name">Category Name:</label>
              <input type="text" id="name" name="name" required><br>


              <br><button type="submit" class="btn btn-primary">Add Category</button>
              
            </form>

            </div>
            </div>
        </div>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <!--<th scope="col">Action</th>-->
            </tr>
        </thead>
        <tbody>
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
            <th scope="row"><?php echo $row['ID']?? '' ; ?></th>
            <td><?php echo $row['name']?? '' ; ?></td>
            </tr>
            <?php
               $i++;
               }
            ?>
            <?php
                    }
                    else{
                        echo "No categories found";
                    }
                    ?>
        </tbody>
        </table>

</div>





    
</body>
</html>