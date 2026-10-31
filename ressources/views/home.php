<?php

?>

<?php component('header') ?>

<main>
    <section>
        <?php component('section-title', ['title' => 'Reset the app']) ?>
        <p>Go to <a class="link" href="<?= APP_URL . '/reset' ?>">reset</a> to reset the application data.</p>
    </section>
    <section>
        <?php component('section-title', ['title' => 'Sandbox']) ?>
        <p>Go to <a class="link" href="<?= APP_URL . '/sandbox' ?>">sandbox</a> to test code snippets.</p>
    </section>
    <section>
        <?php component('section-title', ['title' => 'API']) ?>
        <h4>Some of endpoints:</h4>
        <ul>
            <li><a class="link" href="<?= APP_URL . '/api/posts' ?>"><?= APP_URL . '/api/posts' ?></a> - Get all posts (GET)</li>
            <li><a class="link" href="<?= APP_URL . '/api/posts/mon-premier-post' ?>"><?= APP_URL . '/api/posts/{slug}' ?></a> - Get a post by slug (GET)</li>
        </ul>
    </section>
    <section>
        <?php component('section-title', ['title' => 'Posts']) ?>
        <p>Go to the <a class="link" href="<?= APP_URL . '/posts' ?>">posts page</a> to see all posts.</p>
    </section>
    <section>
        <?php component('section-title', ['title' => 'Buttons']) ?>
        <div>
            <?php component('button', ['href' => APP_URL, 'label' => 'Lorem', 'color' => 'light', 'outline' => false]) ?>
            <?php component('button', ['href' => APP_URL, 'label' => 'Lorem', 'color' => 'light', 'outline' => true]) ?>
            <?php component('button', ['href' => APP_URL, 'label' => 'Lorem', 'color' => 'dark', 'outline' => false]) ?>
            <?php component('button', ['href' => APP_URL, 'label' => 'Lorem', 'color' => 'dark', 'outline' => true]) ?>
            <?php component('button', ['href' => APP_URL, 'label' => 'Lorem', 'color' => 'danger', 'outline' => false]) ?>
            <?php component('button', ['href' => APP_URL, 'label' => 'Lorem', 'color' => 'warning', 'outline' => false]) ?>
            <?php component('button', ['href' => APP_URL, 'label' => 'Lorem', 'color' => 'success', 'outline' => false]) ?>
            <?php component('button', ['href' => APP_URL, 'label' => 'Lorem', 'color' => 'info', 'outline' => false]) ?>
        </div>
    </section>
    <section>
        <?php component('section-title', ['title' => 'Pills']) ?>
        <div>
            <?php component('pill', ['href' => APP_URL, 'label' => 'Pill 1', 'color' => '#3490dc']) ?>
            <?php component('pill', ['label' => 'Pill 2', 'color' => '#e3342f']) ?>
        </div>
    </section>
</main>

<?php component('footer') ?>