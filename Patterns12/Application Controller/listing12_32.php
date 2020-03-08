<?php
// Листинг 12.32

namespace popp\ch12\batch07;

try {
  $venuemapper = new VenueMapper();
  $venues = $venuemapper->findAll();
} catch (\Exception $e) {
  include('error.php');
  exit(0);
}

// далее следует стандартная страница
?>
<html>
   <head>
      <title>Список заведений</title>
   </head>
   <body>
      <h1>Список заведений</h1>

<?php foreach ($venues as $venue) { ?>
   <?php print $venue->getName(); ?><br />
<?php } ?>

   </body>
</html>
