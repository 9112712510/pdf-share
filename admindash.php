<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <input type="checkbox" id="checkbox">


    <header class="header">
        <h2 class="u-name">SIDE <b>BAR</b></h2>
        <label for="checkbox">
            <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
        </label>
        <i class="fa fa-user" aria-hidden="true"></i>
    </header>
    <div class="body">
        <nav class="side-bar">
            <div class="user-p">

            </div>
            <ul>
               
                <li>
                    <a href="Users.php">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>All users</span>
                    </a>
                </li>
                <li>
                    <a href="voterinfos.php">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>uploaded pdf</span>
                    </a>
                </li>
                <!--<li>
                    <a href="voted.php">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Candidate info</span>
                    </a>
                </li>
                <li>
                    <a href="voting.php">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Result</span>
                    </a>
                </li>-->
                <li>
                    <a href="logout.php">
                        <i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>logout</span>
                    </a>
                </li>
            </ul>
        </nav>
       
    </div>
    
</body>
</html>