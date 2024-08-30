// Get the modal element
var modal = document.getElementById("guestModal");

// Get the button that opens the modal
var btn = document.querySelector(".add_guest");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Track whether the form has been modified
var isFormDirty = false;

// Function to mark the form as dirty when user inputs data
function markFormAsDirty() {
  isFormDirty = true;
}

// Add event listeners to all input fields to mark the form as dirty when data is inputted
var formInputs = document.querySelectorAll("#addGuestForm input, #addGuestForm select");
formInputs.forEach(function(input) {
  input.addEventListener("input", markFormAsDirty);
});

// Select the time input fields
var timeInputs = document.querySelectorAll("#timeInHour, #timeInMinute, #timeOutHour, #timeOutMinute");

// Function to limit input length
function limitInputLength(event) {
  var input = event.target;
  if (input.value.length > 2) {
    input.value = input.value.slice(0, 2); // Limit to 2 characters
  }
}

// Add event listeners to each input field
timeInputs.forEach(function(input) {
  input.addEventListener("input", limitInputLength);
});

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal with a check
span.onclick = function() {
  if (isFormDirty) {
    if (confirm("Are you sure you want to close? All unsaved data will be lost.")) {
      closeModal();
    }
  } else {
    closeModal();
  }
}

// Function to close the modal and reset form fields
function closeModal() {
  modal.style.display = "none";
  document.getElementById("addGuestForm").reset();
  isFormDirty = false; // Reset the dirty flag
}


// Handle form submission
document.getElementById("addGuestForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent the form from submitting the traditional way

  // Get form data
  var guestName = document.getElementById("guestName").value;
  
  // Time In
  var timeInHour = document.getElementById("timeInHour").value;
  var timeInMinute = document.getElementById("timeInMinute").value;
  var timeInAmPm = document.getElementById("timeInAmPm").value;
  var timeIn = `${timeInHour}:${timeInMinute} ${timeInAmPm}`;
  
  // Time Out
  var timeOutHour = document.getElementById("timeOutHour").value;
  var timeOutMinute = document.getElementById("timeOutMinute").value;
  var timeOutAmPm = document.getElementById("timeOutAmPm").value;
  var timeOut = `${timeOutHour}:${timeOutMinute} ${timeOutAmPm}`;
  
  var guestStatus = document.getElementById("guestStatus").value;
  var rate = document.getElementById("rate").value;
  var additional = document.getElementById("additional").value;
  var total = document.getElementById("total").value;

  // Add a new row to the table
  var table = document.querySelector("table");
  var newRow = table.insertRow();
  newRow.innerHTML = `
    <td>${table.rows.length - 1}</td>
    <td contenteditable='true'>${guestName}</td>
    <td contenteditable='true'>${timeIn}</td>
    <td contenteditable='true'>${timeOut}</td>
    <td ALIGN="center">
      <select>  
           <option value="Regular" ${guestStatus === "Regular" ? "selected" : ""}>Regular</option>      
           <option value="Student" ${guestStatus === "Student" ? "selected" : ""}>Student</option>
      </select>
    </td>
    <td contenteditable='true'>${rate}</td>
    <td contenteditable='true'>${additional}</td>
    <td contenteditable='true'>${total}</td>
    <td class="bill_btn"><a href="" class="proceed_bill" style="text-decoration: none;">Proceed to Billing</a></td>
  `;

  // Close the modal
  modal.style.display = "none";

  // Clear form fields
  document.getElementById("addGuestForm").reset();
});