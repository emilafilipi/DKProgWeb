/*--Ne momentin qe klikohet butoni submit pastrohet input field dhe behet log
        mund te perdoret dhe input type="reset" ne vend te nje butoni ne rast lidhjeje me backend
        Nese emaili eshte bosh apo s'ka format te sakte e lajmeron userin
*/

function validateEmail() {
    let email = document.getElementById("input-field");
    let messageText = document.getElementById("input-p");
    //Kontrollon nese emaili eshte valid apo jo me regular expressions
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    //Metode e regex object per te testuar nje vlere stringu ne baze te regex te dhene
    let valid = emailPattern.test(email.value); 
    if(email.value=="" || !valid){
        messageText.innerHTML = "Please submit a valid email!";
    }
    else{
        console.log(email.value);
        email.value = "";
        messageText.innerHTML = "Email submitted succesfully";
    }
}
  