  <section class="registration">
    <div class="container">
      <div class="registration__inner">
        <h3 class="registration__title title">Login page</h3>
        <form class="form" id="form" action="/account/register" method="post">
          <label class="form__label" for="name">Name:</label>
          <input class="form__input" name="name" type="text" id="name"><br>

          <label class="form__label" for="password">Password:</label>
          <input class="form__input" name="password" type="password" id="password"><br>

          <div class="form__submit-container">
            <input class="form__inpit-submit button" type="submit" value="Sign In">
          </div>

        </form>

        <div id="success-message" style="display: none;">
          Авторизація пройшла успішно!
        </div>

        <div id="error-message" style="display: none;">
          Виникла помилка при авторизації.
        </div>
      </div>
    </div>
  </section>