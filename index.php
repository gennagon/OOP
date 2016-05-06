<?php

class User{

    // Константа
    const MIN_USER_AGE = 18;
    //количество созданных экземпляров
    public static $count = 0;
    //логин юзера
    public $login;
    //телефон юзера
    public $tel;


    //Уже можно регистрироваться на сайте
    public static function isAllowedToRegister($age){
        if ((int)$age >= self:: MIN_USER_AGE){
            return true;
        }
            return false;
    }

    public function __construct($login , $tel)
    {
        self::$count++;
        $this -> login = $login;
        $this -> tel = $tel;
    }

    public function register (){
        //Заморозка объекта
        $data = serialize($this);
        file_put_contents($this ->login. '.user' , $data);
    }

    public static function getByLogin ($login){
        //Разморозка объекта из файла
       $data = file_get_contents($login.'.user');
        $object = unserialize($data);
        var_dump($object);
        die;


    }
}
    //Получили обратно
    //$existing_user = User::getByLogin('oleg');
    //$existing_user -> ....;





    if ($_POST && isset($_POST ['login']) && isset($_POST ['tel'])){
        $new_user = new User($_POST ['login'], $_POST ['tel']);
        $new_user ->register();
    }


//var_dump(User:: isAllowedToRegister(15));
//echo "<br>";
//echo User::MIN_USER_AGE;
//echo "<br>";

//$user_1 = new User('admin', '0504326688');
//$user_1 ->register();
//$user_2 = new User('test', '0931234488');
//$user_2 ->register();
//echo User::$count;
//echo "<br>";
//echo $user_2::$count;
//echo "<br>";

//var_dump($user_1 -> isAllowedToRegister(15));



//echo User::MIN_USER_AGE;//die;

//echo "<br>";

//$user_1 = new User('admin', '0504326688');
//$user_1 -> login = 'admin';

//$user_2 = new User('test', '0931234488');
//$user_2 -> login = 'test';

//var_dump($user_1);
//echo '<br>';
//var_dump($user_2);




?>


<form method="post" action="">
    <input type="text" name="login" placeholder="Your Login" value="" /><br>
    <input type="text" name="tel" placeholder="Введите ваш телефон" value="" /><br>
    <input type="submit" value="Регистрация" /><br>
</form>
