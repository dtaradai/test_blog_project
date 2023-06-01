<h1>Login php</h1>

<form id="form" action="/account/login" method="post">
  <label for="email">Email:</label>
  <input type="email" id="email" required><br>

  <label for="password">Password:</label>
  <input type="password" id="password" required><br>

  <input type="submit" value="Login">
</form>

<div id="success-message" style="display: none;">
  Реєстрація пройшла успішно!
</div>

<div id="error-message" style="display: none;">
  Виникла помилка при реєстрації.
</div>