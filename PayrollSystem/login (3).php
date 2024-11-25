<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wondersaw Enterprise Payroll System</title>
   <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="background">
        <h1 style=" margin-left: 8%; font-family: 'Times New Roman', Times, serif; font-size: 65px;">WONDERSAW ENTERPRISE</h1>
        <h2 style="margin-top: -35px; margin-left: 35%; font-family: 'Times New Roman', Times, serif; font-size: 38px;">PAYROLL SYSTEM</h2>
        <div class="login-container">
            <h1 style="margin-top: -15px;">LOG IN </h1>
            <form onsubmit="redirectToHome(event)">
                <div class="input-group">
                    <span class="icon">👤</span>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <span class="icon">🔒</span>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-button">LOG IN</button> <br><br>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </form>
        </div>
    </div>

    <script>
        function redirectToHome(event) {
            event.preventDefault(); 
            window.location.href = 'home.php'; 
        }
    </script>
</body>
</body>
</html>