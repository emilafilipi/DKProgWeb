<?php
session_start();
if(!isset($_SESSION["userID"]) && !isset($_SESSION["email"])){
    header("location: ../login/login.html");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;700&display=swap" rel="stylesheet">
    <script src="script.js"></script>
<body>
<?php
global $conn;
require_once "../connect.php";

$userID = $_SESSION["userID"];

if (!empty($_POST)) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['username']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);
    $message = mysqli_real_escape_string($conn,$_POST['message']);

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if(empty($surname)){
        $errors[] = 'Surname is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }

    $query_insert = "INSERT INTO `users`.`contactus`
                     set userID = '" . $userID . "',
                     name    = '" . $name . "',
                     username    = '" . $surname . "',
                     phone   = '" . $phone . "',
                     email    = '" . $email . "',
                     service = '" . $service . "',
                     message = '" . $message . "'";

    $query_result = mysqli_query($conn, $query_insert);

}

?>
    <div class="header" id="header">
        <div class="navbar">
            <div class="navleft">
                <div class="dumbbell">
                        <div class="dumbell"><img src="../ikona, foto/dumbbell-solid.png"></div>
                        <div class="gym"><a style="text-decoration:none" href="../index.html" class="home">GYM</a></div>
                    </div>
                <div class="navbar"><a style="text-decoration:none" href="../index.html" class="home">Home</a></div>
                <div class="navbar"><a style="text-decoration:none" href="../Services/services.php" class="services">Services</a></div>

                <div class="dropdown">
                    <a style="text-decoration:none" href="../index.html#features" class="features-btn">Features &#709</a>
                    <div class="dropdown-content">
                        <a style="text-decoration:none" href="../features/features1.php">General Tips</a>
                        <a style="text-decoration:none" href="../features/features2.php">Choose Workout</a>
                        <a style="text-decoration:none" href="../features/features3.php">View Progress</a>
                    </div> 
                </div>

                <div class="navbar"><a style="text-decoration:none" href="../features/MyWorkouts.php" class="myWorkouts">My workouts</a></div>
                <div class="navbar"><a style="text-decoration:none" href="../about/about.html" class="about">About</a></div> 
                <div class="navbar"><a style="text-decoration:none" href="contact.php" class="contact">Contact</a></div>
            </div>
            
            <div class="navright">
                <div class=navbar><a style="text-decoration:none" href="../login/logout.php" class="signup">Log out</a></div>
            </div>
        </div>
    </div>
    <div class="container">
        <br><h1>Contact Us</h1>
        <p>Feel free to get in touch with us</p>
        <div class="contact-box">
            <div class="contact-left">
                <h3>Send your request</h3>
                <form action="contact.php" method="post">
                    <div class="input-row">
                        <div class="input-group">
                            <label>Name</label>
                            <input name="name" type="text">
                        </div>
                        <div class="input-group">
                            <label>Surname</label>
                            <input name="username" type="text">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Phone</label>
                            <input name="phone" type="text">
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <input name="email" type="email">
                        </div>
                    </div>

                    <div class="input-row">
                        <div class="input-group">
                            <label>Service<br></label>
                            <input name="service" type="text">
                        </div>
                    </div>
                    <label>Message</label>
                    <textarea name="message" rows="5"></textarea>
                    <button type="submit" id="submit" name="submit">SEND</button>
                </form>
            </div>
            <div class="contact-right">
                <h3>Reach us</h3>

                <table>
                    <tr>
                        <td>Email</td>
                        <td><a href="mailto: info@gymfitness.com" >info@gymfitness.com</a> </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>800.275.8777</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>202 Helga Springs Rd<br>Crawford, TN 38554</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>



    <div class="footer">
        <footer>
            <div class="copyright">
                <span class="left">Copyright &copy; Polytechinc University of Tirana 2024. All rights reserved.</span>
                <span class="right">
                <a href="#">Terms &amp; Conditions</a>
                <a href="#">Privacy Policy</a>
                </span>
            </div>
        </footer>
    </div>
    
</body>
</html>