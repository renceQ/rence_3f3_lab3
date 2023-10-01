<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CodeIgniter Auth User Registration Example</title>

    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }

        h2 {
            color: #333333;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
        }

        .neomorphic-btn {
            background-color: #f5f5f5;
            border: 1px solid #dddddd;
            border-radius: 10px; /* Increase border-radius for neumorphic effect */
            box-shadow: 6px 6px 12px rgba(0, 0, 0, 0.2), -6px -6px 12px rgba(255, 255, 255, 0.5);
            color: #333333;
            padding: 10px 20px;
            font-weight: bold;
            transition: transform 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
        }

        .neomorphic-btn:hover {
            transform: scale(1.05);
            background-color: #dddddd;
            color: #000000;
        }

        .neomorphic-btn:active {
            background-color: #333333;
            box-shadow: inset 6px 6px 12px rgba(0, 0, 0, 0.2), inset -6px -6px 12px rgba(255, 255, 255, 0.5);
            color: #ffffff;
        }

        .form-control {
            background-color: #f5f5f5;
            border: 1px solid #dddddd;
            border-radius: 10px; /* Apply the same border-radius to form elements */
            padding: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .alert {
            background-color: #ffffcc;
            border: 1px solid #ffcc00;
            color: #333300;
            border-radius: 10px; /* Add border-radius to alerts for consistency */
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Register User</h2>
                <?php if(isset($validation)): ?>
                    <div class="alert alert-warning"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action="<?= base_url('/user/store') ?>" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control">
                    </div>
                    <div class="d-grid" mt-3>
                        <button type="submit" class="neomorphic-btn">Save Account</button>
                        <br>
                        <a href="/" class="neomorphic-btn" style="width: auto; text-align: center;">Login Account</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
