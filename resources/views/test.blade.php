<script src="https://api.feexpay.me/feexpay-javascript-sdk/index.js"></script>
<div id="render"></div>

<button id="pay" >Btn</button>

<script>
    FeexPayButton.init("render",{
            id: '64a7ea713a82106c499754c9',
              amount: 500,
              token: 'test_Hg7Kjl3ZAM63UuIUpuudD9nKuu3ZAM67Kjl3Uuhn',
              callback:()=> "google.com",
              callback_url: "google.com",
              mode: 'LIVE',
              custom_button:  true,
              id_custom_button: 'pay',
              description: "Test",
              case: '',
        });
</script>

