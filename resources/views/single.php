<div class="container my-5">
    <h1 class="text-center"><?= htmlspecialchars($data->item->item_name) ?></h1>
    <hr>

    <div class="my-3">
        <strong class="d-block">cost</strong>
        <?= $data->item->cost ?>
    </div>
    <div class="my-3">
        <strong class="d-block">Created At</strong>
        <?= $data->item->created_at ?>
    </div>
    <div class="my-3">
        <strong class="d-block">Content</strong>
        <?= htmlspecialchars($data->item->selling_price) ?>
    </div>
   
    ?>
</div>