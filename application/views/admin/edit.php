<div class="form__box">
  <h1 class="login__title title"><?=$title?></h1>
  <form action="<?=$action?>" enctype="multipart/form-data" class="" method="post" id="form">
    <label>
      Title
      <input type="text" name="title" value="<?=$post['title']?>">
    </label>
    <label>
      Text
      <textarea name="text" ><?=$post['text']?></textarea>
    </label>
    <label>
      Image
      <input type="file" name="img">
    </label>
    <div class="form__button--contain">
      <button class="default-btn btn-save" type="submit">Save</button>
      <a href="<?=$delete?>" class="default-btn btn-delete" type="submit">Delete</a>
    </div>
  </form>
</div>