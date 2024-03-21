<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>
	<style>
		@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins:wght@200&display=swap");


		.login-cards {
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 150px;
		}

		.login-card {
			width: 500px;
			height: auto;
			background-color: #fff;
			box-shadow: 0 3px 50px 0 rgba(0, 0, 0, 0.2),
				0 1px 50px 0 rgba(0, 0, 0, 0.19);
			border-radius: 45px;
		}

		.login-card-items {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			gap: 65px;
			margin: 65px 30px 30px;
			width: auto;
			height: auto;
		}

		.login-tag {
			font-size: 45px;
			font-weight: 700;
			letter-spacing: 0.85px;
		}

		.form-items {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			gap: 30px;
			width: 100%;
			position: relative;
			height: auto;
		}

		input[type="text"] {
			padding: 5px 20px;
			width: calc(100% - 125px);
			height: 40px;
			background-color: #f3f4f6;
			font-size: 16px;
			border: none;
			outline: none;
			border-radius: 15px;
		}

		.password-item {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			gap: 10px;
			width: 100%;
			height: auto;
		}

		input[type="password"] {
			padding: 5px 20px;
			width: calc(100% - 125px);
			height: 40px;
			background-color: #f3f4f6;
			font-size: 16px;
			border: none;
			outline: none;
			border-radius: 15px;
		}

		.forgot-password-item a {
			color: #1d1e22;
			text-decoration: none;
			font-weight: 700;
			font-size: 15px;
			transition: color 0.4s;
		}

		.forgot-password-item a:hover,
		.forgot-password-item a:active {
			color: #858585;
		}

		button[type="button"] {
			position: relative;
			margin: 30px 0px 75px;
			width: 60%;
			height: 60px;
			color: white;
			background: linear-gradient(-135px, #1d1e22 0%, #f8cdda 100%);
			font-size: 18px;
			font-weight: 700;
			letter-spacing: 0.85px;
			box-shadow: 0 1px 15px 0 rgba(0, 0, 0, 0.1),
				0 -1px 15px 0 rgba(0, 0, 0, 0.1);
			border: none;
			border-radius: 25px;
			cursor: pointer;
			z-index: 1;
		}

		button[type="button"]::before {
			content: "";
			position: absolute;
			top: 0;
			right: 0;
			left: 0;
			bottom: 0;
			background: linear-gradient(-135deg, #4a69e2 0%, #ff6c98 100%);
			border-radius: 25px;
			opacity: 0;
			z-index: -1;
			transition: opacity 0.65s;
		}

		button[type="button"]:hover::before {
			opacity: 1;
		}

		.create-account-item {
			position: absolute;
			bottom: 30px;
		}

		.create-account-item a {
			color: #1d1e22;
			text-decoration: none;
			font-size: 15px;
			transition: color 0.4s;
		}

		.create-account-item a span {
			font-weight: 700;
		}
	</style>
</head>

<body>
	<div class="login-cards">
		<div class="login-card">
			<div class="login-card-items">
				<h1 class="login-tag">Re-Password</h1>
				<form method="post" action="index.php?action=dangnhap&act=password_action" class="form-items">
					<input type="text" placeholder="Username" name="txtusername">

					<div class="password-item">
						<input type="password" placeholder="Password" name="txtpassword" />
					</div>
					<div class="password-item">
						<input type="password" placeholder="New Password" name="newpassword" />
					</div>
					<button class="btn btn-primary button-item" name="login" type="submit">LOGIN</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>