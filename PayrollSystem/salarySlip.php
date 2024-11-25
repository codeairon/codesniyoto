<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   <link rel="stylesheet" href="salarySlipstyle.css">
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
            <li><a href="deductionList.php"><i class="icon">➖</i> Deduction</a></li>
            <li class="active"><a href="salarySlip.php"><i class="icon">📄</i> Salary Slip</a></li>
            <li><a href="user.php"><i class="icon">👤</i> User</a></li>
        </ul>
    </div>

    <main class="content">
        <div class="salary">
            SALARY SLIP
        </div>
        <div class="form-container">
            <form>
                <input type="text" placeholder="Employee ID:" required>
                <input type="text" placeholder="Name:" required>
                <input type="text" placeholder="Date From:" required>
                <input type="text" placeholder="Date To:" required>
                <input style="margin-left: 650px; width: 8vw; " type="submit" value="Submit">
            </form>
        </div>
    </main>

    <footer class="footer">
        <p>© 2024, ALL RIGHTS RESERVED</p>
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
</body>
</html>