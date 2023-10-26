<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm OTP</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: rgba(31,52,59,0.4);
        }

        #form3 {
            width: 300px;
            height: 300px;
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .input_box {
            margin-bottom: 20px;
            width: 100%;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            background-color: #7d2ae8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #6a1b9a;
        }
    </style>
</head>

<body>
<form id="form3" action="reset_password.php" method="POST">
				
				<div class="input_box">
                <input name="login_password" type="password" placeholder="Enter New Password" required />
                <i class="uil uil-lock password"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
              </div>
              <div class="input_box">
                <input name="confirm_password" type="password" placeholder="Confirm Password" required />
                <i class="uil uil-lock password"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
              </div>   
			  <button class="button">Set Password</button>
            
			</form>
</body>

</html>