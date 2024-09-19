<?php
        include('db.php');
        $id=$_GET['id'];
        $query=mysqli_query($database,"select * from `products` where prod_ID='$id'");
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

</style>
<title>Edit Product</title>
</head>
<body>
        <h2>Edit Product</h2>
        <form method="POST" action="update.php?id=<?php echo $id; ?>">
                <label>Product name:</label><input type="text" value="<?php echo $row['prod_name']; ?>" name="prod_name">
                <label>Product price:</label><input type="text" value="<?php echo $row['prod_price']; ?>" name="prod_price">
                <label>Product stock:</label><input type="text" value="<?php echo $row['prod_stock']; ?>" name="prod_stock">
                <input type="submit" name="submit" style="font-weight: bold;">
                <a href="pos_inventory.php">Back</a>
        </form>
</body>
</html>