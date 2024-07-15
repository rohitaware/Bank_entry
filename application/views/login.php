<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #343a40; /* Dark background color */
            color: #fff; /* Light text color */
        }
        .container {
            margin-top: 50px;
            max-width: 400px; /* Adjust max-width to your preference */
        }
        .form-control {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 14px;
            background-color: #454d55; /* Darker input background color */
            color: #fff; /* Light text color for inputs */
            border: 1px solid #ced4da; /* Border color */
        }
        .btn-primary {
            background-color: #007bff; /* Primary button color */
            border-color: #007bff; /* Button border color */
            padding: 12px 20px; /* Padding top/bottom, left/right */
            font-size: 16px; /* Larger font size */
            font-weight: bold; /* Bold font weight */
            text-transform: uppercase; /* Uppercase text */
            letter-spacing: 1px; /* Increased letter spacing */
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease; /* Smooth transition */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker hover color */
            border-color: #0056b3;
            transform: scale(1.05); /* Scale up on hover */
        }
        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Focus outline */
        }
        .login-link {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: #ccc; /* Lighter text color for links */
        }
        .login-link a {
            color: #007bff; /* Blue link color */
            text-decoration: none; /* Remove underline */
            font-weight: bold; /* Bold font weight */
            transition: color 0.3s ease; /* Smooth color transition */
        }
        .login-link a:hover {
            color: #0056b3; /* Darker hover color */
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Login</h2>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open('auth/login', ['class' => 'form-signin']); ?>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Login</button>

    <div class="login-link">New user?
        <a href="<?php echo site_url('register'); ?>" class="text-decoration-none"> Sign Up here</a>
    </div>
    </form>
</div>
</body>
</html>
