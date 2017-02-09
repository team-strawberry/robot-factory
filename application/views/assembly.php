<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            function changeHeadImage(element) {
                document.getElementById("HeadImage").src = "../assets/images/parts/" + element.id;
            }
            function changeBodyImage(element) {
                document.getElementById("BodyImage").src = "../assets/images/parts/" + element.id;
            }
            function changeFeetImage(element) {
                document.getElementById("FeetImage").src = "../assets/images/parts/" + element.id;
            }
        </script>
    </head>
    <body>
        <style type="text/css">         
            #HeadContainer {
                border:2px solid #ccc; 
                width:300px; height: 100px; 
                overflow-y: scroll; 
            }
            #BodyContainer {
                border:2px solid #ccc; 
                width:300px; height: 100px; 
                overflow-y: scroll; 
            }
            #FootContainer {
                border:2px solid #ccc; 
                width:300px; height: 100px; 
                overflow-y: scroll; 
            }
        </style>
        <h1> Robot: </h1>
        <div id="Robot">
            <img src="../assets/images/parts/a1.jpeg" id="HeadImage" /> </br>
            <img src="../assets/images/parts/a2.jpeg" id="BodyImage" /> </br>
            <img src="../assets/images/parts/a3.jpeg" id="FeetImage" />
        </div>
        <input type="button" value="Build it"></input>
        <h1> Head: </h1>
        <div class="container" id="HeadContainer">
            <input type="checkbox" id="a1.jpeg" onchange="changeHeadImage(this)" />A<br />
            <input type="checkbox" id="b1.jpeg" onchange="changeHeadImage(this)" />B<br />
            <input type="checkbox" id="c1.jpeg" onchange="changeHeadImage(this)" />C<br />
            <input type="checkbox" id="m1.jpeg" onchange="changeHeadImage(this)" />M<br />
            <input type="checkbox" id="r1.jpeg" onchange="changeHeadImage(this)" />R<br />
            <input type="checkbox" id="w1.jpeg" onchange="changeHeadImage(this)" />W<br />
        </div>
        <h1> Body: </h1>
        <div class="container" id="BodyContainer">
            <input type="checkbox" id="a2.jpeg" onchange="changeBodyImage(this)" />A<br />
            <input type="checkbox" id="b2.jpeg" onchange="changeBodyImage(this)" />B<br />
            <input type="checkbox" id="c2.jpeg" onchange="changeBodyImage(this)" />C<br />
            <input type="checkbox" id="m2.jpeg" onchange="changeBodyImage(this)" />M<br />
            <input type="checkbox" id="r2.jpeg" onchange="changeBodyImage(this)" />R<br />
            <input type="checkbox" id="w2.jpeg" onchange="changeBodyImage(this)" />W<br />
        </div>
        <h1> Feet: </h1>
        <div class="container" id="FootContainer">
            <input type="checkbox" id="a3.jpeg" onchange="changeFeetImage(this)" />A<br />
            <input type="checkbox" id="b3.jpeg" onchange="changeFeetImage(this)" />B<br />
            <input type="checkbox" id="c3.jpeg" onchange="changeFeetImage(this)" />C<br />
            <input type="checkbox" id="m3.jpeg" onchange="changeFeetImage(this)" />M<br />
            <input type="checkbox" id="r3.jpeg" onchange="changeFeetImage(this)" />R<br />
            <input type="checkbox" id="w3.jpeg" onchange="changeFeetImage(this)" />W<br />
        </div>
        <input type="button" value="Return to Head Office"></input> 
    </body>
</html>
