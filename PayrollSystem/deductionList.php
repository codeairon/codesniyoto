<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deduction List</title>
   <link rel="stylesheet" href="deductionstyle.css">
</head>
<body>

    <header class="header">
        <div class="header-left">
            <img src="logo.png" alt="Logo" class="logo-img" style="height: 10vh; margin-right: -505px;">
        </div>
        <div class="header-right">
            <span class="admin-text">ADMINISTRATOR</span>
            <a href="#" class="logout-icon" onclick="showLogoutConfirmation(event)">
                <img src="logout.png" alt="logout" style="height: 25px;">
            </a> 
        </div>
    </header>

    <div class="sidebar">
        <ul>
            <li><a href="home.php"><i class="icon">🏠</i> Home</a></li>
            <li><a href="payrollList.php"><i class="icon">💸</i> Payroll</a></li>
            <li><a href="employee.php"><i class="icon">👥</i> Employees</a></li>
            <li><a href="branch.php"><i class="icon">🏢</i> Branch</a></li>
            <li class="active"><a href="deduction.php"><i class="icon">➖</i> Deduction</a></li>
            <li><a href="salarySlip.php"><i class="icon">📄</i> Salary Slip</a></li>
            <li><a href="user.php"><i class="icon">👤</i> User</a></li>
        </ul>
    </div>

    <main class="content">
        <div class="deduction-box">
            DEDUCTION LIST
        </div>

        <div class="deduction-form">
            <h3 style="text-align: center;">DEDUCTION FORM</h3>

            <div style="border-top: 2px solid black; margin: 10px 0;"></div>
            <label for="employee-id">Employee ID</label>
            <input type="text" id="employee-id" placeholder="Enter Employee ID" required>
            
            <label for="deduction-name">Deduction Name</label>
            <select id="deduction-name" required>
                <option value="">Select Deduction</option>
                <option value="tax">Tax</option>
                <option value="insurance">Insurance</option>
            </select>
            
            <label for="description">Description</label>
            <input type="text" id="description" placeholder="Enter Description" required>

            <div style="border-top: 2px solid black; margin: 20px 0;"></div>
            <div class="form-buttons">
                <button class="cancel-btn" onclick="alert('Canceled')">CANCEL</button>
                <button class="save-btn" onclick="alert('Saved')">SAVE</button>
            </div>
        </div>

        <table class="deduction-table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Deduction Information</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button class="edit">✏️</button>
                        <a href="#" class="delete" onclick="showDeleteConfirmation(event)"><img src="delete.png" alt="delete" style="height: 20px; width: 25px;"></a>
                        
                    </td>
                </tr>
            
            </tbody>
        </table>
    </main>

    <footer class="footer">
        © 2024, ALL RIGHTS RESERVED
    </footer>

    <div class="logout-overlay" id="logoutOverlay">
        <div class="logout-content">
            <div class="logout-header" style="padding: 20px;">Confirmation</div>
            <div style="border-top: 2px solid black; margin: 10px 0;"></div>
            <p style="padding: 30px;">Are you sure you want to log out?</p>
            <div style="border-top: 2px solid black; margin: 10px 0;"></div>
            <div class="logout-footer">
                <button class="cancel-btn" onclick="closeLogoutConfirmation()">No</button>
                <button class="confirm-btn" onclick="confirmLogout()">Yes</button>
            </div>
        </div>
    </div>


    <script>
      
        function showLogoutConfirmation(event) {
            event.preventDefault(); 
            document.getElementById("logoutOverlay").style.display = "flex";
        }


        function closeLogoutConfirmation() {
            document.getElementById("logoutOverlay").style.display = "none";
        }

     
        function confirmLogout() {
            window.location.href = "login.php"; 
        }
    </script>

    

<div class="delete-overlay" id="deleteOverlay">
    <div class="delete-content">
        <div class="delete-header" style="padding: 20px;">Delete Confirmation</div>
        <div style="border-top: 2px solid black; margin: 10px 0;"></div>
        <p style="padding: 10px; ">Are you sure you want to delete this payroll?</p>
        <div style="border-top: 2px solid black; margin: 10px 0;"></div>
        <div class="delete-footer">
            <button class="cancelll-btn" onclick="closeDeleteConfirmation()">No</button>
            <button class="confirm-btn" onclick="confirmDelete()">Yes</button>
        </div>
    </div>
</div>
<script>
// Function to show the delete confirmation modal
function showDeleteConfirmation(event) {
    event.preventDefault(); // Prevents any default action (like a form submit or page redirect)
    document.getElementById("deleteOverlay").style.display = "flex"; // Show the delete confirmation modal
}

// Function to close the delete confirmation modal
function closeDeleteConfirmation() {
    document.getElementById("deleteOverlay").style.display = "none"; // Hide the delete confirmation modal
}

// Function to confirm the deletion
function confirmDelete() {
    alert("Payroll deleted!"); // Here you can handle actual deletion (e.g., make an AJAX request)
    closeDeleteConfirmation(); // Close the modal after confirmation
}


</script>
</body>
</html>
