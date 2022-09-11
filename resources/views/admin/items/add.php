<div class="container">
    <h1 class="text-center">Add items</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/items/store">
        <div class="mb-3">
            <label for="itemsTitle" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="itemsTitle">
        </div>
        <div class="mb-3">
            <label for="itemsContent" class="form-label">Content:</label>
            <textarea name="content" class="form-control" id="itemsContent" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="itemsExcerpt" class="form-label">Excerpt:</label>
            <input type="text" name="excerpt" class="form-control" id="itemsExcerpt">
        </div>
        <div class="mb-3">
            <label for="newTags" class="form-label">items Tags:</label>
            <select id="newTags" class="form-select" multiple aria-label="multiple select" name="items_tags[]">
                <?php
                foreach ($data->tags as $tag) {
                    echo "<option value=\"$tag->id\">$tag->name</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="/admin/items" class="btn btn-danger my-3">Cancel</a>

</div>