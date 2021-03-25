<?php
# Recaching
$q = "?" . date("YmdHis",strtotime('Now'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/bootstrap.min.css<?php echo $q; ?>">
    <link rel="stylesheet" href="stylesheets/fonts.css<?php echo $q; ?>">
    <link rel="stylesheet" href="stylesheets/login.css<?php echo $q; ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="javascripts/jquery.min.js"></script>
    <script src="javascripts/popper.min.js"></script>
    <script src="javascripts/bootstrap.min.js"></script>
    <script src="javascripts/ajax.loadpage.js<?php echo $q; ?>"></script>
    <title>Ticket System</title>
</head>
<body>
    <div id="bg_image"></div>
    <div id="login_container" class="row justify-content-center">
        <div class="signin-form">
            <h3 class="mb-4 text-center">Login</h3>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input id="password-field" type="password" class="form-control" placeholder="Password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                        <input type="checkbox" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="w-50 text-md-right">
                    <a href="#" id="a-forgot" style="color: #fff">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
	<div id="content">
	</div>
</body>
</html>
<script src="javascripts/login.js<?php echo $q; ?>"></script>
<script type="text/javascript">
$(".btn").click(function(){
    const lpage = new loadPage("#login_container","main.php","","");
    lpage.request();
});

</script>