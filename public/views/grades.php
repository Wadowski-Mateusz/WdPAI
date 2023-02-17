<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/grades.css">
    <title>Diarium - Grades</title>
</head>

<body>
<div class="base-container">
    <?php include 'public/views/nav.php'; ?>
    <main>
        <section class="grades">
            <?php
                foreach ($subjects as $subject) :
                $sum = 0;
                $denominator = 0;
            ?>
            <div class="subject">
                <h2><?=$subject->getName();?></h2>
                <div class="subject-grades">
                    <?php foreach ($grades as $grade) : ?>
                        <?php if ($grade->getSubjectId() == $subject->getId()) :
                                $sum+=$grade->getGrade();
                                $denominator+=1;
                            ?>
<!--                            <div class="grade"> --><?php //=$grade->getGrade();?><!-- </div>-->
                            <div class="grade"> <?=floatToGrade($grade->getGrade());?> </div>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
                <div class="final-grade">
                    Średnia: <?php echo ($denominator) ? round($sum/$denominator,2) : 'Brak Ocen';?>
                </div>
            </div>
            <?php endforeach;?>

        </section>
    </main>
</div>
</body>

<?php
function floatToGrade(float $val) : string{
    $floor = floor($val);
    if ($floor == $val)
        return $val;

    return ($val - $floor < 0.5) ? number_format($floor,0).'+' : number_format($floor,0).'-';
}
?>
