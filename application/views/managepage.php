<!-- History page. Displays Contents -->

<div class="container-fluid">
    <!-- title of the page -->
    <h2>{pagetitle}</h2> 

    <br>
    <table class='table table-bordered'>
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
            <div class="text-danger">Reboot Current Division</div>
            <br><br>
            <form action="/manage/reboot" method="POST">
                <input class="btn btn-danger" type="submit" value="Reboot">
            </form>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="text-primary">Sell Robots to Panda Research Centre</div>
            <br><br>
            <a href = "sell"><button class="btn btn-primary">Sell</button>  
        </div>
    </table>
</div>