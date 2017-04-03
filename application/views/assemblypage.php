<div class="container-fluid">

    <h2>{pagetitle}</h2> 
    <br />

    <a class="text-danger">{message}</a>

    <br /><br />


    <form method="POST" action="/Assembly/assembleBots">
        <div id='build'>
            <input type="submit" class="btn btn-primary" value="bulild"/>
            </a> 
            <div id='return'>
                <input type="submit" class="btn btn-danger" value="return"/>
            </div>         

            </br>
            </br>

            <div class="container-fluid span"> 
                <table class="table table-bordered">
                    <tr>
                        <th class="text-danger text-centered">HEAD</th>
                        <th class="text-danger text-centered">TORSO</th>
                        <th class="text-danger text-centered">LEGS</th>  
                    </tr>
                    <tr>

                        <td>
                            {head_parts}

                            <img src="/assets/images/parts/{model}{piece}.jpeg" 
                                 class="center-block cell_part_image"/>
                            <p class="text-info text-centered">{model}{piece}</p>
                            <input type="checkbox" name='head' value="{model}{piece}-{id}">

                            {/head_parts}
                        </td>  


                        <td> {torso_parts}

                            <img src="/assets/images/parts/{model}{piece}.jpeg" 
                                 class="center-block cell_part_image img-responsive"/>
                            <p class="text-info text-centered">{model}{piece}</p>
                            <input type="checkbox" name='torso' value="{model}{piece}-{id}">

                            {/torso_parts}
                        </td>


                        <td>
                            {legs_parts}

                            <img src="/assets/images/parts/{model}{piece}.jpeg" 
                                 class="center-block cell_part_image img-responsive"/>
                            <p class="text-info text-centered">{model}{piece}</p>
                            <input type="checkbox" name='legs' value="{model}{piece}-{id}">

                            {/legs_parts} 
                        </td>

                    </tr>
                </table>

            </div>

        </div>
    </form>
