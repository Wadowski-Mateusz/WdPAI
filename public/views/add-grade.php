<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/adding.css">
    <link rel="shortcut icon" href="/public/img/logo.svg">
    <title> Diarium - add grade </title>
</head>

<body>
<div class="base-container">
    <?php include 'public/views/nav.php'; ?>
    <main>
        <div class="quick-info">Dodaj ocenę</div>
        <section class="school-form">
            <form action="addGrade" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>

                <select id="class" name="classId">
                    <?foreach ($classes as $class) :?>
                        <option value=<?=$class->getId();?>>
                            <?=$class->getName();?>
                        </option>
                    <?endforeach;?>
                </select>

                <br>
                SELECT CLASS
                <br>
                SELECT SUBJECT
                <br>
                SELECT USER
                <br>
                ENTER GRADE
                <br>
<!--                <input name="grade" type="text" placeholder="TODO ZAMIEŃ NA SELECTA Ocena">-->
<!--                <input name="dateOfIssue" type="text" placeholder="TODO zamień na auto data wystawienia">-->
                <button type="submit">DODAJ</button>
            </form>
        </section>
    </main>
</div>
</body>