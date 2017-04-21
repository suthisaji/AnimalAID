
<?php

  require_once 'C:\xampp\htdocs\AnimalAID\omise-php\lib\Omise.php';

  define('OMISE_PUBLIC_KEY', 'pkey_test_57gpwuk3sm7mirumtsx');
  define('OMISE_SECRET_KEY', 'skey_test_57gpwuk42fxek0ag94z');

  $charge = OmiseCharge::create(array(
    'amount' => 320000,
    'currency' => 'thb',
    'card' => $_POST["omiseToken"]
  ));

  if ($charge['status'] == 'successful') {
    echo 'Success';
  } else {
    echo 'Fail';
  }

  /*print('<pre>');
  print_r($_POST);
  print('</pre>');

  echo '<hr>';

  print('<pre>');
  print_r($charge);
  print('</pre>');*/


?>
