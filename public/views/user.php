<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/user.css">
    <link rel="shortcut icon" href="public/img/logo.svg">
    <title> Diarium - user </title>
</head>

<body>
<div class="base-container">
    <main>
        <header>
            <div class="user-data">
                <i class="fas fa-plus"></i>User data
            </div>
        </header>
        <section class="user-info">
<!--                --><?php //=var_dump($detail)?>
            <img src="public/uploads/<?= $detail->getAvatarPath(); ?>">
            <div class="user-detail">
<!--                TODO PESEL  + nazwa szkoły wraz z adresem-->
                <div class="godnosc">
                    <?= $detail->getName();?>
                    <?= $detail->getSurname();?>
                </div>

                <div class="birthday"> <?= $detail->getBirthday();?> </div>

                <div class="contact">
                    <?= $detail->getEmail();?>
                    <?= $detail->getPhoneNumber();?>
                </div>
                <div class="school">
                    <?= $detail->getIdSchool();?>
                </div>
            </div>
        </section>
    </main>
</div>
</body>