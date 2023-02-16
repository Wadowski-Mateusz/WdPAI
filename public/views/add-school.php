<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/adding.css">
    <link rel="shortcut icon" href="/public/img/logo.svg">
    <title> Diarium - add school </title>
</head>

<body>
<div class="base-container">
    <?php include 'public/views/nav.php'; ?>
    <main>
        Dodaj szkołę
        <section class="school-form">
            <form action="addSchool" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="name" type="text" placeholder="Nazwa szkoły">
                <input name="address" type="text" placeholder="Adres szkoły">
                <button type="submit">DODAJ</button>
            </form>
        </section>
    </main>
</div>
</body>