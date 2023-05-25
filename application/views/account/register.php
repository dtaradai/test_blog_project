<h1>Register page</h1>
<form id="registration-form">
  <label for="name">Name:</label>
  <input type="text" id="name" required><br>

  <label for="surname">Surname:</label>
  <input type="text" id="surname" required><br>

  <label for="email">Email:</label>
  <input type="email" id="email" required><br>

  <label for="password">Password:</label>
  <input type="password" id="password" required><br>

  <label for="confirm-password">Password again:</label>
  <input type="password" id="confirm-password" required><br>

  <input type="submit" value="Register">
</form>

<div id="success-message" style="display: none;">
  Реєстрація пройшла успішно!
</div>

<div id="error-message" style="display: none;">
  Виникла помилка при реєстрації.
</div>