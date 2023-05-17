<?php

include './inc/db.php';
include './inc/form.php';
include './inc/select.php';
include './inc/db_close.php';


?>

<?php include './parts/header.php'; ?>


<div class="text-center p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <img src="images/image.jpg" alt="pic here" mx-auto>
        <h1 class="display-5 fw-bold">win with me</h1>
        <p class="col-md-12 fs-4">time to open</p>
        <h3 id="countdown"></h3>
        <p class="lead fw-normal">to win a free course</p>
    </div>
    <div class="container">
        <h3>to Enter follow instruction</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Hi</li>
            <li class="list-group-item">welcome to this website</li>
            <li class="list-group-item">this is a random winner selector project</li>
            <li class="list-group-item">you can enter your information for a chance to win</li>
            <li class="list-group-item">may the odds be with you</li>
        </ul>
    </div>
</div>



<div class="container">
    <div class="text-center p-5 mb-4 rounded-3">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <h3>Please Enter Your Information</h3>
            <div class="col-md-6 p-lg-9 mx-auto my-3">
                <div class="mb-3">
                    <label for="firstName" class="form-label">
                        <h5>First Name</h5>
                    </label>
                    <input type="text" name="firstName" class="form-control" id="firstName"
                        value="<?php echo $firstname ?>">
                    <div class="form-text error">
                        <?php echo $error['firstnameerror'] ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">
                        <h5>Last Name</h5>
                    </label>
                    <input type="text" name="lastName" class="form-control" id="lastName"
                        value="<?php echo $lastname ?>">
                    <div class="form-text error">
                        <?php echo $error['lastnameerror'] ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">
                        <h5>Email Address</h5>
                    </label>
                    <input type="text" name="Email" class="form-control" id="Email" value="<?php echo $email ?>">
                    <div class="form-text error">
                        <?php echo $error['emailerror'] ?>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="loader-con">
        <div id="loader">
            <canvas id="circularLoader" width="200" height="200"></canvas>
        </div>
    </div>


    <!-- Button trigger modal -->
    <div class="d-grid gap-2 col-4 mx-auto my-5">
        <button type="button" id="winner" class="btn btn-primary">
            Choose winner
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">winner is</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($users as $user): ?>
                        <h5 class="display-5 text-ceneter modal-title" id="modalLabel">
                            <?php echo strtoupper(htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName'])); ?>
                        </h5>
                        <p>
                            <?php echo htmlspecialchars($user['Email']); ?>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './parts/footer.php'; ?>