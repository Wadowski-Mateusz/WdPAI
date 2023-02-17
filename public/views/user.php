<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/user.css">
    <link rel="shortcut icon" href="/public/img/logo.svg">
    <title> Diarium - user </title>
</head>

<body>
    <div class="base-container">
        <?php include 'public/views/nav.php'; ?>
        <main>
            <section class="user-info">
                <img src="public/uploads/<?= $detail->getAvatarPath(); ?>">
                <div class="user-detail">
                    <div class="info">
                        <?= $detail->getName();?>
                        <?= $detail->getSurname();?>
                        <br>
                        <?= $detail->getBirthday();?>
                        <br>
                        <?php
                            require_once __DIR__.'/../../src/controllers/SchoolController.php';
                            $school = (new SchoolController())->getSchool($detail->getIdSchool());
                            echo $school -> getName();
                            echo '<br>';
                            echo $school -> getAddress();
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
