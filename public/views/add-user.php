<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/addUser.css">

    <link rel="shortcut icon" href="/public/img/logo.svg">

    <script type="text/javascript" src="/public/js/registerValidate.js" defer><</script>
    <title> Diarium </title>
</head>

    <body>
    <div class="base-container">
        <?php include 'public/views/nav.php'; ?>
        <main>
            Dodawanie użytkownika
            <section class="user-form">
                <form action="addUser" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message."   ";
                            }
                        }
                        ?>
                    </div>
                    <input name="name" type="text" placeholder="imie">
                    <input name="surname" type="text" placeholder="nazwisko">
                    <input name="pesel" type="text" placeholder="PESEL">

                    <select id="role" name="roles">
                        <option value="4">Uczeń</option>
                        <option value="3">Nauczyciel</option>
                        <option value="2">Dyrektor</option>
                        <option value="1">Admin</option>
                    </select>
                    <? echo 'Jeszcze klasy do ktorych należy/ą użytkownicy'; ?>
                    <input class="fileButton" type="file" name="file"/>
                    <button type="submit">send</button>
                </form>
            </section>
        </main>
    </div>
</body>