<?php

?>
<html>
<head>
    <script src="https://credimax.gateway.mastercard.com/checkout/version/57/checkout.js"
            data-error="errorCallback"
            data-cancel="cancelCallback">
    </script>

    <script type="text/javascript">
        function errorCallback(error) {
            console.log(JSON.stringify(error));
        }
        function cancelCallback() {
            console.log('Payment cancelled');
        }

        Checkout.configure({
            merchant: '16175950',
            order: {
                amount: function() {
                    //Dynamic calculation of amount
                    return 80 + 20;
                },
                currency: 'BHD',
                description: 'Ordered goods',
                id: 'werqw1234a32234asd'
            },
            interaction: {
                merchant: {
                    name: 'Mehedi Hasan',
                    address: {
                        line1: '200 Sample St',
                        line2: '1234 Example Town'
                    }
                }
            }
        });
    </script>
    <title></title>
</head>
<body>
<br>
{{ $session_id }}
<br>
<button type="button" value="Pay with Lightbox" onclick="Checkout.showLightbox();">Pay with Lightbox</button>
<button type="button" value="Pay with Payment Page" onclick="Checkout.showPaymentPage();">Pay with Payment Page</button>
...
</body>
</html><?php
