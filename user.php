<?php
 $title = 'Users List';
 $page = 'user';
 include_once('./assets/header.php');
 include_once('./assets/navbar.php');

?>
<body>

<div class="container">
<h3>Users List</h3>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
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

      <th scope="row"><?php echo $row['id']?? '' ; ?></th>
      <td><?php echo $row['username']?? '' ; ?></td>
      <td><?php echo $row['password']?? '' ; ?></td>
      <td><a class="btn_edit" href="edit_user.php?id=<?php echo $row['id']; ?>" ><i class="fa fa-pencil-square-o"></i></a></td>
    </tr>
    <?php
               $i++;
               }
            ?>
            <?php
                    }
                    else{
                        echo "No user found";
                    }
                    ?>
  </tbody>
</table>



</div>





    
</body>
</html>