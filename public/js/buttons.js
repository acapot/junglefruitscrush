function changeButtonNameCall(e){
	buttonObj.nnn(e);
}


//Constructor to show or hide the documents in my CV	
function Button (){	
this.init=function(){
if(document.getElementsByClassName('answerbutton')){
this.buttonShow=document.getElementsByClassName('answerbutton');

addCrossBrowseEventListener(this.buttonShow, 'click',changeButtonNameCall);

}
}

this.nnn=function(e){
console.log('aa');
}


}


var buttonObj = new Button();






