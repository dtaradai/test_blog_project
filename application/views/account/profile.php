  <section class="registration">
    <div class="container">
      <div class="registration__inner">
        <h3 class="registration__title title"><?= $title ?></h3>
        <form class="form" id="form" action="/account/profile" method="post">
          <label class="form__label" for="name">Name:</label>
          <input class="form__input" name="name" type="text" value="<?= $user['name'] ?>" id="name"><br>

          <label class="form__label" for="surname">Surname:</label>
          <input class="form__input" name="surname" type="text" value="<?= $user['surname'] ?>" id="surname"><br>

          <label class="form__label" for="email">Email:</label>
          <input class="form__input" name="email" type="text" value="<?= $user['email'] ?>" id="email"><br>

          <label class="form__label" for="password">Password:</label>
          <input class="form__input" name="password" type="password" id="password"><br>

          <label class="form__label" for="confirm-password">Password again:</label>
          <input class="form__input" name="confirm-password" type="password" id="confirm-password"><br>

          <div class="form__submit-container">
            <input class="form__inpit-submit button" type="submit" value="Update data">
          </div>
        </form>
      </div>
    </div>
  </section>