<!-- Single part page. Displays Contents -->

<div class="container-fluid row">
    <h2>Parts Information</h2>
    <div class="span4"><img src="/assets/images/parts/{model}{piece}.jpeg" class="img-thumbnail" title="{model}{piece}"/></div>
    <div class="span8 offset1">
        <table class="table table-bordered">
            <tr>
                <th>Certificate of Authenticity code</th>
                <th>Parts Name</th>
                <th>Date Made</th>
                <th>Date Aquired</th>                    
            </tr>         
            <tr>               
                <td>{id}</td>
                <td>{model}{piece}</td>
                <td>{stamp}</td>
                <td>{aquired_time}</td>               
            </tr>          
        </table>  
    </div>

</div>
