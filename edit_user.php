<?php
        include('db.php');
        $id=$_GET['id'];
        $query=mysqli_query($database,"select * from `users` where id='$id'");
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
<title>Edit User</title>
</head>
<body>
        <h2>Edit User</h2>
        <form method="POST" action="update_user.php?id=<?php echo $id; ?>">
                <label>Change User Name:</label><input type="text" value="<?php echo $row['username']; ?>" name="username">
                <label>Change Password:</label><input type="text" value="<?php echo $row['password']; ?>" name="password"><br><br>
                
                <input type="submit" name="submit" style="font-weight: bold;">
                <a href="admin.php#users">Back</a>
        </form>
</body>
</html>