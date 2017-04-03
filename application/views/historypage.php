<!-- History page. Displays Contents -->

<div class="container-fluid">
    <h2>{pagetitle}</h2>

    {pagination}

    <ul class="nav nav-pills">       
        <li><a href="/History/page/1/modelDesc">By Model - Desc</a></li>
        <li><a href="/History/page/1/modelAsc">By Model - Asc</a></li>
        <li><a href="/History/page/1/dateDesc">By Date/Time - Desc</a></li>
        <li><a href="/History/page/1/dateAsc">By Date/Time - Asc</a></li>  
    </ul>

    <br/>

    <label>Model:</label>
    <form class="form-inline" role="form" method="post" action="/History/modelFilter">   
        <select style="width:100px" name="model" class="form-control" id="model">
            <option value="modelA" type="submit">Model A</option>
            <option value="modelB" type="submit">Model B</option>
            <option value="modelC" type="submit">Model C</option>
            <option value="modelM" type="submit">Model M</option>
            <option value="modelR" type="submit">Model R</option>
            <option value="modelW" type="submit">Model W</option>          
        </select>    
        <button type="submit" class="btn btn-primary">Submit</button>    
    </form> 


    <br/>    
    <table class="table table-bordered sortable">
        <tr>
            <th>Transaction</th>
            <th>Action</th>
            <th>Model</th>
            <th>Amount</th>         
            <th>Plant</th>            
            <th>Date/Time</th>
        </tr>

        {transaction}
        <tr>
            <td>{id}</td>
            <td>{action}</td>        
            <td>{model}</td>
            <td>{amount}</td>
            <td>{plant}</td>        
            <td>{stamp}</td>
        </tr>
        {/transaction}
    </table>

</div>