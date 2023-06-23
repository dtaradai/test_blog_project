<div class="content__box">
  <h1 class="posts__title title"><?= $posts ? $title : 'No posts' ?></h1>
  <?php if ($posts) { ?>
    <div class="posts-box">
      <?php foreach ($posts as $post) { ?>
        <div class="post__item">
          <div class="post__item--preview">
            <img src="<?= $post['img'] ?>" alt="img">
          </div>
          <div class="post__item--link">
            <a href="<?= $post['url'] ?>" class="posts__link">
              <?= $post['title'] ?>
            </a>
          </div>
        </div>
      <?php } ?>
      <?= $pagination ?>
    </div>
  <?php }  ?>
</div>