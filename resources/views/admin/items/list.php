<div class="container">
    <h1 class="text-center">items List</h1>
    <hr>

    <div class="d-flex w-100 justify-content-end">
        <a href="/admin/items/add" class="btn btn-success">Add items</a>
    </div>

    <table class="table table-hover my-5">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->items as $item) : ?>
                <tr>
                    <td><?= htmlspecialchars($item->item_title) ?></td>
                    <td><?= $item->item_author; ?></td>
                    <td><?= $item->created_at; ?></td>
                    <td><?= $item->updated_at; ?></td>
                    <td class="d-flex">
                        <a href="/admin/items/single?id=<?= $item->id ?>" class="mx-1 btn btn-primary btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="/admin/items/edit?id=<?= $item->id ?>" class="btn btn-warning btn-sm mx-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/admin/items/delete" method="item" class="mx-1">
                            <input type="hidden" name="items_id" value="<?= $item->id ?>">
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