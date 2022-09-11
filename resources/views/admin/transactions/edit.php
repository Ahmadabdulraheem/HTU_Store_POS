<div class="container">
    <h1 class="text-center">Edit transaction</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/transactions/update">
        <input type="hidden" name="id" value="<?= $data->item->id ?>">
        <div class="mb-3">
            <label for="transactionsTitle" class="form-label">transaction Name:</label>
            <input type="text" name="transaction_name" class="form-control" id="transactionsTitle" value="<?= $data->item->name ?>">
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>

    <a href="/admin/transactions" class="btn btn-danger my-3">Cancel</a>

</div>