<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>POS Inventory</title>
    <link rel="stylesheet" href="pos_inventory.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'  rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function show(elementID) {
        var ele = document.getElementById(elementID);
        if (!ele) {
        alert("no such element");
        return;
        }
        var pages = document.getElementsByClassName('home-content');
        for(var i = 0; i < pages.length; i++) {
            pages[i].style.display = 'none';
        }
        ele.style.display = 'block';
        }
    </script>
   </head>
<body>

  <div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-signal-4'></i>
      <span class="logo_name">AORBTS</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" onclick="show('page1');" class="active">
            <i class='bx bxs-dashboard'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#" onclick="show('page2');">
            <i class='bx bxs-food-menu'></i>
            <span class="links_name">Products</span>
          </a>
        </li>
        <li class="log_out">
          <a href="login.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div>
        <input class="btn_report" type="submit" value="Generate Report"/>
      </div>
     
    </nav>
    
    <div class="home-content" id="page1">
        
        <!--<h1 style="padding: 10px 15px;">Main Page</h1>-->

        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Order</div>
              <div class="number">40,876</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bx-cart-alt cart'></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Sales</div>
              <div class="number">38,876</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bxs-cart-add cart two' ></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Profit</div>
              <div class="number">$12,876</div>
              <div class="indicator">
                <i class='bx bx-up-arrow-alt'></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div>
            <i class='bx bx-cart cart three' ></i>
          </div>
    </div>
    <div class="container">
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-1">ID</div>
          <div class="col col-2">Customer Name</div>
          <div class="col col-3">Amount Due</div>
          <div class="col col-4">Payment Status</div>
        </li>
        <li class="table-row">
          <div class="col col-1" data-label="Job Id">42235</div>
          <div class="col col-2" data-label="Customer Name">John Doe</div>
          <div class="col col-3" data-label="Amount">$350</div>
          <div class="col col-4" data-label="Payment Status">Pending</div>
        </li>
        <li class="table-row">
          <div class="col col-1" data-label="Job Id">42442</div>
          <div class="col col-2" data-label="Customer Name">Jennifer Smith</div>
          <div class="col col-3" data-label="Amount">$220</div>
          <div class="col col-4" data-label="Payment Status">Pending</div>
        </li>
        <li class="table-row">
          <div class="col col-1" data-label="Job Id">42257</div>
          <div class="col col-2" data-label="Customer Name">John Smith</div>
          <div class="col col-3" data-label="Amount">$341</div>
          <div class="col col-4" data-label="Payment Status">Pending</div>
        </li>
        <li class="table-row">
          <div class="col col-1" data-label="Job Id">42311</div>
          <div class="col col-2" data-label="Customer Name">John Carpenter</div>
          <div class="col col-3" data-label="Amount">$115</div>
          <div class="col col-4" data-label="Payment Status">Pending</div>
        </li>
      </ul>
    </div>


    </div>

    <div class="home-content" id="page2" style="display:none">
        <!--<h1 style="padding: 5px 10px;">Products Section</h1>-->
        <button class="modal-button" href="#myModal3">Add Product</button>

        <!-- The Modal -->
        <div id="myModal3" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">×</span>
              <h2>Add New Product</h2>
            </div>

            <div class="modal-body">
            <form id="addProd" method="post" action="add_prod.php" enctype="multipart/form-data">
              <label for="prod_img">Product Image here:</label>
              <input type="file" name="prod_img" accept="image/jpeg" id="prod_img"><br><br>

              <label for="prod_name">Product Name:</label>
              <input type="text" id="prod_name" name="prod_name" required><br><br>

              <label for="prod_price">Product Price:</label>
              <input type="text" id="prod_price" name="prod_price" required><br><br>

              <label for="prod_stock">Product Stock:</label>
              <input type="number" id="prod_stock" name="prod_stock" required><br><br> 

              <button type="submit" class="trigger" value="Submit">Add Product</button>
              
            </form>
            </div>
          
          </div>
          </div>

          
          <script src="modal.js"></script>

        <div style="overflow-x:auto;">

        <?php echo $deleteMsg??''; ?>
        
          <table>
            <tr>
              <th>Product No</th>
              <th>Product Image</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Action</th>
            
              
            </tr>

            <?php
                    include_once 'db.php';
                    $result = mysqli_query($database,"SELECT * FROM products");
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
                    <td><img id="display-image" src="./image/<?php echo $row['prod_img']; ?>"></td>
                    <td><?php echo $row['prod_name']?? '' ; ?></td>
                    <td><?php echo $row['prod_price']??''; ?></td>
                    <td><?php echo $row['prod_stock']??''; ?></td>
                    <td>
                    <a class="btn_edit" href="edit.php?id=<?php echo $row['prod_ID']; ?>">Edit</a>
                    <a class="btn_edit" href="delete.php?id=<?php echo $row['prod_ID']?>" onclick="return confirm('Are you sure?')">X</a>
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

  </section>

  <script src="pos.js">
  </script>
  <script src="form_prod.js">
  </script>

</body>
</html>