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

        <button class="add_product" onclick="openForm()">Add Product</button>

        <div class="form-popup" id="myForm">
          <form action="#" class="form-container">
            <h2>Add Product Form</h2>
        
            <label for="product_num"><b>Product No</b></label>
            <input type="text" placeholder="Product Number" name="product_num" required>
        
            <label for="product_name"><b>Product Name</b></label>
            <input type="text" placeholder="Enter Product Name" name="product_name" required>

            <label for="product_price"><b>Product Price</b></label>
            <input type="text" placeholder="Enter Product Price" name="product_price" required>

            <label for="product_stock"><b>Stock</b></label>
            <input type="text" placeholder="Enter Product Stock" name="product_stock" required>
        
            <button type="submit" class="btn">Add Product</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
          </form>
        </div>

        <div style="overflow-x:auto;">
          <table>
            <tr>
              <th>Product No</th>
              <th>Product Image</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Stock</th>
              <th></th>
              
            </tr>
            <tr>
              <td>1</td>
              <td><img src="https://i.ibb.co/LrpN56T/chiken.jpg" alt="chiken" border="0" width="200" 
                height="150"></td>
              <td>Chicken and Fries</td>
             
              <td>50</td>
              <td>6</td>
              <td><a class="btn_edit" href="#">Edit</a></td>
              
              
            </tr>
            <tr>
              <td>2</td>
              <td><img src="https://i.ibb.co/8P6kgc1/burger.jpg" alt="burger" border="0" width="200" 
                height="150"></td>
              <td>Burger and Fries</td>
       
              <td>94</td>
              <td>6</td>
              <td><a class="btn_edit" href="#">Edit</a></td>
             
              
            </tr>
            <tr>
              <td>3</td>
              <td><img src="https://i.ibb.co/YQLjzsC/carbo.jpg" alt="carbo" border="0" width="200" 
                height="150"></td>
              <td>Carbonara</td>
     
              <td>67</td>
              <td>6</td>
              <td><a class="btn_edit" href="#">Edit</a></td>
              
              
            </tr>
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