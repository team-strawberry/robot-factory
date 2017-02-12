/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function changeHeadImage(element) {
    document.getElementById("HeadImage").src = "../assets/images/parts/" + element.id;
}
function changeBodyImage(element) {
    document.getElementById("BodyImage").src = "../assets/images/parts/" + element.id;
}
function changeFeetImage(element) {
    document.getElementById("FeetImage").src = "../assets/images/parts/" + element.id;
}

