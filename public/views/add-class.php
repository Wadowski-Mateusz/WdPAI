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
        <div class="quick-info">Dodaj klasę</div>
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

                <select class="teachers" name="teachers" id="teachers">
                    <option class="teacher" id=-1, value=-1>Wybierz wychowawcę</option>
                    <?php $schoolId = (new UserRepository())->getUserSchoolId(); ?>
                    <?php $teachers = (new SchoolController())->getTeachersFromSchool($schoolId); ?>

                    <?php foreach ($teachers as $teacher):?>
                        <option class="teacher" id=<?=$teacher->getId()?> value=<?=$teacher->getId()?> >
                            <?=$teacher->getName().' '.$teacher->getSurname();?>
                        </option>
                    <?php endforeach;?>

                </select>

                <button type="submit">DODAJ</button>
            </form>
        </section>
    </main>
</div>
</body>