<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>
        Main Page
    </title>

</head>
<body>


    <nav>
        <a href="#home"><i class="fa fa-home"></i></a>
        <a href="#order"><i class="fas fa-hamburger"></i></a>
        <!--<a href="#billing"><i class="fas fa-money-bill"></i></a>-->
        <!--<a href="#fourth"><i class="far fa-address-card"></i></a>-->
    </nav>
       
     <div class= 'container'> 
       <section id= 'home'>

         <!--<h1>Home</h1>-->

         <div style="overflow-x:auto;">

          <!--<h1>Home</h1>-->
          
          <!--button for modal 1-->
          <!--<button class="add_guest" href="#myModal1">Add Guest</button>-->
          <button class="modal-button" href="#myModal1">Add New Guest</button>
          <a href="login.php" class="logout">Logout</a>

           <!-- The Modal -->
            <div id="myModal1" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">×</span>
                <h2>Add New Guest</h2>
              </div>

              <div class="modal-body">
              <form id="addGuestForm" method="post" action="addguest.php">
                <label for="guestName">Guest Name:</label>
                <input type="text" id="guest_name" name="guest_name" required><br><br>
              
              <label for="guest_timein">Enter guest time-in:</label>
              <input type="datetime-local" id="guest_timein" name="guest_timein" required><br><br>

                <label for="guest_status">Guest Status:</label>
                <select id="guest_status" name="guest_status">
                  <option value="Regular">Regular</option>
                  <option value="Student">Student</option>
                </select><br><br>

                <label for="guest_rate">Rate (by guest's status):</label>
                <input type="text" id="guest_rate" name="guest_rate" min="0" required><br><br>

                <button type="submit" class="trigger" value="Submit">Add Guest</button>
                
              </form>
               </div>
             
            </div>
            </div>
           
            

          <table>
          
            <tr>
           
              <th>Guest No.</th>
              <th>Guest Name</th>
              <th>Guest Date and Time In</th>
              <th>Guest Status</th>
              <th>Rate</th>
              <th>Action</th>
              
              <!--<th>Billing</th> -->
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
                      //echo $dateObject->format('h:i A');

                    ?>
                    <tr>
                    
                    <td><?php echo $row['g_id']?? '' ; ?></td>
                    <td><?php echo $row['guest_name']??''; ?></td>
                    <td><?php echo $dateObject->format('d/m/y h:i A'); ?></td>
                    <td><?php echo $row['guest_status']??''; ?></td>
                    <td><?php echo $row['guest_rate']??''; ?></td>
                    <td><a href="#" style="text-decoration: none; font-size:15px;">Time-out</a></td>


                    
                                
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No guest found";
                    }
                    ?>
             
              <!--<td class="bill_btn"><a href="" class="proceed_bill" style="text-decoration: none;">Proceed to Billing</a></td>-->
            
            
          </table>
        </div>
       </section>

      <section id='order'>
       
        <div style="overflow-x:auto; width: 80%;">
          <h1 style="text-align: center; padding: 6px; font-weight: bold;">Our Menu</h1>

           <!--button for modal 2-->
          <button class="modal-button" href="#myModal2">View Cart</button>

          <!-- The Modal -->
            <div id="myModal2" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">×</span>
                <h2>View Cart</h2>
              </div>
              <div class="modal-body">
              <table>
                  <tr>
                    <th style="text-align: center;">Food</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Total</th>
                    <th style="text-align: center;">Actions</th>
                  </tr>
                  <?php
                    include_once 'db.php';
                    $result = mysqli_query($database,"SELECT * FROM cart");
                  ?>
                  <?php
                    if (mysqli_num_rows($result) > 0) {
                  ?>
                   <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                    
                    <td><?php echo $row['product_name']?? '' ; ?></td>
                    <td><?php echo $row['product_price']??''; ?></td>
                    <td><input type= "number" name="quantity"></td>
                    <td><?php echo $row['product_price']??''; ?></td>
                    <td><a href="delete_cart.php?id=<?php echo $row['cart_ID']?>" onclick="return confirm('Are you sure?')"><i class="fa fa-times"></i></a></td>
                                
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No food item found";
                    }
                    ?>
          
                 
                  
                </table>
                <!--<h5 style="color:red;">Total: <span class="price text-success"></span></h5>-->
                <button type="button" class="btn btn-success" style="background-color: #003366; margin:5px;">Checkout</button>
              </div>
              
            </div>

            </div>
           

            <script src="./js/modal.js"></script>
        
          <table>
            <tr>
              <th style="text-align:center;">Food Image</th>
              <th style="text-align:center;">Food Name</th> 
              <th style="text-align:center;">Price</th>
              <th style="text-align:center;">Food Quantity Available</th>
              <th></th>
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
                    <td><img id="display-image" src="./image/<?php echo $row['prod_img']; ?>"></td>
                    <td><?php echo $row['prod_name']?? '' ; ?></td>
                    <td><?php echo $row['prod_price']??''; ?></td>
                    <td><?php echo $row['prod_stock']??''; ?></td>
                    <td class="add_btn"><a href="add_cart.php?id=<?php echo $row['prod_ID']; ?>" class="add_order">Add to Cart</a></td>
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
      </section>
       
    
     </div>
</body>
</html>