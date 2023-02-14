<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/addUser.css">
    <link rel="stylesheet" type="text/css" href="/public/css/nav.css">
    <link rel="shortcut icon" href="/public/img/logo.svg">
    <script src="https://kit.fontawesome.com/e81504632c.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/registerValidate.js" defer><</script>
    <title> Diarium </title>
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
            Dodawanie użytkownika
            <section class="user-form">
                <form action="addUser" method="POST" ENCTYPE="multipart/form-data">

                    <input name="name" type="text" placeholder="imie">
                    <input name="surname" type="text" placeholder="nazwisko">
                    <input name="pesel" type="text" placeholder="pesel">

                    <select id="role" name="roles">
                        <option value="student">Uczeń</option>
                        <option value="teacher">Nauczyciel</option>
                        <option value="admin">Admin</option>
                    </select>
                    <? echo 'Jeszcze klasy do ktorych należy/ą użytkownicy'; ?>
                    <div class="avatar">
                        <input class="box" type="checkbox" name="isAvatar"/> <!--TODO avatar odblokowany po zaznaczeniu -->
                        Czy dodać avatar?
                    </div>
                    <input class="fileButton" type="file" name="file"/>
                    <button type="submit">send</button>
                </form>
            </section>
        </main>
    </div>
</body>