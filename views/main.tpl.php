<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageData['title']; ?></title>
    <meta name="vieport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header></header>

<div id="content">
    <div class="container table-block">
        <div class="row table-cell-block">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Login to account</h1>
                <div class="account-wall">
                    <img class="profile-img"
                    src="https:/lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                         alt="">
                    <form class="form-signin" id ="form-signin" method="post">
                        <?php if(!empty($pageData['error'])) :?>
                            <p><?php echo $pageData['error']; ?></p>
                        <?php endif; ?>
                        <input type="text" id="login" name="login" class="form-control" placeholder="Login" required
                               autofocus>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                               required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Sign in
                        </button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <span class="clearfix"></span>
                    </form>
                </div>
                <a href="/registration" class="text-center new-account">Create an account </a>
            </div>
        </div>
    </div>
</div>

<footer>

</footer>


<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/angular.min.js"></script>
<script src="/js/script.js"></script>

</body>
</html>

