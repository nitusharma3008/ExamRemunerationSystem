<?php
include('config/config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {

        $sql = "INSERT INTO contactus_tbl (name, email, phone, message) VALUES('$name' , '$email' , '$phone' , '$message')";
        $data = mysqli_query($conn, $sql);
        if ($data) {
            echo "<script>alert('Data inserted successfully!');</script>";
            //header('Location: contact.php');
        } else {
            header('Location: contact.php');
        }
    } else {
        echo "Data not inserted";
    }
}

?>


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

    <div class="container">
        <div class="contact-section p-3 mt-4 mb-4 shadow-lg p-3 mb-5 bg-white rounded">
            <div class="contact-title text-center p-3">
                <h3>Contact Us</h3>
            </div>
            <div class="form-content m-5">
                <form action="contact.php" method="POST">
                    <div class="form-group mb-3 p-2">
                        <label for="name">YOUR NAME</label>
                        <input type="text" class="form-control mt-2" name="name" placeholder="Full name" />
                    </div>
                    <div class="form-group mb-3 p-2">
                        <label for="email">EMAIL ADDRESS</label>
                        <input type="text" class="form-control mt-2" name="email" placeholder="abc@gmail.com" />
                    </div>
                    <div class="form-group mb-3 p-2">
                        <label for="phone">PHONE NO</label>
                        <input type="text" class="form-control mt-2" name="phone" placeholder="+91 7041092078" />
                    </div>
                    <div class="form-group mb-3 p-2">
                        <label for="name">MESSAGE</label>
                        <textarea class="form-control mt-2" name="message" placeholder="Enter messages"></textarea>
                    </div>
                    <div class="form-group mb-3 p-2">
                        <button type="submit" name="submit" class="btn btn-dark text-light w-100">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },
                    message: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        minlength: "Your name must be at least 3 characters long"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    phone: {
                        required: "Please enter your phone number",
                        digits: "Please enter only digits",
                        minlength: "Your phone number must be at least 10 characters long",
                        maxlength: "Your phone number must not exceed 15 characters"
                    },
                    message: {
                        required: "Please enter your message",
                        minlength: "Your message must be at least 10 characters long"
                    }
                },
                errorElement: 'div',
                errorClass: 'text-danger',
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                }
            });
        });
    </script>

</body>

</html>