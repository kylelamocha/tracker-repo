<?php
	require'db.php';
	if(ISSET($_POST['filter'])){
		$category=$_POST['category'];
		
		$query=mysqli_query($database, "SELECT p.*, c.name as cat FROM products p inner join category_list c on c.id = p.category_id WHERE `name`='$category'") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
            echo"<tr><td>".$fetch['prod_ID']."</td><td>".$fetch['code']."</td>
            <td><img src='./image/".$fetch['prod_img']."'></td>
            <td>".$fetch['prod_name']."</td><td>".$fetch['prod_price']."</td><td>".$fetch['cat']."</td>
            <td><a href='edit.php?id=".$fetch['prod_ID']."'>Edit</a>
            <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete.php?id=".$fetch['prod_ID']."'>Delete</a></td>
            </tr>";
		}
	}else if(ISSET($_POST['reset'])){
		$query=mysqli_query($database, "SELECT p.*, c.name as cat FROM products p inner join category_list c on c.id = p.category_id order by prod_ID asc") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
                  echo"<tr><td>".$fetch['prod_ID']."</td><td>".$fetch['code']."</td>
                  <td><img src='./image/".$fetch['prod_img']."'></td>
                  <td>".$fetch['prod_name']."</td><td>".$fetch['prod_price']."</td><td>".$fetch['cat']."</td>
                  <td><a href='edit.php?id=".$fetch['prod_ID']."'>Edit</a>
                  <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete.php?id=".$fetch['prod_ID']."'>Delete</a></td>
                  </tr>";
		}
	}else{
		$query=mysqli_query($database, "SELECT p.*, c.name as cat FROM products p inner join category_list c on c.id = p.category_id order by prod_ID asc") or die(mysqli_error());
        //$id=$_GET['id'];
		while($fetch=mysqli_fetch_array($query)){
                  echo"<tr><td>".$fetch['prod_ID']."</td><td>".$fetch['code']."</td>
                  <td><img src='./image/".$fetch['prod_img']."'></td>
                  <td>".$fetch['prod_name']."</td><td>".$fetch['prod_price']."</td><td>".$fetch['cat']."</td>
                  <td><a href='edit.php?id=".$fetch['prod_ID']."'>Edit</a>
                  <a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete.php?id=".$fetch['prod_ID']."'>Delete</a></td>
                  </tr>";
		}
	}
?>