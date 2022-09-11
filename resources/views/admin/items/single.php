<div class="container text-left">
    <h1 class="text-center"><?= htmlspecialchars($data->item->item_title) ?></h1>
    <hr>
    <div class="my-5 d-flex justify-content-end">
        <a href="/admin/news" class="mx-1 btn btn-primary btn-sm">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <a href="/admin/news/edit?id=<?= $data->item->id ?>" class="btn btn-warning btn-sm mx-1">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <form action="/admin/news/delete" method="item" class="mx-1">
            <input type="hidden" name="news_id" value="<?= $data->item->id ?>">
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    </div>
    <div class="my-3">
        <strong class="d-block">Content</strong>
        <?= htmlspecialchars($data->item->item_content) ?>
    </div>
    <div class="my-3">
        <strong class="d-block">Excerpt</strong>
        <?= htmlspecialchars($data->item->item_excerpt) ?>
    </div>
    <div class="my-3">
        <strong class="d-block">Author</strong>
        <?= $data->item->item_author ?>
    </div>
    <div class="my-3">
        <strong class="d-block">Created At</strong>
        <?= $data->item->created_at ?>
    </div>
    <div class="my-3">
        <strong class="d-block">Updated At</strong>
        <?= $data->item->updated_at ?>
    </div>
 



</div>