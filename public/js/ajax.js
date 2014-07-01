window.onload = Ajax("challenges-wrapper","showchallenges.php","");
function Circle(){
	this.color;
	this.id;
		
}

Circle.prototype.Draw = function(){
	document.getElementById(this.id).style.backgroundColor = this.color;	
};

Circle.prototype.AddEventListener = function(){
	document.getElementById(this.id).addEventListener('click',hola,false);	
}

function hola(e){
alert('hej');	
}

var circles = [];

for (var i = 0; i <5;i++){
	circles[i] = new Circle();	
}

var counter=0;
var myInterval;
var color;
var score = 0;
var counterquestion = 0;
var checkClicked = false;

var wrong = new Audio("sound/wrong.wav"); 
var right = new Audio("sound/right.wav");
var flip = new Audio("sound/flip.wav");
var start = new Audio("sound/start.wav");

//showQuestion ajax function that takes category id to show questions. it also checks to see if checkClicked in false in order to start, otherwise it will not start. At the start we add counterquestion++ in order to know that with each click we move to another question, and we change checkClicked to true, so that it only works once.
function showQuestion(category_id){
if(!checkClicked){
	flip.play();
	counterquestion++;
	checkClicked = true;
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
		}
	else
		{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange = function()
		{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
	if(counterquestion >= 5){
		Ajax("game-wrapper","showResult.php?score=",score);	
		}
	else{
		
		
		document.getElementById("game-wrapper").innerHTML=xmlhttp.responseText;
			if(counterquestion > 1){
				for(var i = 0; i<circles.length;i++){
				circles[i].Draw();
				
				}
			}
		}
	}
	}
	xmlhttp.open("GET","showquestion.php?cat_id="+category_id,true);
	xmlhttp.send();
}
}

//standard ajax function we call whenever we need to change a div with ajax
function Ajax(div,site,extra){
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
		}
	else
		{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
		document.getElementById(div).innerHTML=xmlhttp.responseText;
		scrollbar();
		}
	}
	xmlhttp.open("GET",site+extra,true);
	xmlhttp.send();
}


function newChallenge(id,name){
	if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
		}
	else
		{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("challenges-wrapper").innerHTML=xmlhttp.responseText;
			//changeText(id);
		}
	}
	xmlhttp.open("GET","newchallenge.php?id="+id+"&name="+name,true);
	xmlhttp.send();
}

//javascript function that makes green answer flash a little bit
function flashtext(ele,col) {
	document.getElementById( ele ).style.backgroundColor = "#00CD00";
	counter++;
	var tmpColCheck = document.getElementById( ele ).style.backgroundColor;
	
	if(counter>3){
	clearInterval(myInterval);
	}
	if (color == "s"){
	color = "g";
	document.getElementById( ele ).style.opacity = "1";
	
	} else {
	color = "s";
	document.getElementById( ele ).style.opacity = "0.9";
	
	}
}

//function to check the answer clicked, and if it's wrong, show the correct one as well.
function checkAnswer(answer_id,value,question_id){
if(checkClicked){
	checkClicked = false;
	value = value.toString();
	var c = value.charAt(value.length-1);
	var id = value.substring(0,value.length-1);
	
	if(c==0){
	
	document.getElementById("answer"+answer_id).style.backgroundColor ="red";
	wrong.play();
	counter = 0;
	myInterval = setInterval(function(){
	flashtext("answer"+id,'#00C957');
	},300);	
	circles[counterquestion-1].color = "red";
	circles[counterquestion-1].id = counterquestion-1;
	circles[counterquestion-1].Draw();
	//document.getElementById(question_id).style.backgroundColor ="red";	
	
	}
	if(c==1){
	right.play();
	document.getElementById("answer"+id).style.backgroundColor ="#2FDB43";
	//document.getElementById(question_id).style.backgroundColor ="#2FDB43";
	score++;
	
	circles[counterquestion-1].color = "green";
	circles[counterquestion-1].id = counterquestion-1;
	circles[counterquestion-1].Draw();
	
	} 
}
}

function noDisplay(div){
	document.getElementById(div).style.display = "none";
}

function scrollbar(){
	  $(document).ready(function(){

        $('#scrollbar1').tinyscrollbar({ sizethumb: 50 });

    });
}

function changeText(fbid){
	var element = document.getElementById(fbid);
	
	element.innerHTML = "Success!";	
	
	
}