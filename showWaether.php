<?php
$apiKey = "c0fcf2550d9c750cfc5de89ec353d731";
$city = trim($_POST['city'],"\n\r\t\v\0");
$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric&lang=fa";

$response = file_get_contents($url);
$data = json_decode($response, true);

// echo "وضعیت فعلی هوا در $city: " . $data['weather'][0]['description'] . "<br>";
// echo "دما: " . $data['main']['temp'] . " درجه سانتی‌گراد";
?>
<!doctype html>
<html lang="en">
    <head>
        <title>هواشناسی شهر شما</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
    <div class="card text-center">
  <div class="card-header">
 <?php echo "وضعیت فعلی هوا در $city" ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?=$data['weather'][0]['description'] ?></h5>
    <p class="card-text"><?= "دما: " . $data['main']['temp'] . " درجه سانتی‌گراد"?></p>
    <a href="index.php" class="btn btn-primary">شهر های دیگر</a>
  </div>
</div>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

