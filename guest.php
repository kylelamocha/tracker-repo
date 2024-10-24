<?php
 $title = 'Guest List';
 $page = 'guest';
 include_once('./assets/header.php');
 include_once('./assets/navbar.php');

?>
<body>

<div class="container">
<h3><b>Guest Section</b></h3>
<div class="row">
    <div class="col-sm">
    <h4 style="font-size: 18px;">Currently Timed In Guests</h4>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Guest Name</th>
            <th scope="col">Time In</th>
            <th scope="col">Status</th>
            <th scope="col">Rate</th>
            <th scope="col">Description</th>
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
                    ?>
            <th scope="row"><?php echo $row['g_id']?? '' ; ?></th>
            <td><?php echo $row['guest_name']?? '' ; ?></td>
            <td><?php echo $dateObject->format('d/m/y h:i A'); ?></td>
            <td><?php echo $row['guest_status']?? '' ; ?></td>
            <td><?php echo $row['guest_rate']?? '' ; ?></td>
            <td><?php echo $row['guest_desc']?? '' ; ?></td>
            </tr>
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
        </tbody>
        </table>

    </div>

    <div class="col-sm">
    <h4 style="font-size: 18px;">Timed Out Guests</h4>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Guest Name</th>
            <th scope="col">Time In</th>
            <th scope="col">Time Out</th>
            <th scope="col">Total Hours</th>
            <th scope="col">Status</th>
            <th scope="col">Rate</th>
            <th scope="col">Description</th>
            <th scope="col">Additional Fee</th>
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
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
            <th scope="row"><?php echo $row['g_id']?? '' ; ?></th>
            <td><?php echo $row['guest_name']?? '' ; ?></td>
            <td><?php echo $dateObject->format('d/m/y h:i A'); ?></td>
            <td><?php echo $dateObj->format('d/m/y h:i A'); ?></td>
            <td><?php echo $row['guest_hrs']?? '' ; ?></td>
            <td><?php echo $row['guest_status']?? '' ; ?></td>
            <td><?php echo $row['guest_rate']?? '' ; ?></td>
            <td><?php echo $row['guest_desc']?? '' ; ?></td>
            <td><?php echo $row['add_fee']?? '' ; ?></td>
            <td><?php echo $row['g_total']?? '' ; ?></td>
            </tr> 
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
        </tbody>
        </table>
    </div>


  
</div>
</div>





    
</body>
</html>