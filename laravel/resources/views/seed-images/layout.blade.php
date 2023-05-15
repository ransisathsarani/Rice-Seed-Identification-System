<!DOCTYPE html>
<html>

<head>
<title>Rice Seed Identification Tool</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .home_btn {
        background-color: darkcyan;
        border: none;
        color: white;
        padding: 100px 120px;
        font-size: 30px;
        cursor: pointer;
    }

    /* Darker background on mouse-over */
    .home_btn:hover {
        background-color: darkturquoise;
    }
</style>
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="http://127.0.0.1:8000">Rice Seed Variety Identification</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/user-guide">User Guide</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">FAQ</a>
                </li> -->
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>