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
        <div class="quick-info">Dodaj przedmiot</div>
        <section class="school-form">
            <form action="addSubject" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="name" type="text" placeholder="Nazwa przedmioru">

                <select class="teachers" name="teachers" id="teachers">
                    <option class="teacher" id=-1, value=-1>Wybierz nauczyciela</option>
                    <?php $schoolId = (new UserRepository())->getUserSchoolId(); ?>
                    <?php $teachers = (new SchoolController())->getTeachersFromSchool($schoolId); ?>
                    <?php foreach ($teachers as $teacher):?>
                        <option class="teacher" id=<?=$teacher->getId()?> value=<?=$teacher->getId()?> >
                            <?=$teacher->getName().' '.$teacher->getSurname();?>
                        </option>
                    <?php endforeach;?>
                </select>
                <select class="classes" name="classes" id="classes">
                    <option class="class" id=-1, value=-1>Wybierz Klasę</option>
                    <?php foreach ((new ClassController())->getClassesFromSchool() as $class):?>
                        <option class="class" id=<?=$class->getId()?> value=<?=$class->getId()?>>
                            <?=$class->getName();?>
                        </option>
                    <?php endforeach;?>
                </select>
                <button type="submit">DODAJ</button>
            </form>
        </section>
    </main>
</div>
</body>