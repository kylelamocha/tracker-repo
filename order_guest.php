<?php
        include('db.php');
        $id=$_GET['id'];
        $query=mysqli_query($database,"select * from `guest_tbl` where g_id='$id'");
        //$query=mysqli_query($database, "")
        $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 10px;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
input[type=text], select, textarea {
  width: 100%;
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
input[type=submit] {
  background-color: #081D45;
  color: white;
  margin: 8px;
  padding: 15px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #66b0ff;
}
/*table*/
table{
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th{
  text-align: center;
  padding: 8px;
}

td{
  text-align: center;
  padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2}

#display-image{
  width: 100%;
  padding: 5px;
}
img{
  width: 250px;
  height: 250px;
}
.btn{
    text-decoration: none;
}

</style>
<title>Order Section</title>
</head>
<body>
        <h2>Order Section</h2>
        <a href="index.php#guest" class="btn">Back</a>
        <!--<form method="POST"">       
        <input type="submit" name="submit" style="font-weight: bold;" >
        <a href="index.php#guest">Back</a>
        </form>-->
        <table>
            <tr>
              <th>Image</th>
              <th >Name</th> 
              <th >Price</th>
              <th >Food Quantity Available</th>
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
                    <td class="add_btn"><a href="order.php?id=<?php echo $row['prod_ID']; ?>">Add to Cart</a></td>
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
            
        
</body>
</html>