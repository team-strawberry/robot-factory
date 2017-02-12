<!-- History page. Displays Contents -->

<div class="container-fluid">
    <!-- title of the page -->
    <h2>History</h2>

    <!-- creates the table -->
    <table class="table table-bordered">
        <!-- defines the table rows -->
        <tr>
            <!-- defines the table header -->
            <th>Model</th>
            <th>Transaction</th>
            <th>Price</th>
            <th>Date</th>
            <th>Time</th>    
        </tr>
        <!-- calls the transaction -->
        {transaction}

        <!-- defines the table rows
        <tr>
        <!-- defines the table data -->
        <td>{model}</td>
        <td>{transaction}</td>
        <td>{price}</td>
        <td>{date}</td>
        <td>{time}</td>
        </tr>
        <!-- calls the transaction -->
        {/transaction}
    </table>

</div>