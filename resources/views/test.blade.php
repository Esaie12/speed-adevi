<script src="https://api.feexpay.me/feexpay-javascript-sdk/index.js"></script>
<div id="render"></div>

<button id="pay" >Btn</button>

<script>
    FeexPayButton.init("render",{
        id: '649c706008308c8dbd24bbb1',
        amount: 25,
        token: 'fp_7xP5wCj0FprPk8Xvx73Qv99OpwjMzrtaMGeBUVnSkXdMFmLJ67YqODhBCgUNZ8wT',

        callback_url: "{{route('paiement',1)}}",
        mode: 'LIVE',
        custom_button:  true,
        id_custom_button: 'pay',
        description: "Test",
        case: '',
    });
</script>

