<?php

  $hotels = [

      [
          'name' => 'Hotel Belvedere',
          'description' => 'Hotel Belvedere Descrizione',
          'parking' => true,
          'vote' => 4,
          'distance_to_center' => 10.4
      ],
      [
          'name' => 'Hotel Futuro',
          'description' => 'Hotel Futuro Descrizione',
          'parking' => true,
          'vote' => 2,
          'distance_to_center' => 2
      ],
      [
          'name' => 'Hotel Rivamare',
          'description' => 'Hotel Rivamare Descrizione',
          'parking' => false,
          'vote' => 1,
          'distance_to_center' => 1
      ],
      [
          'name' => 'Hotel Bellavista',
          'description' => 'Hotel Bellavista Descrizione',
          'parking' => false,
          'vote' => 5,
          'distance_to_center' => 5.5
      ],
      [
          'name' => 'Hotel Milano',
          'description' => 'Hotel Milano Descrizione',
          'parking' => true,
          'vote' => 2,
          'distance_to_center' => 50
      ],

    ];

    $hotelList = $hotels;

    // I due punti interrogativi servono se il valore del post è nullo oppure non è stato ancora valorizzato.
    $strPost = $_POST['parking'] ?? "false";

    if($strPost == 'false'){
      $hotelList = $hotels;
    }elseif($strPost == 'true'){
      $hotelList = [];
      foreach ($hotels as $hotel) {
        $hotel['parking'] ? array_push($hotelList, $hotel) : null;
      }
    };

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>
    <title>PHP Hotel</title>
  </head>
  <body>
    <div class="pg-content-wrapper vh-100 bg-dark">
      <div class="container py-5">
        <form action="./index.php" method="POST" class="mb-3 w-25 d-flex">
          <select name="parking" class="form-select me-2">
            <option value="false" selected>Tutti gli hotel</option>
            <option value="true">Hotel con parcheggio</option>
          </select>
          <button type="submit" class="btn btn-warning">Submit</button>
        </form>

        <table class="table w-100 rounded-3 overflow-hidden text-center">
          <thead>

            <tr class="table-light border-bottom-0">

              <?php foreach ($hotelList[0] as $key => $hotel): ?>
                <th scope="col"><?php echo strtoupper($key); ?></th>
              <?php endforeach; ?>

            </tr>

          </thead>

          <tbody>

          <?php foreach ($hotelList as $hotel): ?>

            <tr class="table-light border-bottom-0">

              <?php foreach ($hotel as $key => $value): ?>
                <?php if($key === 'parking'){
                    $value ? $value = '<span class="text-success">Parcheggio disponibile</span>' : $value = '<span class="text-danger">Parcheggio non disponibile</span>';
                  }elseif($key === 'vote' ){
                    if($value === 3){
                      $value = "<span class='text-warning'>$value</span>";
                    }elseif($value <=3){
                      $value = "<span class='text-danger'>$value</span>";
                    }else{
                      $value = "<span class='text-success'>$value</span>";
                    }
                  };
                ?>

                <td><?php echo $value ?></td>
              <?php endforeach; ?>

            </tr>

          <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>