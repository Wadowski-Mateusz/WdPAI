<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/panel-classes.css">
    <script type="text/javascript" src="/public/js/searchClass.js" defer></script>
    <title>Diarium - Panel Classes</title>
</head>

<body>
<div class="base-container">
    <?php include 'public/views/nav.php'; ?>
    <main>
        <header>
            <div class="search-bar">
                <input placeholder="search class" class="search">
            </div>
        </header>
        <section class="classes">
            <?php foreach ($classes as $class) : ?>
            <div class="class">
               <my-tag> <?=$class->getName()?> </my-tag>
<!--               <my-tag> --><?php //=$class->getName()?><!-- </my-tag>-->
<!--               --><?php //=$class->getName()?>
            </div>
            <?php endforeach;?>

        </section>
    </main>
</div>
</body>



<template id="class-template">
    <div class="class">
        <my-tag> name </my-tag>
    </div>
</template>