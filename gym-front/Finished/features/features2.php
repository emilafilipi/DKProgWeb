<!DOCTYPE html>
<html>
<head>
    <title>Features2</title>
    <link rel = "stylesheet" type = "text/css" href = "features.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;700&display=swap" rel="stylesheet">
    <style>
        .container img{
            width: 250px;
            height: 200px;
        }
        @media (max-width: 1000px) {
            .container img{
                zoom: 2.5;
            }
            .container p{
                font-size: 18px;
            }
        }
    </style>
    <script>

    </script>

</head>
<body>

<?php

//$workout="";
//if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['Strength'])){
//    echo "<h1>jemi ok</h1>";
        $workout = "Strength";

    }else if(isset($_POST['Cardio'])){
//    echo "<h1>jemi prp ok</h1>";
        $workout = "Cardio";

    }else if(isset($_POST['LISS'])){
//    echo "<h1>jemi ok</h1>";
        $workout = "LISS";

    }else if(isset($_POST['HIIT'])){
//    echo "<h1>jemi ok</h1>";
        $workout = "HIIT";
    }else if(isset($_POST['Group'])){
//        echo "<h1>jemi ok</h1>";
        $workout = "Group";
    }else if(isset($_POST['Flexibility/mobility'])){
//        echo "<h1>jemi ok</h1>";
        $workout = "Flexibility/mobility";

    }else if(isset($_POST['Balance'])){
//        echo "<h1>jemi ok</h1>";
        $workout = "Balance";

    }else if(isset($_POST['Stability'])){
//        echo "<h1>jemi ok</h1>";
        $workout = "Stability";
    }
//}


//$userID = "1";
global $conn;
require_once "../connect.php";

session_start();
$userID = $_SESSION["userID"];

$query_insert = "insert into `users`.`usersworkouts` (userID, workout) values('".$userID."','".$workout."')";
$result_check = mysqli_query($conn, $query_insert);

?>


<div class="header" id="header">
    <div class="navbar">
        <div class="navleft">
            <div class="dumbbell">
                <div class="dumbell"><img src="../ikona, foto/dumbbell-solid.png"></div>
                <div class="gym"><a style="text-decoration:none" href="../index.html" class="home">GYM</a></div>
            </div>
            <div class="navbar"><a style="text-decoration:none" href="../index.html" class="home">Home</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../Services/services.html" class="services">Services</a></div>

            <div class="dropdown">
                <a style="text-decoration:none" href="../index.html#features" class="features-btn">Features &#709</a>
                <div class="dropdown-content">
                    <a style="text-decoration:none" href="features1.html">General Tips</a>
                    <a style="text-decoration:none" href="features2.php">Choose Workout</a>
                    <a style="text-decoration:none" href="features3.php">View Progress</a>
                </div>
            </div>

            <div class="navbar"><a style="text-decoration:none" href="MyWorkouts.php" class="myWorkouts">My workouts</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../about/about.html" class="about">About</a></div>
            <div class="navbar"><a style="text-decoration:none" href="../contact/contact.php" class="contact">Contact</a></div>
        </div>

        <div class="navright">
            <div class="login"><a style="text-decoration:none" href="../login/login.html" class ="login">Login</a></div>
            <div class=navbar><a style="text-decoration:none" href="../login/signup.html" class="signup">Sign up</a></div>
        </div>
    </div>
</div>

<div class="container">
    <h1>Choose Workout</h1>
    <h2>Every workout session is provided by a highly skilled and experienced instructor. Choose the workout that fits you best.</h2>



    <form method="post" action="#" id="workouts">
        <?php
        $query_check = "select * from `users`.`usersworkouts` where userID != '".$userID."'";
        $result_check = mysqli_query($conn, $query_check);
        $notMyWorkouts = [];
        $i=0;
        while($row_data = mysqli_fetch_assoc($result_check)){
//            echo "id: ".$row_data["userID"]." ";
//            echo "workout: ".$row_data["workout"]." ";
            $notMyWorkouts[$i++] = $row_data["workout"];
        }


        function isNotMine($array,$myName){
            foreach($array as $name){
                if($name == $myName){
                    return 1;
                }
            }

            return 0;
        }

        $query_check = "select * from `users`.`workouts`";
        $result_check = mysqli_query($conn, $query_check);

        while($row_data = mysqli_fetch_assoc($result_check)) {
            $workoutName = $row_data["workout"];
            $photoURL = $row_data["photo"];
            $description = $row_data["description"];
//            $isNotMyWorkout = in_array($workoutName,$notMyWorkouts);
//            echo "Result : ".$isNotMyWorkout." ";

            $isNotMyWorkout = isNotMine($notMyWorkouts,$workoutName);
//            echo "Result : " .isNotMine($notMyWorkouts,$workoutName). " ";


            echo "<script>
//function printWorkouts(){
//    var form = document.getElementById('workouts');
//var row = document.createElement('div');
//row.setAttribute('class','row');
//var col1 = document.createElement('div');
//col1.setAttribute('class','col1');
//var img = document.createElement('img');
//img.setAttribute('src','$photoURL');
//col1.appendChild(img);
//var col2= document.createElement('div');
//col2.setAttribute('class','col2');
//var br = document.createElement('br');
//var h4 = document.createElement('h4');
//h4.appendChild(document.createTextNode('$workoutName'));
//var p = document.createElement('p');
//var pText = document.createTextNode('$description');
//p.appendChild(pText);
//var br1 = document.createElement('br');
//var br2 = document.createElement('br');
//var button = document.createElement('button');
//button.appendChild(document.createTextNode('Choose workout'));
//button.setAttribute('class','button');
//button.setAttribute('name','$workoutName');
//if($isNotMyWorkout==0){  //pra nqs eshte my workout (nuk kthen 1)
//    
//    button.setAttribute('disabled','disabled');
//    button.setAttribute('style','background-color: gray');
//}
//p.appendChild(br1);
//p.appendChild(br2);
//p.appendChild(button);
//col2.appendChild(br);
//col2.appendChild(h4);
//col2.appendChild(p);
//
//row.appendChild(col1);
//row.appendChild(col2);
//
//form.appendChild(row);
//}
//
//window.addEventListener('load',printWorkouts,false);
</script>";

        }

        ?>
    </form>

</div>

<div class="footer">
    <footer>
        <div class="copyright">
            <span class="left">Copyright &copy; Polytechinc University of Tirana 2023. All rights reserved.</span>
            <span class="right">
                <a href="#">Terms &amp; Conditions</a>
                <a href="#">   Privacy Policy</a>
                </span>
        </div>
    </footer>
</div>
</body>
</html>