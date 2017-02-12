<!-- Assembly page. Displays Contents -->
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="container-fluid">
    <h2> Assembly Robot </h2>
    </br>
    <table class="table table-condensed">
        <tr>
            <th>Assembled Robot</th>
            <th>Options</th>
        </tr>
        <tr>
            <td>
                <div >
                    <!-- The initial robot displayed. -->
                    <img src="../assets/images/parts/{head1}" id="HeadImage" class="assembly_image"/> </br>
                    <img src="../assets/images/parts/{body1}" id="BodyImage" class="assembly_image"/> </br>
                    <img src="../assets/images/parts/{feet1}" id="FeetImage" class="assembly_image"/>
                </div>
            </td>
            <td class="container">
                <h4> Head: </h4>
                <div class="parts_container">
                    <!-- Different robot heads to choose from, using the file name as id which is passed to a function to change to the selected part.  -->
                    <input type="radio" name="head" id="{head1}" onchange="changeHeadImage(this)" />A
                    <input type="radio" name="head" id="{head2}" onchange="changeHeadImage(this)" />B
                    <input type="radio" name="head" id="{head3}" onchange="changeHeadImage(this)" />C
                    <input type="radio" name="head" id="{head4}" onchange="changeHeadImage(this)" />M
                    <input type="radio" name="head" id="{head5}" onchange="changeHeadImage(this)" />R
                    <input type="radio" name="head" id="{head6}" onchange="changeHeadImage(this)" />W
                </div>
                <h4> Body: </h4>
                <div class="parts_container">
                    <!-- Different robot bodies to choose from, using the file name as id which is passed to a function to change to the selected part. -->
                    <input type="radio" name="body" id="{body1}" onchange="changeBodyImage(this)" />A
                    <input type="radio" name="body" id="{body2}" onchange="changeBodyImage(this)" />B
                    <input type="radio" name="body" id="{body3}" onchange="changeBodyImage(this)" />C
                    <input type="radio" name="body" id="{body4}" onchange="changeBodyImage(this)" />M
                    <input type="radio" name="body" id="{body5}" onchange="changeBodyImage(this)" />R
                    <input type="radio" name="body" id="{body6}" onchange="changeBodyImage(this)" />W
                </div>
                <h4> Feet: </h4>
                <div class="parts_container">
                    <!-- Different robot feet to choose from, using the file name as id which is passed to a function to change to the selected part.  -->
                    <input type="radio" name="feet" id="{feet1}" onchange="changeFeetImage(this)" />A
                    <input type="radio" name="feet" id="{feet2}" onchange="changeFeetImage(this)" />B
                    <input type="radio" name="feet" id="{feet3}" onchange="changeFeetImage(this)" />C
                    <input type="radio" name="feet" id="{feet4}" onchange="changeFeetImage(this)" />M
                    <input type="radio" name="feet" id="{feet5}" onchange="changeFeetImage(this)" />R
                    <input type="radio" name="feet" id="{feet6}" onchange="changeFeetImage(this)" />W
                </div>
                <div class="btn-space">
                    <input type="button" class="btn btn-primary" value="Build it"></input>        
                    <input type="button" class="btn btn-danger" value="Return to Head Office"></input> 
                </div>

            </td>
        </tr>

    </table>        

</div>
