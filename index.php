<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/ree.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Workhub-AORBTS</title>
    <style>
       
    </style>
</head>
<body>
<header id="header">
      <div class="header-content-div">
        <a href="#home">
        <img class="img" src="https://i.ibb.co/McvPkTq/Screenshot-2024-10-10-122549.png" alt="Screenshot-2024-10-10-122549" border="0">
        </a>
        <nav id="nav-bar">
          <a href="#guest" class="nav-link">Guest</a>
          <a href="login.php" onclick="return confirm('Are you sure?')" class="nav-link">Logout</a>
        </nav>
      </div>
    </header>
<main>
      <section id="home" class="flexible home">
        <div class="eye-grabber-img">
        <img src="https://i.ibb.co/f4q5mXM/428630518-122120915552196208-4954576337951130810-n.jpg" alt="428630518-122120915552196208-4954576337951130810-n" border="0">
        </div>
        <div class="eye-grabber">
          <h1>Workhub by AORBTS</h1>
          <h2>
           
          </h2>
        
        </div>
      </section>
      <section id="guest" class="guest">
      <h3 class="section-heading">Guest List</h3>
      <div class="sec-content-div flexible">

      <!--<button class="btn" href="#myModal1">Add New Guest</button>-->
      <button class="modal-button" href="#myModal1">Add New Guest</button>

        <!-- The Modal -->
        <div id="myModal1" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="close">X</span>
            <h2>Add New Guest</h2>
          </div>

          <div class="modal-body">
          <form id="addGuestForm" method="post" action="addguest.php">
            <label for="guestName">Guest Name:</label>
            <input type="text" id="guest_name" name="guest_name" required><br><br>
          
          <label for="guest_timein">Guest Date and Time In:</label>
          <input type="datetime-local" id="guest_timein" name="guest_timein" required><br><br>

            <label for="guest_status">Guest Status:</label>
            <select id="guest_status" name="guest_status">
              <option value="Regular">Regular</option>
              <option value="Student">Student</option>
            </select><br><br>

            <label for="guest_rate">Rate (by guest's status):</label>
            <input type="text" id="guest_rate" name="guest_rate" min="0" required><br><br>

            <button type="submit" class="btn" value="Submit">Add Guest</button>
            
          </form>
          </div>
        
        </div>
        </div>

        <script src="./js/modal.js"></script>

        <table>
        <thead>
        <tr>
          <th scope="col">Guest No</th>
          <th scope="col">Guest Name</th>
          <th scope="col">Guest Date and Time In</th>
          <!--<th scope="col">Time Out</th>-->
          <th scope="col">Status</th>
          <th scope="col">Guest Rate</th>
          <th scope="col">Current status</th>
          <!--<th scope="col">Order  (Optional)</th>-->
          <th scope="col">Action</th>
          <th scope="col">Time Out</th>
        </tr>
        </thead>
        <tbody>
        <tr>
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
          <td data-label="Guest No"><?php echo $row['g_id']?? '' ; ?></td>
          <td data-label="Guest Name"><?php echo $row['guest_name']??''; ?></td>
          <td data-label="Guest Date and Time In"><?php echo $dateObject->format('d/m/y h:i A'); ?></td>

          <td data-label="Guest Status"><?php echo $row['guest_status']??''; ?></td>
          <td data-label="Rate"><?php echo $row['guest_rate']??''; ?></td>
          <td data-label="Current status"><?php echo $row['guest_desc']??''; ?></td>
          
          <td data-label="Edit/Delete">
            <a href="edit_guest.php?id=<?php echo $row['g_id']?>" class="btn_guest"><i class="fa fa-pencil-square-o"></i></a>
            <a href="delete_guest.php?id=<?php echo $row['g_id']?>" onclick="return confirm('Are you sure?')" class="btn_guest"><i class="fa fa-trash"></i></a>
            <a href="order_guest.php?id=<?php echo $row['g_id']?>" class="btn_guest"><i class="fa fa-cutlery"></i></a>
          </td>
          <td data-label="TimeOut"><a href="timeout.php?id=<?php echo $row['g_id']?>" class="btn_guest"><i class="fa fa-check-square-o"></i></a></td>
        </tr>
        <?php
            $i++;
            }
            ?>
        </tbody>
       

        </table>
        <?php
            }
            else{
              echo "No guest found";
            }
            ?>
            
      
      </div>
      </section>
      
</main>



</body>
</html>