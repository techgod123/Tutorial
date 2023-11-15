<!-- PHP (validation.php) -->
<?php
// define variables and set to empty values
$nameErr = $emailErr = "";
$name = $email = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>

<body>
    <!-- <h2>Server-side Form Validation</h2>
    <form method="post" name="empfrm" id="eform" action="">
        Name: <input type="text" id="name" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <span id="nameError" class="red"></span>
        <br><br>
        E-mail:
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <span id="emailError" class="red"></span>
        <br><br>
        <input type="submit" id="submit" name="submit" value="Submit">
        <input type="reset" value="CLEAR" id="reset" onclick="clearDisplay()">
    </form> -->
    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Sign Up</h2>
        <form id="signupForm" action="" method="post">
            <div class="mb-4">
                <label for="name" class="block text-gray-600 text-sm font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border rounded"
                    value="<?php echo $name; ?>" />
                <span class="error">*
                    <?php echo $nameErr; ?>
                </span>
                <span id="nameError" class="red"></span>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded"
                    value="<?php echo $email; ?>" required />
                <span class="error">*
                    <?php echo $emailErr; ?>
                </span>
                <span id="emailError" class="red"></span>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded" required />
            </div>
            <div class="mb-4">
                <label for="confirmPassword" class="block text-gray-600 text-sm font-medium mb-2">Confirm
                    Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="w-full p-2 border rounded"
                    required />
            </div>
            <button type="submit" onclick="validateForm()"
                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Sign Up
            </button>
        </form>
    </div>
</body>

</html>