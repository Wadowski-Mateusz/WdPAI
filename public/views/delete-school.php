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
        <div class="quick-info">Usuń szkołę</div>
        <section class="school-form">
            <form action="deleteSchool" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <select class="schools-delete" name="schools-delete" id="schools-delete">
                    <option class="school" id=-1, value=-1>Wybierz szkołę</option>
                    <?php foreach (((new SchoolController())->getSchools()) as $school):?>
                        <option class="school" id=<?=$school->getId()?> value=<?=$school->getId()?>>
                            <?=$school->getName();?>
                        </option>
                    <?php endforeach;?>
                </select>
                <button type="submit">USUŃ</button>
            </form>
        </section>
    </main>
</div>
</body>