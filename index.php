<?php

if (isset($_POST["submit"])) {
     $access_key = "a2e8eafac11116214d49bc7d87c46600";
     $number = $_POST["countryCode"] . $_POST["number"];

     $url = "http://apilayer.net/api/validate?access_key=$access_key&number=$number";
     $get_request = file_get_contents($url);

     $json = json_decode($get_request, true);

     if ($json["valid"] == 1) {
          $status["success"] = "Phone Number is valid";
     } else {
          $status["error"] = "Phone Number is Invalid";
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

     <title>Phone Number Details</title>
</head>

<body class="bg-light">
     <div class="container py-5">
          <div class="row">
               <div class="col-md-5 shadow rounded bg-white mx-auto p-4">
                    <h3 class="text-center fw-bold mb-3">Check Your Phone Number Details</h3>
                    <?php
                    if (isset($status["success"])) {
                         echo "<div class='alert alert-success'>{$status["success"]}</div>";
                         echo "<p><strong>Number: </strong> {$json["number"]}</p>";
                         echo "<p><strong>Local Format: </strong> {$json["local_format"]}</p>";
                         echo "<p><strong>International Format: </strong> {$json["international_format"]}</p>";
                         echo "<p><strong>Country Prefix: </strong> {$json["country_prefix"]}</p>";
                         echo "<p><strong>Country Code: </strong> {$json["country_code"]}</p>";
                         echo "<p><strong>Country Name: </strong> {$json["country_name"]}</p>";
                         echo "<p><strong>Location: </strong> {$json["location"]}</p>";
                         echo "<p><strong>Carrier: </strong> {$json["carrier"]}</p>";
                         echo "<p><strong>Line Type: </strong> {$json["line_type"]}</p>";
                    }
                    if (isset($status["error"])) {
                         echo "<div class='alert alert-danger'>{$status["error"]}</div>";
                    }
                    ?>
                    <form action="" method="post">
                         <label for="number">Phone Number</label>
                         <div class="mb-3 input-group">
                              <select name="countryCode" class="form-control" required>
                                   <option value="+1">+1</option>
                                   <option value="+880">+880</option>
                                   <option value="+91">+91</option>
                                   <option value="+92">+92</option>
                                   <option value="+234">+233</option>
                                   <option value="+234">+234</option>
                              </select>

                              <input type="text" class="form-control w-50" name="number" id="number"
                                   placeholder="14257583256" required>
                         </div>
                         <button type="submit" name="submit" class="btn btn-primary">Get Data of the number</button>
                    </form>
               </div>
          </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>