<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CodeIgniter Login with Username/Password Example</title>

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

        .btn-success {
            background-color: #333333;
            border: 1px solid #333333;
            color: #ffffff;
        }

        .alert {
            background-color: #ffffcc;
            border: 1px solid #ffcc00;
            color: #333300;
        }

        .form-control {
            background-color: #f5f5f5;
            border: 1px solid #dddddd;
            border-radius: 10px;
            padding: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .d-grid {
            text-align: center;
        }

        .neomorphic-btn {
            background-color: #f5f5f5;
            border: 1px solid #dddddd;
            border-radius: 10px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2), -2px -2px 4px rgba(255, 255, 255, 0.5);
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

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Login</h2>
                <?php if(session()->getFlashdata('msg')): ?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>/signin/loginAuth" method="post">
                  <div class="form-group mb-3">
                      <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>" class="form-control" required>
                  </div>
                  <div class="form-group mb-3">
    <input type="password" name="password" placeholder="Password" class="form-control" required inputmode="none">
</div>

                  <div class="d-grid">
                      <button type="submit" class="neomorphic-btn btn btn-success">Login</button>
                  </div>
              </form>

              <!-- Add the Register Account button -->
              <div class="text-center mt-3">
                <a href="/register" class="neomorphic-btn btn btn-primary">Register Account</a>
              </div>
            </div>
        </div>
    </div>
</body>
</html>
