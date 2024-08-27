// receipt-date-time.js

// Function to format date and time
function getFormattedDateTime() {
    const now = new Date();
    
    // Get the date parts
    const day = String(now.getDate()).padStart(2, '0');
    const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    const year = now.getFullYear();
    
    // Get the time parts
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    
    // Format the date and time
    const formattedDate = `${day}-${month}-${year}`;
    const formattedTime = `${hours}:${minutes}:${seconds}`;
    
    // Combine date and time
    return `${formattedDate} ${formattedTime}`;
}

// Function to display the date and time in the receipt
function displayDateTime() {
    const dateTimeElement = document.getElementById('currentDateTime');
    dateTimeElement.textContent = getFormattedDateTime();
}

// Call the function to display the date and time on page load
window.onload = displayDateTime;