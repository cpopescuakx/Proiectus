$(document).ready(function(){
    // Al soltar una tecla s'executarà checkPwd
    $("#password").keyup(function(){
        checkPwd();
    });
   });
   
   function checkPwd(){
       // Text
        var val=document.getElementById("password").value;

        // Barra
        var barra=document.getElementById("barraPwd");

        // Nivell de força
        var nivell=0;

        // Comprova que hi hagi text
        if(val!=""){
            // Contrassenya és menor de 8 caràcters
            if(val.length<=8)nivell=1;
        
            // Contrassenya és major de 8 caràcters, conté minúscules i majúscules
            if(val.length>8 && (val.match(/[a-z]/) && (val.match(/[A-Z]/))))nivell=2;
        
            // Contrassenya és major de 8 caràcters, conté minúscules, majúscules i nombres
            if(val.length>8 && (val.match(/[a-z]/) && (val.match(/[A-Z]/)) && val.match(/\d+/)))nivell=3;
        
            // Contrassenya és major de 8 caràcters, conté minúscules, majúscules, nombres i caràcters
            if(val.length>8 && val.match(/[a-z]/) && (val.match(/[A-Z]/)) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))nivell=4;
        
            /**
             * Depenent del nivell s'aplicaran certs canvis a la barra, que consten en longitud i color.
             * També es canviarà el text de baix de la barra.
             * Si no es compleix ningun requisit la barra es buidarà i desapareixerà el text de baix.
             */

            if(nivell==1){
                $("#barraPwd").animate({width:'25%'},300);
                barra.style.backgroundColor="red";
                document.getElementById("textPwdForça").innerHTML="Molt fluixa";
            }
        
            if(nivell==2){
                $("#barraPwd").animate({width:'50%'},300);
                barra.style.backgroundColor="#F5BCA9";
                document.getElementById("textPwdForça").innerHTML="Fluixa";
            }
        
            if(nivell==3){
                $("#barraPwd").animate({width:'75%'},300);
                barra.style.backgroundColor="#FF8000";
                document.getElementById("textPwdForça").innerHTML="Forta";
            }
        
            if(nivell==4){
                $("#barraPwd").animate({width:'100%'},300);
                barra.style.backgroundColor="#00FF40";
                document.getElementById("textPwdForça").innerHTML="Molt Forta";
            }
            }
        
            else{
                $("#barraPwd").animate({width:'0%'},300);
                document.getElementById("textPwdForça").innerHTML="";
        }
   }