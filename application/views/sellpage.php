<div class="container-fluid">
    <h2>{pagetitle}</h2>
	{pagination}
	 <table class="table table-bordered sortable">
        <tr>
            <th>ID</th>
            <th>Head</th>
            <th>Torso</th>
            <th>Legs</th>         
            
        </tr>
        
        {transaction}
        <tr>
        <td>{id}</td>
        <td>{head}</td>        
        <td>{torso}</td>
        <td>{legs}</td>
        </tr>
        {/transaction}
    </table>
	<div class="col-lg-3 col-md-6">
        <div>Enter id of bot to sell</div>
        <br>
        <form action="/sell/sellbot" method ="POST" >
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        {message}
    </div>