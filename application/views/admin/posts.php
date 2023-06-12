<?php if ($posts) { ?>
  <?php foreach ($posts as $post) { ?>
    <div class="posts-box">

      <?php foreach ($posts as $post) { ?>
        <div class="posts">
          <a href="<?= $post['url'] ?>" class="posts__link">
            <img class="posts__img" src="<?= $post['img'] ?>" alt="img">
            <h3 class="posts__title"><?= $post['title'] ?></h3>
          </a>
        </div>
      <?php } ?>

    </div>
  <?php } ?>
<?php } else { ?>
  <h1>No posts</h1>
<?php } ?>