<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/addUser.css">
    <link rel="shortcut icon" href="public/img/logo.svg">
    <title> Diarium </title>
</head>

<body>
<div class="base-container">
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

                <input class="fileButton" type="file" name="file" placeholder/>

<!--                <textarea name="description" rows=5 placeholder="description"></textarea>--> <!-- pole tekstowe, przyda się do komentowania ocen, wysyłania wiadomości-->
                <button type="submit">send</button>

            </form>
        </section>
    </main>
</div>
</body>