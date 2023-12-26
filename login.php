<?php

require_once 'get_user_list.php';
require_once 'check_password.php';
require_once 'exists_user.php';
require_once 'get_current_user.php';

if (getCurrentUser() !== false){
    header('Location: index.php');
    exit;
}
else if (isset($_POST['login'])){
    if (checkPassword($_POST['login'], $_POST['password'])){
        session_start();
        $_SESSION['username'] = $_POST['login'];
        $_SESSION['login_time'] = time();
        $_SESSION['personal_discound_finished'] = strtotime('now +24 hours');
        header('Location: index.php');
        exit;
    }
    else{
        header('Location: login.php?auth=failed&login='.$_POST['login']);
    }
}
else{
    echo '
    <!DOCTYPE HTML>
    <html>
        <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>
        <meta name ="viewport" content="width= device-width, initial -scale=1.0">
        <meta http-equiv ="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet"  href ="css/style.css">
        <link rel="stylesheet"  href ="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
         </head>
    
    <body>
        <nav class="nav">
           <a class="nav-link active" aria-current="page" href="#">Услуги</a>
           <a class="nav-link" href="#">О нас</a>
           <a class="nav-link" href="#">Контакты</a>
           </nav>
          <form method="POST" action="login.php">
      
          <div class="form-title">Авторизация</div>
            <div class="form-field">
                <label class="form-label">Логин</label>
                <input class="form-value" type="text" name="login" value="'.(isset($_GET['login']) ? $_GET['login'] : '').'" required />
            </div>
            <div class="form-field">
                <label class="form-label">Пароль</label>
                <input class="form-value" type="password" name="password" required />
            </div>
            <input class="form-submit" type="submit" value="Войти" />
            '.((isset($_GET['auth']) && $_GET['auth'] === 'failed') ? '<div class="form-error">Неправильный логин или пароль</div>' : '').'
          </form>
         <div class="servies">
             <h2 class= servies-header> Наши услуги</h2> 
               <div class="card-body">
                <h2 class="card-title" >Массаж лица</h2>
                   <img src="img\young-woman-having-face-massage-relaxing-in-spa-salon.jpg" class="card-img-top" alt="Услуги" width="50" height="100">
                  <p class="card-text"> Предлогаем ваккумно-роликовый массаж, который помогает улучшить качество  кожи, уменьшить Целлюлит, укрепить мышцы и улучшить общее состояние  организма.</p>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Записаться</button>
                 </div> 
                   <div class="card-body_1">
                     <h2 class="card-title" >Ароматерапия</h2>
                      <img src="img\beautiful-spa-composition-on-massage-table-in-wellness-center-copyspace.jpg" alt="Услуги" width="280" height="100">
                     <p class="card-text"> Сотрудники салона красоты  подберут для вас аромат, исходя из ваших пожеланий.</p>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Записаться</button>
                </div> 
                  <div class="promotion">
                  <h2 class= servies-header_1> Акция месяца</h2>
                     <div class="card-body_2">
                       <p class="card-text"> Тайский массаж всего за 999 рублей<br>
                          Насладитесь классическим тайским массажем </p>
                            <h2 class="card-title" Тайский массаж></h2>
                              <img src="img\woman-relaxing-in-the-spa.jpg" alt="Услуги" width="500" height="300">
                            <div class="photo">
                             <img src="img\spa_salon.jpg" alt="Фото салона" width="300" height="200">
                               <img src="img\vf_4743-_1_.jpg" alt="Фото салона" width="300" height="200">
                                <img src="img\1647021197_5-kartinkin-net-p-spa-salon-kartinki-6.jpg" alt="Фато салона" width="300" height="200">
                        </div>
                    </div> 
                </div> 
            </div>

       </body>

    </html>';
}

