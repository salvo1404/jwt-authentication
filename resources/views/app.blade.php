<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Angular-Laravel JWT Auth</title>

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">

    <!-- Fonts -->

</head>
<body  ng-app="authApp">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">

        </div>
    </div>
</nav>

@if (session('success'))
    <div class="container">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="container">
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    </div>
@endif

    @yield('content')

</body>

<!-- Application Dependencies -->
<script src="node_modules/angular/angular.js"></script>
<script src="node_modules/angular-ui-router/build/angular-ui-router.js"></script>
<script src="node_modules/satellizer/satellizer.js"></script>

<!-- Application Scripts -->
<script src="scripts/app.js"></script>
<script src="scripts/authController.js"></script>
<script src="scripts/userController.js"></script>

</html>
