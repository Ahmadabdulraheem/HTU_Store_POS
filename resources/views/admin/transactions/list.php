<div class="container">
    <h1 class="text-center">transactions List</h1>
    <hr>


    <div class="d-flex w-100 justify-content-end">
        <a href="/admin/transactions/add" class="btn btn-success">Add transaction</a>
    </div>

    <table class="table table-hover my-5">
        <thead>
            <tr>
                <th scope="col">transaction Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
           <?php 
           foreach ( $data->transactions as $transaction ) : ?>
                <tr>
                    <td><?= $transaction->name; ?></td>
                    <td class="d-flex">
                        <a href="/admin/transactions/single?id=<?= $transaction->id ?>" class="mx-1 btn btn-primary btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="/admin/transactions/edit?id=<?= $transaction->id ?>" class="btn btn-warning btn-sm mx-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/transactions/delete" method="post" class="mx-1">
                            <input type="hidden" name="transaction_id" value="<?= $transaction->id ?>">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                
           <?php endforeach; ?>
        </tbody>
    </table>
</div>