<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/addUser.css">
    <link rel="shortcut icon" href="public/img/logo.svg">
    <title> Diarium </title>
</head>

<body>
<div class="base-container">
    <main>
        <header>
            <div class="add-user">
                <i class="fas fa-plus"></i> Add user
            </div>
        </header>
        <section class="user-form">
            <form action="addUser" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="name" type="text" placeholder="imie">
                <input name="surname" type="text" placeholder="nazwisko">
                <input name="pesel" type="text" placeholder="pesel"> <!---wlasciwe do logowania-->

                <label for="roles">Rola użytkownika</label>
                <select id="role" name="roles">
                    <option value="student">Uczeń</option>
                    <option value="teacher">Nauczyciel</option>
                    <option value="admin">Admin</option>
                </select>

                <input type="file" name="file"/><br/> <!--zdjecie usera-->
<!--                <textarea name="description" rows=5 placeholder="description"></textarea>--> <!-- pole tekstowe, przyda się do komentowania ocen, wysyłania wiadomości-->
                <button type="submit">send</button>

            </form>
        </section>
    </main>
</div>
</body>