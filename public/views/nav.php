<!--https://alistapart.com/article/keepingcurrent/ dodawanie czegos za pomoca php-->

<link rel="stylesheet" type="text/css" href="/public/css/nav.css">
<script src="https://kit.fontawesome.com/e81504632c.js" crossorigin="anonymous"></script>

<nav>
    <ul>
        <?php if ($_COOKIE['userRole']!=="") {
            echo '
                <li>
                    <a href="grades" class="button">
                        Grades
                        <i class="fa-solid fa-book-open"></i>
                    </a>
                </li>
            ';}
        ?>

        <?php if ($_COOKIE['userRole']!== "") {
            echo '
                <li>
                    <a href="addGrade" class="button">
                        Add Grade
                        <i class="fa-solid fa-file-circle-plus"></i>
                    </a>
                </li>
            ';
        }

        ?>


<!--        <li>-->
<!--            <a href="#" class="button">-->
<!--                Attendance-->
<!--                <i class="fa-regular fa-calendar-check"></i>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#" class="button">-->
<!--                Remarks-->
<!--                <i class="fa-solid fa-circle-exclamation"></i>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#" class="button">-->
<!--                Messages-->
<!--                <i class="fa-solid fa-envelope"></i>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="plan" class="button">-->
<!--                Plan-->
<!--                <i class="fa-solid fa-calendar-days"></i>-->
<!--            </a>-->
<!--        </li>-->
        <li>
            <a href="user" class="button">
                User
                <i class="fa-solid fa-user"></i>
            </a>
        </li>
        <?php if ($_COOKIE['userRole']=="admin" || $_COOKIE['userRole']=="director"){
        echo '
        <li>
            <a href="addUser" class="button">
                Add User
                <i class="fa-sharp fa-solid fa-user-plus"></i>
            </a>
        </li>
        ';
        echo '
        <li>
            <a href="deleteUser" class="button">
                Delete User
                <i class="fa-solid fa-user-minus"></i>
            </a>
        </li>
        
        ';
        echo '
        <li>
            <a href="addClass" class="button">
                Add Class
                <i class="fa-solid fa-users-rectangle"></i>
            </a>
        </li>
        ';
        echo '
        <li>
            <a href="addSchool" class="button">
                Add School
                <i class="fa-solid fa-school"></i>
            </a>
        </li>
        
        ';
        }
        ?>

        <li>
            <a href="addSubject" class="button">
                Add Subject
            </a>
        </li>
        <li>
            <a href="panelClasses" class="button">
                Panel Classes
            </a>
        </li>

        <li>
            <a href="login" class="button">
                Logout
                <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </li>
        <li>
            <!-- <i class="fa-solid fa-ellipsis-vertical"></i> -->
            <i class="fa-solid fa-ellipsis"></i>
            <a href="#" class="button"></a>
        </li>
    </ul>
</nav>
