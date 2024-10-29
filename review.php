<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Aguafina+Script&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./asstes/css/style.css?v=<?php echo time(); ?>" type="text/css">
    <title>EduRemun</title>
</head>

<body>
    <?php include('header.php') ?>
    <div class="container">
        <div class="title mt-5">
            <h3 class="text-center">Faculty Reviews</h3>
        </div>
        <div class="review p-5 mb-5 d-flex justify-content-around" id="review">
            <div class="card shadow-lg  mb-5 bg-white rounded" style="width: 20rem;">
                <img class="card-img-top " src="asstes/images/img1.jpg" alt="Card image cap">
                <div class="card-body mt-3">
                    <h5 class="card-title">Eeva Kapopra</h5>
                    <p class="card-text mt-3">This review examines the effectiveness of the current exam remuneration
                        system, considering factors such as fairness, transparency, and motivation. Key findings and
                        recommendations are presented.</p>
                    <!-- <a href="#" class="btn btn-primary mt-3">Go somewhere</a> -->
                </div>
            </div>

            <div class="card shadow-lg  mb-5 bg-white rounded" style="width: 20rem; height:auto;">
                <img class="card-img-top " src="asstes/images/img2.jpg" alt="Card image cap">
                <div class="card-body mt-3">
                    <h5 class="card-title">Khushboo Ma'am</h5>
                    <p class="card-text mt-3">This review examines the effectiveness of the current exam remuneration
                        system, considering factors such as fairness, transparency, and motivation. Key findings and
                        recommendations are presented.</p>
                    <!-- <a href="#" class="btn btn-primary mt-3">Go somewhere</a> -->
                </div>
            </div>

            <div class="card shadow-lg  mb-5 bg-white rounded" style="width: 20rem;">
                <img class="card-img-top " src="asstes/images/img3.avif" alt="Card image cap">
                <div class="card-body mt-3">
                    <h5 class="card-title">Jashmin Ma'am</h5>
                    <p class="card-text mt-3">This review examines the effectiveness of the current exam remuneration
                        system, considering factors such as fairness, transparency, and motivation. Key findings and
                        recommendations are presented.</p>
                    <!-- <a href="#" class="btn btn-primary mt-3">Go somewhere</a> -->
                </div>
            </div>
        </div>

    </div>

    <?php include('footer.php') ?>

</body>

<html>