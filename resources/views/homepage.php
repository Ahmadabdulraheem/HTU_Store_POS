<div class="container my-5">
    <h1 class="text-center"><?= $data->options->title; ?></h1>
    <p class="text-center"><?= $data->options->slogan; ?></p>
    <hr>


    <div class="news-list my-5">
        <?php

        foreach ($data->items as $items) { ?>

            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $items->post_title ?></h5>
                    <p class="card-text"><?= $items->post_excerpt ?></p>
                    <a href="/single?id=<?= $items->id ?>" class="btn btn-primary">Check items</a>
                </div>
            </div>

        <?php
        }

        ?>
    </div>



</div>