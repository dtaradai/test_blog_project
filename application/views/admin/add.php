<div class="form__box">
  <h1 class="login__title title"><?=$title?></h1>
  <form action="<?=$action?>" enctype="multipart/form-data" class="" method="post" id="form">
    <label>
      Title
      <input type="text" name="title">
    </label>
    <label>
      Text
      <textarea name="text"></textarea>
    </label>
    <label>
      Image
      <input type="file" name="img">
    </label>
    <div class="form__button--contain">
      <button class="default-btn btn-save" type="submit">Save</button>
    </div>
  </form>
</div>