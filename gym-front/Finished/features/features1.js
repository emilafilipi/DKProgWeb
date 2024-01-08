
var today = new Date();
var dd = today.getDate();

var mm = today.getMonth()+1;
var yyyy = today.getFullYear();
if(dd<10)
{
    dd='0'+dd;
}

if(mm<10)
{
    mm='0'+mm;
}
today = yyyy+'-'+mm+'-'+dd;

console.log(today);
function start() {


    var steps = document.getElementById("Steps").checked;
    var calories = document.getElementById("Calories").checked;
    var sleep = document.getElementById("Sleep").checked;
    var hydration = document.getElementById("Hydration").checked;
    var plank = document.getElementById("Plank").checked;
    var lunges = document.getElementById("Lunges").checked;
    var pushups = document.getElementById("Pushups").checked;
    var squats = document.getElementById("Squats").checked;
    var froggyJumps = document.getElementById("Froggy Jummps").checked;
    var quadStretch = document.getElementById("Quad Stretch").checked;
    var date = formatDate(new Date());

    var userID = getUserID();

   // var query = "INSERT INTO `users`.`daily_goals` (userID,date,steps,calories,sleep,Hydration,Plank,Lunges,Pushups,Squats,Froggy Jumps,Quad Strech)" +
    //    "VALUES (userID,date ,steps,calories,sleep,hydration,plank,lunges,pushups,squats,froggyJumps,quadStretch) ";  //how to get the email of the user who is logged in


}


function getUserID() {
    var userID;
    fetch('update_data.php')
        .then(response => {
            // Check if the response is successful
            if (!response.ok) {
                throw new Error('Failed to get user ID');
            }
            // Parse the JSON response
            return response.json();
        })
        .then(data => {
            // Access the user email from the response
            userID = data.userID;
            console.log('User ID:', userID);

            // You can use userEmail in your JavaScript code as needed
        })
        .catch(error => {
            console.error('Error:', error.message);
            // Handle errors, e.g., redirect to login page
        });
    return userID;
}

//
//     $.ajax({
//         type: "POST",
//         url: "chart.php",
//         // dataType: 'json',
//         async: false,
//         cache: false,
//         processData: false,
//         data: data,
//         contentType: false,
//         // success: function (response, status, call) {
//         //     response = JSON.parse(response);
//         //
//         //     if (call.status == 200) {
//         //         window.location.href = "../index.html";
//         //     } else {
//         //         $("#" + response.tag).text(response.message);
//         //         Swal.fire('Error', response.message, 'error')
//         //     }
//         // },
//     });
// }
//
// // var date = new Date();
// function formatDate(date) {
//     var d = new Date(date),
//         month = '' + (d.getMonth() + 1),
//         day = '' + d.getDate(),
//         year = d.getFullYear();
//
//     if (month.length < 2)
//         month = '0' + month;
//     if (day.length < 2)
//         day = '0' + day;
//
//     return [year, month, day].join('-');
// }
//
// // console.log(formatDate(date));