<!DOCTYPE html>

<head>
    <script src="https://cdn.omise.co/card.js" charset="utf-9"></script>
</head>

<body>
  <h3>Omise มาใช้เป็น Payment Gateway<h3>
    <form name="checkoutForm" method="POST" action="/checkout">
       {{ Form::token() }}
        <script type="text/javascript" src="https://cdn.omise.co/omise.js" data-key="pkey_test_57gpwuk3sm7mirumtsx" data-image="https://fbi.dek-d.com/27/0438/4821/118407409?v=4.4" data-frame-label="Animal-AID 4.0" data-button-label="Pay now" data-submit-label="Submit" data-location="yes"
            data-amount="320000" data-currency="thb">
        </script>
        <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
    </form>

    <!-- data-key="pkey_test_57gpwuk3sm7mirumtsx" -->
</body>

</html>
