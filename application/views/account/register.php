  <section class="direction">
    <div class="container">
      <div class="registration">
      <h3 class="registration__title title">Registration page</h3>
      <form id="form" action="/account/register" method="post">
        <label for="name">Name:</label>
        <input name="name" type="text" id="name"><br>

        <label for="surname">Surname:</label>
        <input name="surname" type="text" id="surname"><br>

        <label for="email">Email:</label>
        <input name="email" type="text" id="email"><br>

        <label for="password">Password:</label>
        <input name="password" type="password" id="password"><br>

        <label for="confirm-password">Password again:</label>
        <input name="confirm-password" type="password" id="confirm-password"><br>

        <input type="submit" value="Register">
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