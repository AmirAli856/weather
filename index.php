<?php



$url = "https://www.iran-locations-api.ir/api/v1/fa/states";
$json_states = file_get_contents($url);
$states = json_decode($json_states);
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
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
       <div class="container card d-flex justify-content-center align-items-center border border-0">
        <div class="resault"></div>
            <div class="row">
                <div class="resault alert aleert-success"></div>
                <div class="card d-flex flex-column" style="width: 20rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title text-center">هواشناسی ایران</h5>
                        <form id="define" class="d-flex flex-column gap-3 " method="post" action="showWaether.php" >
                            <select class='form-control' name="states" id="states"  >
                                <option value="0">لطفا استان را انتخاب نمایید</option>
                                    <?php foreach($states as $state) : ?>
                                        <option value="<?=$state->id?>"><?=$state->name?>
                                    <?php endforeach ?>
                                </option>
                            </select>
                            <select class='form-control' name="city" id="city"  >
                                <option value="0">لطفا شهر را انتخاب نمایید</option>
                            </select>
                                   
                           

                            <button class="btn btn-outline-warning" type="submit">ارسال</button>

                        </form>
                    </div>
                </div>
            </div>
       </div>


        <!-- Bootstrap JavaScript Libraries -->
         <script src="./jQuery/js/jquery-3.7.1.min.js"></script>
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
<script>
    $(document).ready(function () {
    $("#states").on("change", function(e){
        $.ajax({
        url: `https://www.iran-locations-api.ir/api/v1/fa/cities?state_id=${$(this).val()}`,
        method: 'GET',
        success: function(data) {
          $('#city').empty();
          data.forEach(function(city) {
            $('#city').append(`<option value="${city.name}">${city.name}</option>`);
          });
        },
        error: function(xhr, status, error) {
          console.error('خطا در دریافت اطلاعات:', error);
        }
      });
    })
    //   $("#define").submit(function (e) { 
    //     e.preventDefault();
    //     let states = $("#states").val();
    //     $.ajax({
    //         method: "get",
    //         url: "index.php",
    //         data:{
    //             states :states
    //         },
    //         success: function (response) {
    //             $(".resault").html(response);
    //         }
    //     });
        
    //   });  
    });
</script>



 

    </body>
</html>
