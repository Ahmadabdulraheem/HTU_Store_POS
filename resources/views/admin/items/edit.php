<div class="container">
    <h1 class="text-center">Edit items</h1>
    <hr>

    <form class="w-75" method="POST" action="/admin/items/update">
        <input type="hidden" name="id" value="<?= $data->item->id ?>">
        <div class="mb-3">
            <label for="itemsTitle" class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" id="itemsTitle" value="<?= htmlspecialchars($data->item->item_title) ?>">
        </div>
        <div class="mb-3">
            <label for="itemsContent" class="form-label">Content:</label>
            <textarea name="content" class="form-control" id="itemsContent" rows="10">
                <?= htmlspecialchars($data->item->item_content) ?>
            </textarea>
        </div>
        <div class="mb-3">
            <label for="itemsExcerpt" class="form-label">Excerpt:</label>
            <input type="text" name="excerpt" class="form-control" id="itemsExcerpt" value="<?= htmlspecialchars($data->item->item_excerpt) ?>">
        </div>
        <div class="mb-3">
            <label for="newTags" class="form-label">items Tags:</label>
            <select id="newTags" class="form-select" multiple aria-label="multiple select" name="items_tags[]">
                <?php
                $switch_tag = false;
                foreach ($data->all_tags as $tag) {
                    foreach ($data->selected_tags as $selected_tag) {
                        if($selected_tag->id == $tag->id){
                            $tag->name = htmlspecialchars($tag->name);
                            echo "<option selected value=\"$tag->id\">$tag->name</option>";
                            $switch_tag = true;
                        }
                        continue;
                    }

                    if(!$switch_tag){
                        $tag->name = htmlspecialchars($tag->name);
                        echo "<option value=\"$tag->id\">$tag->name</option>";
                    }
                    $switch_tag = false;
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>

    <a href="/admin/items" class="btn btn-danger my-3">Cancel</a>

</div>