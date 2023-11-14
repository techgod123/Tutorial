## Make a form and store values in associative array

```
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate and store in an associative array
    $errors = [];
    if (strlen($name) < 10) {
        $errors['name'] = 'Name should be at least 10 characters.';
    }
    // Add more validation for email, phone, and address as needed

    if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[_@$])\S{2,}$/', $password)) {
        $errors['password'] = 'Password should have 2 uppercase letters, 1 digit, 1 of [_@$], and be at least 2 characters long.';
    }

    if ($password !== $confirmPassword) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        // Store values in an associative array
        $userDetails = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'password' => $password,
        ];
// Print success message or store in a database
        echo '<div class="alert alert-success" role="alert">
            Registration successful!
        </div>';
}else {
        // Print validation errors
        echo '<div class="alert alert-danger" role="alert">
            <strong>Error:</strong> Please fix the following issues:
            <ul>';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul></div>';
    }
}
?>
