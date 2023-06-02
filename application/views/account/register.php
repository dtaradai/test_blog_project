  <section class="registration">
    <div class="container">
      <div class="registration__inner">
        <h3 class="registration__title title">Registration page</h3>
        <form class="form" id="form" action="/account/register" method="post">
          <label class="form__label" for="name">Name:</label>
          <input class="form__input" name="name" type="text" id="name"><br>

          <label class="form__label" for="surname">Surname:</label>
          <input class="form__input" name="surname" type="text" id="surname"><br>

          <label class="form__label" for="email">Email:</label>
          <input class="form__input" name="email" type="text" id="email"><br>

          <label class="form__label" for="password">Password:</label>
          <input class="form__input" name="password" type="password" id="password"><br>

          <label class="form__label" for="confirm-password">Password again:</label>
          <input class="form__input" name="confirm-password" type="password" id="confirm-password"><br>

          <div class="form__submit-container">
            <input class="form__inpit-submit button" type="submit" value="Sign Up">
          </div>

        </form>

        <div id="success-message" style="display: none;">
          Реєстрація пройшла успішно!
        </div>

        <div id="error-message" style="display: none;">
          Виникла помилка при реєстрації.
        </div>
      </div>
    </div>
  </section>