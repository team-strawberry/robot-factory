

<div class="container-fluid">

    <h2>{pagetitle}</h2> 
    <br />    
    <a class="text-danger">{message}</a>


    <br /><br />

    <form method="POST" action="/Assembly/assembleBots">
        <a id='build'>
            <input type="submit" class="btn btn-primary" value="Assemble It"/>
        </a> 
        <a id='return'>
            <input type="submit" class="btn btn-danger" value="Return Parts"/>
        </a>         

        </br>
        </br>

        <div class="container-fluid span"> 
            <table class="table table-bordered table-striped" style="width: 700px">
                <tr>
                    <th class="text-danger text-centered">HEAD</th>
                    <th class="text-danger text-centered">TORSO</th>
                    <th class="text-danger text-centered">LEGS</th>  
                </tr>
                <tr>
                    <td>
                        {head_parts}
                        <img src="/assets/images/parts/{model}{piece}.jpeg" 
                             class="center-block" style="width: 100px"/>                        
                        <input type="radio" name='head' value="{model}{piece}-{id}"/>
                        <p class="text-info">{model}{piece}</p>
                        {/head_parts}
                    </td>  
                    <td> {torso_parts}
                        <img src="/assets/images/parts/{model}{piece}.jpeg" 
                             class="center-block" style="width: 100px"/>
                        <input type="radio" name='torso' value="{model}{piece}-{id}"/>
                        <p class="text-info">{model}{piece}</p>                        
                        {/torso_parts}
                    </td>
                    <td>
                        {legs_parts}
                        <img src="/assets/images/parts/{model}{piece}.jpeg" 
                             class="center-block" style="width: 100px"/>
                        <input type="radio" name='legs' value="{model}{piece}-{id}"/>
                        <p class="text-info">{model}{piece}</p>
                        {/legs_parts} 
                    </td>
                </tr>
            </table>
        </div>

</div>
</form>
