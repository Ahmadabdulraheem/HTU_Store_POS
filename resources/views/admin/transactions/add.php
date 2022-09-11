<div class="container">
    <h1 class="text-center">Add transaction</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/transactions/store">
        <div class="mb-3">
            <label for="transactionsName" class="form-label">transaction Name:</label>
            <input type="text" name="transaction_name" class="form-control" id="transactionsName">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/admin/transactions" class="btn btn-danger my-3">Cancel</a>

</div>