<h1>Google ReCaptcha ins Phalcon PHP-Framework implementieren</h1>

{{ form(null, 'method': 'post') }}
    <p>
        {{ flash.output() }}
    </p>
    <p>
        <label for="name">Name:</label><br>
        {{ form.render('name') }}
    </p>
    <p>
        {{ form.render('recaptcha') }}
    </p>
    <p>
        {{ submit_button('Absenden') }}
    </p>
{{ endform() }}
