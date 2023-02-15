<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <title>Diarium</title>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img src="public/img/logo.svg">
            </div>
            <div class="login-container">
                <form class="login" action="login" method="POST">
                    <div class="messages">
                        <?php 
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input name="pesel" type="text" placeholder="pesel">
                    <input name="password" type="password" placeholder="password">
                    <button type="submit">LOGIN</button>
                </form>
            </div>
        </div>

    </body>
</html>

