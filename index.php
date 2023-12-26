<?php

require_once 'get_user_list.php';
require_once 'check_password.php';
require_once 'exists_user.php';
require_once 'get_current_user.php';

session_start();

if (getCurrentUser() === false){
    header('Location: login.php');
    exit;
}

function showLeftDaysToBirthday(){
    $today = strtotime('today');
    $bd = $_SESSION['birthday'];
    $bd_time = mktime(0, 0, 0, substr($bd, 5, 2), substr($bd, 8, 2), substr($bd, 0, 4));

    if ($bd_time < $today){
        $bd_time = strtotime(date('Y-m-d', $bd_time).' +1 year');
    }

    $diff_day = floor(($bd_time-$today)/3600/24);
    $str = '';
    if ($diff_day == 0){
        $str = '<div class="user-happy-birthday">Поздравляем!!! У вас персональная скидка 5% по всем услугам!!!</div>';
    }
    else{
        $str = '<div class="user-happy-birthday-wait">До замечательного подарка от нас осталось '.$diff_day.' дней</div>';
    }
    return $str;
}

function showBirthdayForm(){
    return '
    <form class="birthday" method="POST" action="set_birthday.php">
        <div class="form-field">
            <label class="form-birthday-label">Введите дату рождения:</label>
            <input class="form-birthday-value" type="date" min="1900-01-01" name="birthday" value="" required />
            <input class="form-submit" style="float: none;" type="submit" value="Сохранить" />
        </div>
    </form>';
}
echo '
    <!DOCTYPE HTML>
    <html>
    <head>
        <meta charset="UTF-8">
        <title> Личный кабинет</title>
        <meta name ="viewport" content="width= device-width, initial -scale=1.0">
        <meta http-equiv ="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet"  href ="css/style1.css">
        <link rel="stylesheet"  href ="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="user-panel">
            <div class="user-name-panel">Добро пожаловать, <span class="user-name">'.$_SESSION['username'].'</span>!</div>
            <div class="user-login-time">Время входа: <b>'.date('d.m.Y H:i:s', $_SESSION['login_time']).'</b></div>
            <div class="button-panel">
                <button class="user-exit" onclick="location.href = \'logout.php\'">Выйти</button>
            </div> 
            
          <div class="welcome"
            <p> Добро пожаловать в Spa-Salon</p>
             </div>
              <div class="img__container">
              <img src="img\Спа салон.jpg" class="image" alt="Спа салон">
               <div class="img__description">
               <div class="img__header">Акция </div>
               <div class="promotion">
               <div class="sale">
             Ваша персональная скидка истекает: <span class="sale">'.date('d.m.Y H:i:s', $_SESSION['personal_discound_finished']).'</span>
             </div>
             '.(isset($_SESSION['birthday']) ? showLeftDaysToBirthday() : showBirthdayForm()).'
             </div>
                 </div> 
                     </div>
                </div>
         </body>
    </html>';
