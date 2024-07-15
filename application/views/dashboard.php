<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bank Account</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .container {
            margin-top: 50px;
            max-width: 600px;
        }
        .form-control, .btn-primary {
            margin-bottom: 15px;
        }
        .btn-add-account {
            margin-bottom: 20px;
        }
        .account-fields {
            margin-bottom: 20px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#addAccount').on('click', function() {
                const accountFields = `
                <div class="account-fields">
                    <div class="form-group">
                        <label for="account_holder_name">Account Holder Name:</label>
                        <input type="text" name="account_holder_name[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ifsc_code">IFSC Code:</label>
                        <input type="text" name="ifsc_code[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="account_number">Account Number:</label>
                        <input type="text" name="account_number[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="bank_name">Bank Name:</label>
                        <input type="text" name="bank_name[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email[]" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-danger btn-remove-account">Remove Account</button>
                </div>`;
                $('#accountContainer').append(accountFields);
            });

            $(document).on('click', '.btn-remove-account', function() {
                $(this).closest('.account-fields').remove();
            });

            $('#submitForm').on('click', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('account/multiple_transfer'); ?>',
                    data: $('#createForm').serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#successMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                            $('#createForm')[0].reset();
                            $('#accountContainer').empty();
                        } else {
                            $('#successMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                        }

                        setTimeout(function() {
                            $('#successMessage').fadeOut('slow');
                        }, 2000);
                    }
                });
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div id="successMessage"></div>
    
    <h2 class="text-center">Bank Account<h4 class="text-center" >Money Transfers</h4></h2>
    <hr>
    <form id="createForm">
        <div id="accountContainer">
            <div class="account-fields">
                <div class="form-group">
                    <label for="account_holder_name">Account Holder Name:</label>
                    <input type="text" name="account_holder_name[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="ifsc_code">IFSC Code:</label>
                    <input type="text" name="ifsc_code[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="account_number">Account Number:</label>
                    <input type="text" name="account_number[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="bank_name">Bank Name:</label>
                    <input type="text" name="bank_name[]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email[]" class="form-control" required>
                </div>
            </div>
        </div> 
        <button type="button" id="addAccount" class="btn btn-secondary btn-add-account">Add Another Account</button>
        <button id="submitForm" type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</div>
</body>
</html>
