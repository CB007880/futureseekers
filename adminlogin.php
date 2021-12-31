<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Futureseekers.lk</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/login.css">
        <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
        <!-- font awsome icons-->
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		<div class="container" id="container">
		
		<div class="form-container sign-in-container">

			<div class="form">
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>or use your account</span>

				<div id="errors" class="alert alert-danger mt-2 mb-0 py-1 px-4 w-100 d-none" style="font-size: 13px;">
					<ul id="errors-ul" class="list-group text-left">
					</ul>
				</div>
				<input id="username" type="text" name="username" placeholder="Username" />
				<input id="password" type="password" name="password"placeholder="Password" />

				<a href="#">Forgot your password?</a>
				<button class="mt-2" name="signin-btn" onclick="window.location.replace('admindashboard.php')">Sign In</button>

			</div>


	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
			</div>
			<div class="overlay-panel overlay-right">
				<h2>Administrator Portal</h2>
				<h6 class="pt-5 mt-5">Not an Admin?</h6>
				<button class="ghost" onclick="window.location.replace('login.html')">Sign in</button>

			</div>
		</div>
	</div>
</div>



<!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>



</body>
</html>