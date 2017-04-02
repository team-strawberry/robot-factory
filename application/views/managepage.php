<!-- History page. Displays Contents -->

<div class="container-fluid">
    <!-- title of the page -->
    <h2>{pagetitle}</h2> 

    <br>
    <div class="col-lg-3 col-md-6">
        <div>Registration to Panda Research Centre</div>
        <br>
        <form action="/manage/register" method ="POST" >
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        {message}
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <form action="/manage/reboot" method="POST">
                <input type="submit" value="Reboot">
            </form>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <a href = "egn"><h2>Display/Edit Key Value Pairs</h2></a>  
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <a href = "sell"><h2>Sell bots</h2></a>  
        </div>
    </div>
</div>