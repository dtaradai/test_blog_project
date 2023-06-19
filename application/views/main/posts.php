  <section class="posts">
    <div class="container">
      <?php if (isset($posts)) { ?>
        <?php foreach ($posts as $post) { ?>
          <div class="posts__item">
            <div class="posts__item-content">
              <a href="<?= $post['url'] ?>">
                <p class="post__item-pretitle">
                  Effortless Validation for
                </p>
                <h3 class="post__item-title title">
                  <?= $post['title']; ?>
                </h3>
                <p class="posts__item-titletext">
                  <?= $post['text']; ?>
                </p>
              </a>
            </div>
            <div class="posts__item-img">
              <img  src="<?= $post['img']; ?>" alt="<?= $post['title']; ?>">
            </div>
          </div>
        <?php } ?>
        <?= $pagination ?>
      <?php } else { ?>
        <div class="post__item">
          <div class="post__item-content">
            <h3 class="post__item-title title">
              No posts
            </h3>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>