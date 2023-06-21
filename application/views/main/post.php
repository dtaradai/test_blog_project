  <section class="post">
    <div class="container">

      <div class="post__item">
        <div class="post__item-content">
          <p class="post__item-pretitle">
            <?=$post['date']?>
          </p>
          <h3 class="post__item-title title">
            <?=$post['title'] ?>
          </h3>
          <p class="post__item-titletext">
            <?=$post['text']  ?>
          </p>
        </div>
        <img class="post__item-img" src="<?=$post['img'] ?>" alt="<?=$post['title'] ?>">
      </div>

    </div>
  </section>