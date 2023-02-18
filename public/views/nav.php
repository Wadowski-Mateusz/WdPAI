<!--https://alistapart.com/article/keepingcurrent/ dodawanie czegos za pomoca php-->

<link rel="stylesheet" type="text/css" href="/public/css/nav.css">
<script src="https://kit.fontawesome.com/e81504632c.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="/public/js/logout.js" defer></script>

<nav>
    <ul>
        <?php
            $nav = getNav();
            $tmp = '';
            foreach ($nav as $key => $value) :
                $tmp = explode(';', $value)?>
            <li>
                <a href=<?=$key?> class="button">
                    <?=$tmp[0]?> <i class=<?=$tmp[1]?>></i>
                </a>
            </li>
        <?php endforeach; ?>
        <li>
            <a href="user" class="button">
                Użytkownik <i class="fa-solid fa-user"></i>
            </a>
        </li>
        <li>
            <a href="deleteCookies" class="logout-button">
                Wyloguj <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </li>
        <li>
<!--            <i class="fa-solid fa-ellipsis-vertical"></i>-->
            <i class="fa-solid fa-ellipsis"></i>
            <a href="#" class="button"></a>
        </li>
    </ul>
</nav>

<?php
    function getNav() : array {
        $nav = [];
        switch ($_COOKIE['userRole']){
            case 'student':
                $nav = navForStudent();
                break;
            case 'teacher':
                $nav = navForTeacher();
                break;
            case 'director':
                $nav = navForDirector();
                break;
            case 'admin':
                $nav = navForAdmin();
                break;
        }
        return $nav;
    }

    function navForStudent() : array {
        return ['grades' => 'Oceny;"fa-solid fa-book-open"'];
    }

    function navForTeacher() : array {
        return [
            'addGrade' => 'Dodaj ocene;"fa-solid fa-file-circle-plus"',
             'panelClasses' => 'Zarządzaj kalsami;""'
        ];
    }

    function navForDirector() : array {
        return ['addUser' => 'Dodaj użytkownika;"fa-sharp fa-solid fa-user-plus"',
            'addClass' => 'Dodaj klasę;"fa-solid fa-users-rectangle"',
            'addSubject' => 'Dodaj przedmiot;""'];
    }

    function navForAdmin() : array {
        return ['addUser' => 'Dodaj użytkownika;"fa-sharp fa-solid fa-user-plus"',
            'addSchool'=>'Dodaj szkołę;"fa-solid fa-school"',
            'deleteSchool'=>'Usuń szkołę;"fa-solid fa-school"'];
    }
?>

