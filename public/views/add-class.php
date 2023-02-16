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
        Dodaj klasę
        <section class="school-form">
            <form action="addClass" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="name" type="text" placeholder="Nazwa klasy">
                TODO NAUCZYCIEL
<!--                <input name="tutorId" type="text" placeholder="TODO NAUCZYCIEL">-->
                <button type="submit">DODAJ</button>
            </form>
        </section>
    </main>
</div>
</body>