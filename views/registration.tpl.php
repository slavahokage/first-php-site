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
                <h1 class="text-center login-title">Registration</h1>
                <div class="account-wall">
                    <img class="profile-img"
                         src="/images/login.png"
                         alt="">
                    <form class="form-signin" id ="form-signin" method="post">

                        <?php if(!empty($pageData['error'])) :?>
                            <p><?php echo $pageData['error']; ?></p>
                        <?php endif; ?>

                        <?php if(!empty($pageData['activation'])) :?>
                            <p><?php echo $pageData['activation']; ?></p>
                        <?php endif; ?>

                        <input type="text" id="login" name="login" class="form-control" placeholder="Login" required
                               autofocus>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required
                               autofocus>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                               required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Сheck in
                        </button>
                        <span class="clearfix"></span>
                    </form>
                </div>
                <a href="/" class="text-center new-account">Login to your account </a>
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