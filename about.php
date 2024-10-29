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

    <style>
        .left-about-content {
            width: 100%;
            height: 300px;
        }

        .right-about-content {
            width: 100%;
            height: 400px;
            margin-left: 70px;

        }

        .aboutus-content {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>

    <div class="about-page mt-4">
        <div class="container-fluid">
            <div class="title-about-page text-center">
                <h1>About Us </h1>
            </div>
            <div class="aboutus-content d-flex p-5">
                <div class="left-about-content p-3">
                    Exam remuneration for faculty supervision typically involves compensating educators for their time
                    and
                    effort in overseeing exams. This includes monitoring the exam environment, ensuring academic
                    integrity,
                    and providing necessary assistance to students. The remuneration may vary based on the institution's
                    policies, exam duration, and faculty rank, recognizing their critical role in maintaining a fair and
                    orderly examination process.
                    <br>
                    <br>
                    <button type="submit" class="btn btn-dark p-3">Explore More -></button>

                </div>
                <div class="right-about-content">
                    <img src="../eduremun/asstes/images/pexels-cottonbro-4778667.jpg" height=100%" width="70%" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <!-- <script type="text/javascript" src="./assets/js/jquery-1.11.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <!-- <script type="text/javascript" src="./assets/js/script.js"></script> -->


</body>

</html>