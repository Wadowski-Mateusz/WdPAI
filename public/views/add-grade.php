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
                <select class="subjects" name="subjects" id="subjects">
                    <option class="subject" id=-1, value=-1>Wybierz przedmiot</option>
                    <?php foreach ($subjects as $subject):?>
                        <option class="subject" id=<?=$subject->getId()?> value=<?=$subject->getId()?>>
                            <?=$subject->getName();?>
                        </option>
                    <?php endforeach;?>
                </select>
                <select class="students" name="students" id="students">
                    <option class="student" id=-1, value=-1>Wybierz ucznia</option>
                    <?php foreach ($students as $student):?>
                        <option class="student" id=<?=$student->getId()?> value=<?=$student->getId()?>>
                            <?=$student->getName().' '.$student->getSurname();?>
                        </option>
                    <?php endforeach;?>
                </select>
                <select class="grades" name="grades" id="grades">
                    <option class="grade" id=-1, value=-1>Wybierz ocenę</option>
                    <option class="grade" id=0 value=1>1</option>
                    <option class="grade" id=1 value=1.33>1+</option>
                    <option class="grade" id=2 value=1.67>2-</option>
                    <option class="grade" id=3 value=2>2</option>
                    <option class="grade" id=4 value=2.33>2+</option>
                    <option class="grade" id=5 value=2.67>3-</option>
                    <option class="grade" id=6 value=3>3</option>
                    <option class="grade" id=7 value=3.33>3+</option>
                    <option class="grade" id=8 value=3.67>4-</option>
                    <option class="grade" id=9 value=4>4</option>
                    <option class="grade" id=10 value=4.33>4+</option>
                    <option class="grade" id=11 value=4.67><5-</option>
                    <option class="grade" id=12 value=5>5</option>
                    <option class="grade" id=13 value=5.33>5+</option>
                    <option class="grade" id=14 value=5.67>6-</option>
                    <option class="grade" id=15 value=6>6</option>
                </select>

                <button type="submit">DODAJ</button>
            </form>
        </section>
    </main>
</div>
</body>