<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/user.css">
    <link rel="shortcut icon" href="/public/img/logo.svg">

    <title> Diarium - user </title>
</head>

<body>
    <div class="base-container">
        <?php include 'public/views/nav.html'; ?>
        <main>
            <section class="user-info">
    <!--                --><?php //=var_dump($detail)?>
                <img src="public/uploads/<?= $detail->getAvatarPath(); ?>">
                <div class="user-detail">
    <!--                TODO PESEL  + nazwa szkoły wraz z adresem + rozmiar obrazka-->
                    <div class="name">
                        <?= $detail->getName();?>
                        <?= $detail->getSurname();?>
                    </div>

                    <div class="birthday"> <?= $detail->getBirthday();?> </div>

                    <div class="email">
                        <?= $detail->getEmail();?>
                    </div>
                    <div class="phone">
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