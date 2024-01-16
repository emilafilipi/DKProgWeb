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
    <title>Features1</title>
    <link rel = "stylesheet" type = "text/css" href = "features.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;700&display=swap" rel="stylesheet">
    <style>
        .container img{
            width: 150px;
            height: 100px;
        }
    </style>
<!--    <script src="features1.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>


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
                        <a style="text-decoration:none" href="features1.php">General Tips</a>
                        <a style="text-decoration:none" href="features2.php">Choose Workout</a>
                        <a style="text-decoration:none" href="features3.php">View Progress</a>
                    </div>
                </div>

                <div class="navbar"><a style="text-decoration:none" href="MyWorkouts.php" class="myWorkouts">My workouts</a></div>

                <div class="navbar"><a style="text-decoration:none" href="../about/about.html" class="about">About</a></div>
                <div class="navbar"><a style="text-decoration:none" href="../contact/contact.php" class="contact">Contact</a></div>
            </div>

            <div class="navright">
                <div class=navbar><a style="text-decoration:none" href="../login/logout.php" class="signup">Log out</a></div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>General Tips</h1>
        <h2>Daily Goals</h2>
        <!--        <form method="post">-->
        <form method="post" id="data">
            <div class = "row">
                <div class = "col1">
                    <img src = "walk.jpg">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Steps</h4>
                    <p>Walk 10,000 Steps on avarage per day.<br>
                        Walking is an effective form of low impact exercise that can help people
                        improve or maintain their physical fitness.
                    </p><br>
                    <h3><input type="checkbox" id="Steps">Task completed.</h3>

                </div>
            </div>
            <div class = "row">
                <div class = "col1">
                    <img src = "calories.jpg">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Calories</h4>
                    <p>Daily Calorie Intake<br>
                        An ideal daily intake of calories varies depending on age, metabolism and
                        levels of physical activity, among other things. Generally, the recommended
                        daily calorie intake is 2,000 calories a day for women and 2,500 for men.
                    </p><br>
                    <h3><input type="checkbox" id="Calories">Task completed.</h3>
                </div>
            </div>
            <div class = "row">
                <div class = "col1">
                    <img src = "sleep.jpg">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Sleep</h4>
                    <p>Getting up to 8 hours of sleep per day.<br>
                        Getting good quality sleep can help you feel like your best self.
                        Healthy sleep patterns improve learning, memory, creativity, and mood.
                    </p><br>
                    <h3><input type="checkbox" id="Sleep">Task completed.</h3>
                </div>
            </div>
            <div class = "row">
                <div class = "col1">
                    <img src = "water.png">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Hydration</h4>
                    <p>Drink 2-3 liters of water daily.<br>
                        Drinking plenty of water throughout the day is important so you're
                        already hydrated by the time you start sweating.
                    </p><br>
                    <h3><input type="checkbox" id="Hydration">Task completed.</h3>
                </div>
            </div>
            <div class = "row">
                <div class = "col1">
                    <img src = "plank.png">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Plank</h4>
                    <p>Hold for up to 10 breaths.<br>
                        Make sure your hips aren't drooping toward the floor or hiked up
                        toward the celing. Don't lock your elbows.
                    </p><br>
                    <h3><input type="checkbox" id="Plank">Task completed.</h3>
                </div>
            </div>
            <div class = "row">
                <div class = "col1">
                    <img src = "lunges.jpg">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Lunges</h4>
                    <p>Complete 3 sets of 10 reps.<br>
                        Keep your torso straight and core engaged as you bend your knees,
                        lowering your body toward the floor.
                    </p><br>
                    <h3><input type="checkbox" id="Lunges">Task completed.</h3>
                </div>
            </div>
            <div class = "row">
                <div class = "col1">
                    <img src = "pushups.jpg">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Pushups</h4>
                    <p>Complete 3 sets of 20 raps.<br>
                        Don't let the lower back collapse or the hips dip when moving to
                        plank. Keep the abs engaged.
                    </p><br>
                    <h3><input type="checkbox" id="Pushups">Task completed.</h3>
                </div>
            </div>
            <div class = "row">
                <div class = "col1">
                    <img src = "squats.jpg">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Squats</h4>
                    <p>Complete 3 sets of 20 reps.<br>
                        Keep your core engaged and your back straight as you bring
                        each knee forward.
                    </p><br>
                    <h3><input type="checkbox" id="Squats">Task completed.</h3>
                </div>
            </div>
            <div class = "row">
                <div class = "col1">
                    <img src = "frogy.jpg">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Froggy Jumps</h4>
                    <p>Complete 3 sets of 10 reps.<br>
                        Use your glutes, quads and hamstring when jumping. Bend
                        the knees when landing, to protect the joints.
                    </p><br>
                    <h3><input type="checkbox" id="Froggy Jumps">Task completed.</h3>
                </div>
            </div>
            <div class = "row">
                <div class = "col1">
                    <img src = "stretch.jpg">
                </div>
                <div class = "col2">
                    <br>
                    <h4>Quad Stretch</h4>
                    <p>Complete 2 sets of 20 reps.<br>
                        While standing in one feet, try to get the other one
                        as close to your back as possible. Try to keep your
                        knees together.
                    </p><br>
                    <h3><input type="checkbox" id="Quad Stretch">Task completed.</h3>
                </div>
            </div>

            <!--           <br><a href="./chart.php">-->
            <input type="submit" class="button" value="Submit tasks to see your weekly progress">

            <input type="button" class="button" id="show1" value="See your weekly progress">

            <input type="button" class="button" id="show2" value="See your total progress">
            <!--            </inputbutton></a>-->
            <!--            <a href="./chart.php">Chart</a>-->
        </form>

    </div>

    <div class="footer">
        <footer>
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
<script>


    document.getElementById("show1").addEventListener("click",showWeeklyChart,false);
    document.getElementById("show2").addEventListener("click",showTotalProgres,false);

    $(document).ready(function () {
        $("#data").submit(function (e) {
            e.preventDefault();
            data();
        });

        function data() {

            var names = ["steps","calories","sleep","Hydration","Plank","Lunges","Pushups","Squats","Froggy_Jumps","Quad_Strech"];
            var bools = [0,0,0,0,0,0,0,0,0,0];
            var elements = [document.getElementById("Steps"),document.getElementById("Calories"),document.getElementById("Sleep"),document.getElementById("Hydration"),document.getElementById("Plank"),document.getElementById("Lunges"),document.getElementById("Pushups"),document.getElementById("Squats"),document.getElementById("Froggy Jumps"),document.getElementById("Quad Stretch")];

            var data = new FormData();
            data.append("action", "data")

            for(var i=0 ; i< names.length ; i++){
                if(elements[i].checked){
                    bools[i]=1;
                }
                data.append(names[i],bools[i])
            }

            $.ajax({
                type: "POST",
                url: "update_data.php",
                async: false,
                cache: false,
                processData: false,
                data: data,
                contentType: false,
                success: function (response, status, call) {
                    response = JSON.parse(response);

                    if (call.status == 201) {
                        uncheck(elements);
                        window.location.href = "./chart.php";
                    } else{
                        Swal.fire('Error',response.message, 'error')
                    }

                    if(call.status == 203){
                        Swal.fire('Warning',"Today's progress has been submitted", 'warning')
                    } else {
                        Swal.fire('Success',response.message, 'success')
                    }
                }
            });
        }

        function uncheck(elements) {
            for (var i = 0; i < elements.length; i++) {
                elements[i].checked = false;
            }
        }

        function formatDate(date) {
            d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }
    });


    function showWeeklyChart(){
        window.location.href = "./chart.php";
    }

    function showTotalProgres(){
        window.location.href = "./features3.php";
    }

</script>
</html>