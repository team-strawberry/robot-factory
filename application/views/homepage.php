<!-- Home page. Displays Contents -->

<div class="continer-fluid">
    <h1>Umbrella Corporation</h1>        
    <h2>Robot Factory</h2> 
    <div class="text-danger span"> </br> 
        <h3>Strawberry Division</h3></div>
    <table class="table table-bordered">
        <tr>
            <th>Parts on hand</th>
            <th>Assembled bots</th>
            <th>Spent</th>
            <th>Earned</th>
        </tr>
        {numbers}
        <tr>
            <td>{numParts}</td>
            <td>{numBots}</td>
            <td>{monSpent}</td>
            <td>{monEarned}</td>               
        </tr>
        {/numbers}
    </table>
</div>