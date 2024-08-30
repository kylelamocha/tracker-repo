<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="index.css" rel="stylesheet">
    <link rel="stylesheet" href="guestModal.css">
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
        <a href="#billing"><i class="fas fa-money-bill"></i></a>
        <!--<a href="#fourth"><i class="far fa-address-card"></i></a>-->
    </nav>
       
     <div class= 'container'> 
       <section id= 'home'>

         <!--<h1>Home</h1>-->

         <div style="overflow-x:auto;">

          <!--<h1>Home</h1>-->
          
          <button class="add_guest">Add Guest</button>
          <a href="login.php" class="btn_logout">Logout</a>

          <!-- Modal Form -->
          <div id="guestModal" class="modal" style="display:none;">
            <div class="modal-content">
              <span class="close">&times;</span>
              <h2>Add New Guest</h2>
              <form id="addGuestForm">
                <label for="guestName">Guest Name:</label>
                <input type="text" id="guestName" name="guestName" required><br><br>

              <!-- Time In Field -->
              <label for="timeInHour">Time In:</label>
              <input type="number" id="timeInHour" name="timeInHour" min="1" max="12" maxlength="2" required> :
              <input type="number" id="timeInMinute" name="timeInMinute" min="0" max="59" maxlength="2" required>
              <select id="timeInAmPm" name="timeInAmPm">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
              </select>
              <br><br>

              <!-- Time Out Field -->
              <label for="timeOutHour">Time Out:</label>
              <input type="number" id="timeOutHour" name="timeOutHour" min="1" max="12" maxlength="2" required> :
              <input type="number" id="timeOutMinute" name="timeOutMinute" min="0" max="59" maxlength="2" required>
              <select id="timeOutAmPm" name="timeOutAmPm">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
              </select>
              <br><br>

                <label for="guestStatus">Guest Status:</label>
                <select id="guestStatus" name="guestStatus">
                  <option value="Regular">Regular</option>
                  <option value="Student">Student</option>
                </select><br><br>

                <label for="rate">Rate:</label>
                <input type="number" id="rate" name="rate" min="0" required><br><br>

                <label for="additional">Additional:</label>
                <input type="number" id="additional" name="additional" min="0" required><br><br>

                <label for="total">Total:</label>
                <input type="number" id="total" name="total" min="0"  required><br><br>

                <button type="submit">Add Guest</button>
              </form>
            </div>
          </div>


          <table>
            <tr>
              <th>Guest No.</th>
              <th>Guest Name</th>
              <th>Time In</th>
              <th>Time Out</th>
              <th>Guest Status</th>
              <th>Rate</th>
              <th>Additional</th> 
              <th>Total</th>
              <th>Billing</th> 
            </tr>
            <tr>
              <td>1</td>
              <td contenteditable='true'>Smith</td>
              <td contenteditable='true'>8</td>
              <td contenteditable='true'>10</td>
              <td ALIGN="center">
                <select>  
                     <option value="Regular">Regular</option>      
                     <option value="Student">Student</option>
                </select>
              </td>
              <td contenteditable='true'>50</td>
              <td contenteditable='true'>50</td>
              <td contenteditable='true'>50</td>
              <td class="bill_btn"><a href="" class="proceed_bill" style="text-decoration: none;">Proceed to Billing</a></td>
            </tr>
            <tr>
              <td>2</td>
              <td contenteditable='true'>Jackson</td>
              <td contenteditable='true'>9</td>
              <td contenteditable='true'contenteditable='true'>10</td>
              <td ALIGN="center">
                <select>  
                     <option value="Regular">Regular</option>      
                     <option value="Student">Student</option>
                </select>
              </td>
              <td contenteditable='true'>50</td>
              <td contenteditable='true'>94</td>
              <td contenteditable='true'>94</td>
              <td class="bill_btn"><a href="" class="proceed_bill" style="text-decoration: none;">Proceed to Billing</a></td>
            </tr>
            
          </table>
        </div>

       </section>
       
      <section id='order'>
        <!--<button class="add_guest">Add Guest</button>-->
       
        <div style="overflow-x:auto; width: 80%;">
          <h1 style="text-align: center; padding: 6px; font-weight: bold;">Our Menu</h1>
          
          <!--will implement something here-->
          <!--btn cart here-->
          <button class="trigger" id="myBtn"><i class='fas fa-cart-plus' style='font-size:30px; color: #000'></i></button>
          
          <!--<div id="cartModal" class="modal">

        
            <div class="modal-content">
              <span class="close">&times;</span>
              <p style="font-weight: bold; font-size: 18px;">Cart
              </p>
            </div>
          
          </div>
          <script src="modal.js">
          </script>-->
              
          <table> <!--class="order_tbl"-->
            <tr>
              <th>Food</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th></th>
            </tr>
            <tr>
              <td><img src="https://i.ibb.co/LrpN56T/chiken.jpg" alt="chiken" border="0" width="200" 
                height="150"></td>
              <td>Chicken and Fries</td>
              <td><input type="number" id="quantity" value="1" name="quantity" min="1" max="10"></td>
              <td>200 PHP</td>
              <td class="add_btn"><a href="" class="add_order">Add to Cart</a></td>
              </tr>
            </tr>
            <tr>
              <td><img src="https://i.ibb.co/8P6kgc1/burger.jpg" alt="burger" border="0" width="200" 
                height="150"></td>
              <td>Burger and Fries</td>
              <td><input type="number" id="quantity" value="1" name="quantity" min="1" max="10"></td>
              <td>200 PHP</td>
              <td class="add_btn"><a href="" class="add_order">Add to Cart</a></td>
            </tr>
            <tr>
              <td><img src="https://i.ibb.co/YQLjzsC/carbo.jpg" alt="carbo" border="0" width="200" 
                height="150"></td>
              <td>Carbonara</td>
              <td><input type="number" id="quantity" value="1" name="quantity" min="1" max="10"></td>
              <td>200 PHP</td>
              <td class="add_btn"><a href="" class="add_order">Add to Cart</a></td>
            </tr>
          </table>
        
        </div>
      </section>
       
      <section id= 'billing'>
       <!-- <h1>Billing</h1> -->

        <div style="overflow-x:auto; width: 70%;">
          <h1 style="text-align: center; padding: 6px; font-weight: bold;">Billing</h1>
                
                <div class="container" style="background-color: #ffffff;">
                  <div class="col-md-12">
                    <div class="text-center">
                      <i class="fab fa-mdb fa-4x ms-0" style="color:#ffffff ;"></i>
                      <p class="pt-0">Payment Details</p>
                    </div>
        
                  <div class="row">
                    <div class="col-xl-8">
                      <ul class="list-unstyled">
                        <li class="text-black" style="font-weight: bold;"> Guest: <span>(Guest name)</span>
                        </li>
                      </ul>
                    </div>

                    <div class="col-xl-7">
                      <ul class="list-unstyled">
                        <li class="text-black"> <span
                            class="fw-bold">Check in:</span>(Time in)</li>
                        <li class="text-black"> <span
                            class="fw-bold">Check out: </span>(Time out)</li>
                        
                      </ul>
                    </div>
                  </div>
          
                  <div class="row my-2 mx-1 justify-content-center">
                    <table class="table table-striped table-borderless">
                      <thead style="background-color:#60bdf3 ;" class="text-white">
                        <tr>
                          <th scope="col">Order Number</th>
                          <th scope="col">Description</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Unit Price</th>
                          <th scope="col">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr style="background-color: #ffffff;">
                          <th scope="row">1</th>
                          <td>Burger and Fries</td>
                          <td>1</td>
                          <td>200 PHP</td>
                          <td>200 PHP</td>
                        </tr>
                       
                      </tbody>
          
                    </table>
                  </div>

                    <div class="col-xl-5">
                      <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                          style="font-weight: bold;">200 PHP</span></p>
                    </div>
                  </div>
                  <hr>
                    <div class="col-xl-2">
                      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary text-capitalize"
                        style="background-color:#60bdf3 ;">Check out</button>
                    </div>
                    <div class="col-xl-8">
                      <button  type="button" onclick="printReceipt()" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary text-capitalize"
                        style="background-color:#60bdf3 ;">Print Receipt</button>
                    </div>

                    <script>
                      function printReceipt() {
                          // Open the receipt template in a new window
                          const printWindow = window.open('Receipt-temp.html', '_blank', 'width=800,height=600');
                          
                          // Wait until the content is loaded
                          printWindow.onload = function() {
                              // Trigger the print dialog
                              printWindow.print();
              
                              // Close the print window after printing
                              printWindow.onafterprint = function() {
                                  printWindow.close();
                              };
                          };
                      }
                  </script>
                  </div>
          
                </div>
              </div>
            </div>
          </div>

       </section>
       
      <!--<section id= 'fourth'>
        <a href="login.php"></a>
        <h1>Log out</h1>
       </section>-->


     </div>
     <script src="guestModal.js"></script>
     
</body>
</html>