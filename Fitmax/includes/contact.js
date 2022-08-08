var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {

});

function printError(elemId, Msg) {
	document.getElementById(elemId).innerHTML = Msg;
	document.getElementById(elemId).style.color = "#c1caca";
	}

function validateForm(){
    let name = document.myform.Name.value; 
    let email = document.myform.Email.value; 
    let sex = document.myform.Sex.value;
    let number = document.myform.Number.value;
    let age = document.myform.Age.value;
    let message = document.myform.Message.value;
    let sub1='';let sub2='' ;let sub3='';let sub4='';
    let display_message;
    
    if (document.getElementById("subject1").checked){
        sub1 = document.myform.diet.value;
    }

    if (document.getElementById("subject2").checked){
        sub2 = document.myform.workout.value;
    }

    if (document.getElementById("subject3").checked){
        sub3 = document.myform.bmi.value;
    }

    if (document.getElementById("subject4").checked){
        sub4 = document.myform.other.value;
    }

    // Validate Name
    if (name == ''){
    	printError('nameErr',"Please provide your Name");
        document.myform.Name.focus();
        return false;
    }
    else{
        let regex_name = /^[a-zA-Z\s]+$/;
        if (regex_name.test(name)){
        	printError('nameErr',"");
        }
        else{
        	printError('nameErr',"Please enter a valid Name");
            document.myform.Name.focus();
            return false;
        }
    }

    // Validate Email
    if (email == ''){
        printError('emailErr',"Please provide your Email");
        document.myform.Email.focus();
        return false;
    }
    else{
        let regex_email = /^\w+@\w+\.\w+$/;
        if (regex_email.test(email)){
        	printError('emailErr',"");
        }
        else{
        	printError('emailErr',"Please enter a valid Email");
            document.myform.Email.focus();
            return false;
        }
    }

    //Validate Number
    if (number == ''){
    	printError('phoneErr',"Please give your number");
        document.myform.Number.focus();
        return false;
    }
    else{
        if (number.length == 10){
        	printError('phoneErr',"");
        }
        else{
        	printError('phoneErr',"Please give a valid number");
            document.myform.Number.focus();
            return false;        
        }
    }

    // Validate Gender
    if (sex == ''){
    	printError('sexErr',"Please select your Gender");
        return false;
    }
    else{
    	printError('sexErr',"");
    }

    // Validate Age
    if (age == ''){
    	printError('ageErr',"Please provide your Age");
        document.myform.Age.focus();
        return false;
    }
    else{
        if (age<0){
        	printError('ageErr',"Please provide a valid Age");
            document.myform.Age.focus();
            return false;        
        }
        else{
        	printError('ageErr',"");
        }
    }

    // Validate Message
    if (message == ''){
    	printError('msgErr',"Please share your problem/feedback");
        document.myform.Message.focus();
        return false;
    }
    else{
    	printError('msgErr',"Please share your problem/feedback");
    }

    display_message = "\nName: "+name+"\nEmail: "+email+"\nPhone Number: "+number+"\nGender: "+sex+"\nAge: "+age+"\nHelp Needed: "+sub1+" "+sub2+" "+sub3+" "+sub4+"\nMessage: "+message;

    alert("Thank You for contacting FITMAX\nYour Info received:\n"+display_message+"\nFor any changes mail us at Harshang@fitmax.in");
}


function myfocus(myid){
    document.getElementById(myid).style.color = "black";
    document.getElementById(myid).style.background = "white";    
}

function myblur(myid){
    document.getElementById(myid).style.color = "rgb(193, 202, 202)";
    document.getElementById(myid).style.background = "rgba(0,0,0,0.3)";    
}

function resetform(){
    document.myform.Name.value = ''; 
    document.myform.Email.value = ''; 
    document.myform.Sex.value = '';
    document.myform.Number.value = '';
    document.myform.Age.value = '';
    document.myform.Message.value = '';
    document.getElementById("subject1").checked = false;
    document.getElementById("subject2").checked = false;
    document.getElementById("subject3").checked = false;
    document.getElementById("subject4").checked = false;
}    

