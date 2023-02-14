<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/user.css">
    <link rel="stylesheet" type="text/css" href="/public/css/nav.css">
    <link rel="shortcut icon" href="/public/img/logo.svg">
    <script src="https://kit.fontawesome.com/e81504632c.js" crossorigin="anonymous"></script>
    <title> Diarium - user </title>
</head>

<body>
    <div class="base-container">
        <nav>
            <ul>
                <li>
                    <a href="grades" class="button">
                        Grades
                        <i class="fa-solid fa-book-open"></i>
                    </a>
                </li>
                <li>
                    <a href="attendance" class="button">
                        Attendance
                        <i class="fa-regular fa-calendar-check"></i>
                    </a>
                </li>
                <li>
                    <a href="remarks" class="button">
                        Remarks
                        <i class="fa-solid fa-circle-exclamation"></i>
                    </a>
                </li>
                <li>
                    <a href="messages" class="button">
                        Messages
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                </li>
                <li>
                    <a href="plan" class="button">
                        Plan
                        <i class="fa-solid fa-calendar-days"></i>
                    </a>
                </li>
                <li>
                    <a href="user" class="button">
                        User
                        <i class="fa-solid fa-graduation-cap"></i>
                    </a>
                </li>
                <li>
                    <!-- <i class="fa-solid fa-ellipsis-vertical"></i> -->
                    <i class="fa-solid fa-ellipsis"></i>
                    <a href="#" class="button"></a>
                </li>
            </ul>
        </nav>
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