<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>AORBTS</title>
</head>
<body>

<div class="container">
  <h2></h2>
  <br>
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#home"><b>Home</b></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#guest">Guest</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu">Menu</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="guest" class="container tab-pane fade"><br>
      <h3>Guest Section</h3>
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
    </div>
    <div id="menu" class="container tab-pane fade"><br>
      <h3>Menu</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>

<script src="./js/modal.js"></script>
  
</body>
</html>