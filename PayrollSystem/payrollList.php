<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payrollsystem"; // Corrected database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add payroll logic
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $payrollType = $_POST['payrollType'];

    $sql = "INSERT INTO payroll (date_from, date_to, payroll_type) VALUES ('$dateFrom', '$dateTo', '$payrollType')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }
    exit();
}

// Edit payroll logic
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $id = $_POST['payrollId'];
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $payrollType = $_POST['payrollType'];

    $sql = "UPDATE payroll SET date_from = '$dateFrom', date_to = '$dateTo', payroll_type = '$payrollType' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }
    exit();
}

// Delete payroll logic
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['payrollId'];
    $sql = "DELETE FROM payroll WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }
    exit();
}


// Fetch payroll records
$sql = "SELECT * FROM payroll";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll List</title>
    <link rel="stylesheet" href="payrollList.css">
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
            <li class="active"><a href="payrollList.php"><i class="icon">💸</i> Payroll</a></li>
            <li><a href="employee.php"><i class="icon">👥</i> Employees</a></li>
            <li><a href="branch.php"><i class="icon">🏢</i> Branch</a></li>
            <li><a href="deduction.php"><i class="icon">➖</i> Deduction</a></li>
            <li><a href="salarySlip.php"><i class="icon">📄</i> Salary Slip</a></li>
            <li><a href="user.php"><i class="icon">👤</i> User</a></li>
        </ul>
    </div>

    <main class="content">
        <div class="welcome-box2">
            PAYROLL LIST
        </div>

        <div class="controls">
            <div class="search-container">
                <input type="text" placeholder="Search" class="search-bar">
                <button class="search-btn">🔍</button>
            </div>
            <button class="add-payroll-btn" onclick="showModal()">+ Add Payroll</button>
        </div>

       <table class="payroll-table">
    <thead>
        <tr>
            <th>Payroll ID</th>
            <th>From</th>
            <th>To</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['date_from'] . "</td>";
                echo "<td>" . $row['date_to'] . "</td>";
                echo "<td>" . $row['payroll_type'] . "</td>";
                echo "<td class='action-buttons'>
                         <button class='edit' onclick='editPayroll(" . $row['id'] . ", \"" . $row['date_from'] . "\", \"" . $row['date_to'] . "\", \"" . $row['payroll_type'] . "\")'>✏️</button>
                         <a href='#' class='delete' onclick='showDeleteConfirmation(" . $row['id'] . ")'><img src='delete.png' alt='delete' style='height: 20px; width: 25px;'></a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No payroll records found</td></tr>";
        }
        ?>
    </tbody>
</table>

    </main>

    <!-- New Payroll Modal -->
    <div id="newPayrollModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">New Payroll</div>
            <div style="border-top: 2px solid black; margin: 10px 0;"></div>
            <div class="modal-body">
                <label for="dateFrom">Date From:</label>
                <input type="date" id="dateFrom" required>

                <label for="dateTo">Date To:</label>
                <input type="date" id="dateTo" required>

                <label for="payrollType">Payroll Type:</label>
                <select id="payrollType" required>
                    <option value="">Please select here</option>
                    <option value="monthly">Monthly</option>
                    <option value="weekly">Weekly</option>
                </select>
            </div>
            <div style="border-top: 2px solid black; margin: 10px 0;"></div>
            <div class="modal-footer">
                <button class="save-btn" onclick="savePayroll()">Save</button>
                <button class="cancel-btn" onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>

  
    <footer class="footer">
        © 2024 Payroll Management System. All rights reserved.
    </footer>

    <script>
        let editingPayrollId = null;

function showModal() {
    document.getElementById('newPayrollModal').style.display = 'flex';
    document.getElementById('modalHeader').textContent = "New Payroll";
    document.getElementById('dateFrom').value = '';
    document.getElementById('dateTo').value = '';
    document.getElementById('payrollType').value = '';
    editingPayrollId = null; // Reset the ID when adding a new payroll
}

function closeModal() {
    document.getElementById('newPayrollModal').style.display = 'none';
}

function savePayroll() {
    const dateFrom = document.getElementById('dateFrom').value;
    const dateTo = document.getElementById('dateTo').value;
    const payrollType = document.getElementById('payrollType').value;

    const formData = new FormData();
    
    // Check if we're editing or adding
    formData.append('action', editingPayrollId ? 'edit' : 'add');
    
    // If editing, include the payroll ID
    if (editingPayrollId) {
        formData.append('payrollId', editingPayrollId);
    }

    formData.append('dateFrom', dateFrom);
    formData.append('dateTo', dateTo);
    formData.append('payrollType', payrollType);

    fetch('payrollList.php', {
        method: 'POST',
        body: formData,
    }).then(response => response.json())
      .then(data => {
        if (data.success) {
            window.location.reload(); // Reload to show the updated list
        } else {
            alert('Failed to update payroll: ' + data.message);
        }
    }).catch(error => {
        console.error('Error:', error);
    });
}

function editPayroll(id, dateFrom, dateTo, payrollType) {
    document.getElementById('newPayrollModal').style.display = 'flex';
    document.getElementById('modalHeader').textContent = "Edit Payroll";
    document.getElementById('dateFrom').value = dateFrom;
    document.getElementById('dateTo').value = dateTo;
    document.getElementById('payrollType').value = payrollType;
    editingPayrollId = id; // Set the ID to edit this payroll
}

function showDeleteConfirmation(id) {
    const confirmed = confirm("Are you sure you want to delete this payroll?");
    if (confirmed) {
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('payrollId', id);

        fetch('payrollList.php', {
            method: 'POST',
            body: formData,
        }).then(response => response.json())
          .then(data => {
            if (data.success) {
                window.location.reload(); // Reload to reflect deletion
            } else {
                alert('Error deleting payroll: ' + data.message);
            }
        });
    }
}

    </script>
</body>
</html>
