<?php
session_start();
if(!isset($_SESSION["userID"]) && !isset($_SESSION["email"])){
    header("location: ../login/login.html");
    die();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/88a6f1c20d.js" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <title>Services</title>
    </head>
    <body>
    <?php
    global $conn;
    require_once "../connect.php";

    $userID = $_SESSION["userID"];

    $strength = 'Muscle Surrender';
    $lift = 'Lift & Lounge';
    $yoga = 'Yoga & Unwind';
    $cardio = 'Sweat It Off!';


    $query_check_strength = "SELECT * FROM `users`.`classes` WHERE userID = '$userID' AND classesChosen = '$strength'";
    $result_check_strength = mysqli_query($conn, $query_check_strength);
    $signed_up_strength = mysqli_num_rows($result_check_strength) > 0;


    $query_check_lift = "SELECT * FROM `users`.`classes` WHERE userID = '$userID' AND classesChosen = '$lift'";
    $result_check_lift = mysqli_query($conn, $query_check_lift);
    $signed_up_lift = mysqli_num_rows($result_check_lift) > 0;

    $query_check_yoga = "SELECT * FROM `users`.`classes` WHERE userID = '$userID' AND classesChosen = '$yoga'";
    $result_check_yoga = mysqli_query($conn, $query_check_yoga);
    $signed_up_yoga = mysqli_num_rows($result_check_yoga) > 0;

    $query_check_cardio = "SELECT * FROM `users`.`classes` WHERE userID = '$userID' AND classesChosen = '$cardio'";
    $result_check_cardio = mysqli_query($conn, $query_check_cardio);
    $signed_up_cardio = mysqli_num_rows($result_check_cardio) > 0;

    if(isset($_POST['submitStrength'])  && !$signed_up_strength){
        $query_insert = "INSERT INTO `users`.`classes` (userID, classesChosen) VALUES ($userID, '$strength')";
        $result_insert = mysqli_query($conn, $query_insert);
    }

    if(isset($_POST['submitLift']) && !$signed_up_lift){
        $query_insert = "INSERT INTO `users`.`classes` (userID, classesChosen) VALUES ($userID, '$lift')";
        $result_insert = mysqli_query($conn, $query_insert);
    }
    if(isset($_POST['submitYoga']) && !$signed_up_yoga){
        $query_insert = "INSERT INTO `users`.`classes` (userID, classesChosen) VALUES ($userID, '$yoga')";
        $result_insert = mysqli_query($conn, $query_insert);
    }
    if(isset($_POST['submitCardio']) && !$signed_up_cardio){
        $query_insert = "INSERT INTO `users`.`classes` (userID, classesChosen) VALUES ($userID, '$cardio')";
        $result_insert = mysqli_query($conn, $query_insert);
    }

    //$query_delete = "DELETE FROM users.classes";
    //$result_check_delete = mysqli_query($conn, $query_delete);
    ?>
        <div class="header">
            <div class="navbar">
                <div class="navleft">
                    <div class="dumbbell">
                            <div class="dumbell"><img src="../ikona, foto/dumbbell-solid.png"></div>
                            <div class="gym"><a style="text-decoration:none" href="../index.html" class="home">GYM</a></div>
                        </div>
                    <div class="navbar"><a style="text-decoration:none" href="../index.html" class="home">Home</a></div>
                    <div class="navbar"><a style="text-decoration:none" href="services.php" class="services">Services</a></div>
    
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
                    <div class="navbar"><a style="text-decoration:none" href="../contact/contact.php" class="contact">Contact</a></div>
                </div>
                
                <div class="navright">
                    <div class=navbar><a style="text-decoration:none" href="../login/logout.php" class="signup">Log out</a></div>
                </div>
            </div>
        </div>
        <br>
        <div class="page" id="page" >
            <h3>What we offer</h3>
            <h1>Sign up for one of our weekly classes!</h1>

            <div class="showOnClick">
                <div class="click" id="showStrength">
                    <div class="contain strength">
                        <button class="button close" onclick="removeDetails()">&#x2715;</button>

                        <div class="tekst1">
                                <h1 class="what">Muscle Surrender</h1>
                                <h2 class="what">Forge your body with our strength training class that combines traditional and cutting-edge
                                    techniques. Elevate your strength, improve endurance, and experience a transformation like never before.
                                    <br><br>
                                    <em>
                                    Every Monday and Friday
                                    <br>
                                    18:00 - 19:30</em>
                                </h2>
                            <form action="services.php" method="post" onsubmit="return submitForm('submitStrength',
                            <?php echo $signed_up_strength ? 'true' : 'false'; ?>);">
                                <button type="submit" name="submitStrength" id="submitStrength" class="button signupButton"
                                    <?php echo isset($_POST["submitStrength"]) || $signed_up_strength ? 'style="display: none;"; ' : 'style="display: block;";';?>>Sign up
                                </button>
                                <button type="submit" name="submittedStrength" id="submittedStrength" class="button submittedButton"
                                    <?php echo isset($_POST["submitStrength"]) || $signed_up_strength ? 'disabled style="display: block; cursor: not-allowed; 
                                    background-color: #808080;"; ' : 'style="display: none;";';?>>Already registered
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="click" id="showLift">
                    <div class="contain lift">
                        <button class="button close" onclick="removeDetails()">&#x2715;</button>

                        <div class="tekst1">
                            <h1 class="what">Lift & Lounge</h1>
                            <h2 class="what">Forge a calm and powerful core in our weight lifting class that focuses on
                                core strength and stability. Unwind tension as you lift, sculpt, and redefine your body's center.

                                <br><br>
                                <em>
                                    Every Tuesday and Thursday
                                    <br>
                                    18:30 - 20:00</em>
                            </h2>
                            <form action="services.php" method="post"  onsubmit="return submitForm('submitLift',
                            <?php echo $signed_up_lift ? 'true' : 'false'; ?>);">
                                <button type="submit" name="submitLift" id="submitLift" class="button signupButton"
                                    <?php echo isset($_POST["submitLift"]) || $signed_up_lift ? 'style="display: none"; ' : '';?>>Sign up
                                </button>
                                <button type="submit" name="submitLift" id="submittedLift" class="button submittedButton"
                                    <?php echo isset($_POST["submitLift"]) || $signed_up_lift ? 'disabled style="display: block; cursor: not-allowed; 
                                    background-color: #808080;"; ' : '';?>>Already registered
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="click" id="showYoga">
                    <div class="contain yoga">
                        <button class="button close" onclick="removeDetails()">&#x2715;</button>

                        <div class="tekst1">
                            <h1 class="what">Yoga & Unwind</h1>
                            <h2 class="what">Embrace tranquility and flexibility in our yoga class where ancient yoga meets modern wellness.
                                Connect mind and body, strengthen your core, and discover a serene escape from the daily
                                hustle as you find balance for your mind and body.
                                <br><br>
                                <em>
                                    Every Monday, Wednesday and Saturday
                                    <br>
                                    19:00 - 21:00</em>
                            </h2>
                            <form action="services.php" method="post"  onsubmit="return submitForm('submitYoga',
                            <?php echo $signed_up_yoga ? 'true' : 'false'; ?>);" >
                                <button type="submit" name="submitYoga" id="submitYoga" class="button signupButton"
                                    <?php echo isset($_POST["submitYoga"]) || $signed_up_yoga ? 'style="display: none"; ' : '';?> >Sign up
                                </button>
                                <button type="submit" name="submitYoga" id="submitYoga" class="button submittedButton"
                                    <?php echo isset($_POST["submitYoga"]) || $signed_up_yoga ? 'disabled style="display: block; cursor: not-allowed; 
                                    background-color: #808080;"; ' : '';?>>Already registered
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="click" id="showCardio">
                    <div class="contain cardio">
                        <button class="button close" onclick="removeDetails()">&#x2715;</button>

                        <div class="tekst1">
                            <h1 class="what">Sweat It Off!</h1>
                            <h2 class="what">Experience the thrill of our high-intensity cardio class designed to push your limits. Get
                                your heart racing, break a sweat, and achieve new levels of cardiovascular fitness.
                                <br><br>
                                <em>
                                    Every Wednesday and Saturday
                                    <br>
                                    18:00 - 19:30</em>
                            </h2>
                            <form action="services.php" method="post" onsubmit="return submitForm('submitCardio',
                            <?php echo $signed_up_cardio ? 'true' : 'false'; ?>);">
                                <button type="submit" name="submitCardio" id="submitCardio" class="button signupButton"
                                    <?php echo isset($_POST["submitCardio"]) || $signed_up_cardio ? 'style="display: none"; ' : '';?>>Sign up
                                </button>
                                <button type="submit" name="submitCardio" id="submitCardio" class="button submittedButton"
                                    <?php echo isset($_POST["submitCardio"]) || $signed_up_cardio ? 'disabled style="display: block; cursor: not-allowed; 
                                    background-color: #808080;"; ' : '';?>>Already registered
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>



                <div id="package-container">
                    <!--Paketa 1-->
                    <div class="package" id="strength" onclick="showDetails('strength')">
                            <h2>Muscle Surrender</h2><br>
                            <p>Forge your body with our strength training class that combines traditional and cutting-edge
                            techniques. Elevate your strength, improve endurance, and experience a transformation like never before.
                            </p><br>
                            <button class="button" onclick="showDetails('strength')">Show details</button>
                    </div>
                    <!--Paketa 2-->
                    <div class="package" id="lift" onclick="showDetails('lift')">
                            <h2>Lift & Lounge</h2><br>
                            <p>Forge a calm and powerful core in our weight lifting class that focuses on
                                core strength and stability. Unwind tension as you lift, sculpt, and redefine your body's center.
                            </p><br><br>
                            <button class="button" onclick="showDetails('lift')">Show details</button>
                    </div>
                    <!--Paketa 3-->
                    <div class="package" id="yoga" onclick="showDetails('yoga')">
                            <h2>Yoga & Unwind</h2><br>
                            <p>Embrace tranquility and flexibility in our yoga class where ancient yoga meets modern wellness.
                            Connect mind and body, strengthen your core, and discover a serene escape from the daily
                            hustle as you find balance for your mind and body.
                            </p>
                            <button class="button" onclick="showDetails('yoga')">Show details</button>
                    </div>
                    <!--Paketa 4-->
                    <div class="package" id="cardio" onclick="showDetails('cardio')">
                            <h2>Sweat It Off!</h2><br>
                            <p>Experience the thrill of our high-intensity cardio class designed to push your limits. Get
                                your heart racing, break a sweat, and achieve new levels of cardiovascular fitness.
                            </p><br><br>
                            <button class="button" onclick="showDetails('cardio')">Show details</button>
                    </div>
                </div>

        </div>




        <br>
    <div class="footer">
        <!--Package container qe do mbaje te 3 divs-->
        <div class="footer-container">
            <!--Div 1: Ikonat e rrjeteve sociale-->
            <div class="footer-div">
                <div class="title">
                    <i class="fa-solid fa-dumbbell fa-xl" style="color: #005eff;"></i>
                    <label id="label" style="font-weight: bold;">GYM</label>
                </div>
                <p>Using GYMFitness, you can stay on track on your fitness journey
                    whether you're on the go or at home.</p>

                <!--                        <i class="fa-brands fa-facebook-f" style="color: #000000;"></i>-->
                <a href="http://facebook.com" class="fa-brands fa-facebook-f" style="color: #000000;"></a>
                <!--                        <i class="fa-brands fa-twitter" style="color: #000000;"></i>-->
                <a href="http://twitter.com" class="fa-brands fa-twitter" style="color: #000000;"></a>
                <!--                        <i class="fa-brands fa-linkedin-in" style="color: #000000;"></i>-->
                <a href="http://linkedin.com" class="fa-brands fa-linkedin-in" style="color: #000000;"></a>
                <!--                        <i class="fa-brands fa-instagram" style="color: #000000;"></i>-->
                <a href="http://instagram.com" class="fa-brands fa-instagram" style="color: #000000;"></a>
            </div>

            <!--Div 2: Informacionet e kontaktimit-->
            <div class="footer-div">
                <a href="../contact/contact.php" style="text-decoration: none;"><h4>Contact Us</h4></a>
                <p>call us: 800.275.8777<br><br>
                    <a href="mailto: info@gymfitness.com" >info@gymfitness.com</a><br><br>
                    www.gym.net<br><br>
                    202 Helga Springs Rd, Crawford, TN 38554
                </p>
            </div>


            <!--Div 3: Dergese emaili per newsletter-->
            <div class="footer-div">
                <h4>Get the latest information from us</h4>
                <br>
                <div class="input">
                    <input type="text" placeholder="Enter your email" id="input-field">
                    <button id="send-btn" onclick="validateEmail()">Send</button>
                </div>
                <!--Mesazh per userin kur ben submit-->
                <p id="input-p"></p>
            </div>
        </div>
        <footer>
            <!--Pjesa e kodit te copyrightit-->
            <div class="copyright">
                <span class="left">Copyright &copy; Polytechinc University of Tirana 2024. All rights reserved.</span>
                <span class="right">
                    <a href="#">Terms &amp; Conditions</a>
                    <a href="#">   Privacy Policy</a>
                    </span>
            </div>
        </footer>
    </div>

    </body>

</html>

