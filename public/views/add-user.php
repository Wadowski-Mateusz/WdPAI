<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/adding.css">
    <link rel="shortcut icon" href="/public/img/logo.svg">

    <script type="text/javascript" src="/public/js/registerValidate.js" defer></script>
    <script type="text/javascript" src="/public/js/schoolsWithoutDirector.js" defer></script>
    <script type="text/javascript" src="/public/js/hidingElement.js" defer></script>
    <title> Diarium - add user</title>
</head>

    <body>
    <div class="base-container">
        <?php include 'public/views/nav.php'; ?>
        <main>
            <div class="quick-info">Dodawanie użytkownika</div>
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

                    <select id="role" name="roles" class="roles">
                        <?php if($_COOKIE['userRole']=='director'):?>
                            <option value="4">Uczeń</option>
                            <option value="3">Nauczyciel</option>
                        <?php else :?>
                        <option value="1">Admin</option>
                        <option value="2">Dyrektor</option>
                        <?php endif;?>
                    </select>

                    <?php if($_COOKIE['userRole']=='admin'):?>
                        <select class="schools" name="schools" id="schools">
                            <option class="school" id=-1, value=-1>Wybierz szkołę</option>
                            <?php foreach (((new SchoolController())->getSchoolsWithoutDirector()) as $school):?>
                                <option class="school" id=<?=$school['id']?> value=<?=$school['id']?>>
                                    <?=$school['name'];?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    <?php endif; ?>

                    <?php if($_COOKIE['userRole']=='director'):?>
                        <select class="classes" name="classes" id="classes">
                            <option class="class" id=-1, value=-1>Wybierz Klasę</option>
                            <?php foreach ((new ClassController())->getClassesFromSchool() as $class):?>
                                <option class="class" id=<?=$class->getId()?> value=<?=$class->getId()?>>
                                    <?=$class->getName();?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    <?php endif; ?>

                    <input class="fileButton" type="file" name="file"/>
                    <button type="submit">DODAJ</button>
                </form>
            </section>
        </main>
    </div>
</body>