/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function changeHeadImage(element) {
    document.getElementById("HeadImage").src = "../assets/images/parts/" + element.id;
    document.getElementById("HeadImage").alt = element.id;
}
function changeBodyImage(element) {
    document.getElementById("BodyImage").src = "../assets/images/parts/" + element.id;
    document.getElementById("BodyImage").alt = element.id;
}
function changeFeetImage(element) {
    document.getElementById("FeetImage").src = "../assets/images/parts/" + element.id;
    document.getElementById("FeetImage").alt = element.id;
}

function assemble() {
   var head = document.getElementById("HeadImage").alt;
   var body = document.getElementById("BodyImage").alt;
   var legs = document.getElementById("FeetImage").alt;
   //ajax
   //you post variables
   var fields = {
      head  : head,
      body  : body,
      legs  : legs,
      submit_a: true
   };
   
   $.ajax({
     url: '/Assembly/insertAssembled',
     type: 'POST',
     data: fields,
     dataType:'JSON',
     success: function(result){
        console.log(result);
        alert('successful ajax');
     }
   });
   
}