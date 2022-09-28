
//for a login page
var state=false;
function eye(){
    if(state){
        document.getElementById("login-eye").setAttribute("type","password");
        document.getElementById("login-p-eye").style.color='#7a797e';
        state=false;
    }
    else{
        document.getElementById("login-eye").setAttribute("type","text");
        document.getElementById("login-p-eye").style.color='#5887ef';

        state=true;
    }
}



 //for a signup page 
 var state1=false;
 function eye1(){
     if(state1){
         document.getElementById("sign_peye").setAttribute("type","password");
         document.getElementById("sign_p_eye").style.color='#7a797e';
         state1=false;
     }
     else{
         document.getElementById("sign_peye").setAttribute("type","text");
         document.getElementById("sign_p_eye").style.color='#5887ef';

         state1=true;
     }
 }
 var state2=false;
 function eye2(){
     if(state2){
         document.getElementById("sign_ceye").setAttribute("type","password");
         document.getElementById("sign_c_eye").style.color='#7a797e';
         state2=false;
     }
     else{
         document.getElementById("sign_ceye").setAttribute("type","text");
         document.getElementById("sign_c_eye").style.color='#5887ef';
         state2=true;
     }
 }