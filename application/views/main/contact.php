  <section class="registration">
    <div class="container">
      <div class="registration__inner">
        <h3 class="registration__title title">Write to the developer</h3>
        <form class="form" id="form" action="/contact" method="post">
          <label class="form__label" for="name">Name:</label>
          <input class="form__input" name="name" type="text" id="name"><br>

          <label class="form__label" for="email">Email:</label>
          <input class="form__input" name="email" type="text" id="email"><br>

          <label class="form__label" for="message">Message:</label>
          <input class="form__input" name="message" type="text" id="message"><br>

          <div class="form__submit-container">
            <input class="form__inpit-submit button" type="submit" value="Send message">
          </div>

          <input hidden type="text" name="subject" value="Letter to the developer from the test site">

        </form>

      </div>
    </div>
  </section>