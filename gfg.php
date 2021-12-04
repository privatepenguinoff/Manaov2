<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                   
    function get_data() {
        $name = $_POST['name'];
        $file_name='data'. '.json';
   
        if(file_exists("$file_name")) { 
            $current_data=file_get_contents("$file_name");
            $array_data=json_decode($current_data, true);
                               
            $extra=array(
                'User' => $_POST['user'],
                'Email' => $_POST['email'],
                'Pass1' => md5($_POST['pass1']),
                'Pass2' => md5($_POST['pass2']),
            );
            $array_data[]=$extra;
            echo "Файл найден<br/>";
            return json_encode($array_data);
        }
        else {
            $datae=array();
            $datae[]=array(
                'User' => $_POST['user'],
                'Email' => $_POST['email'],
                'Pass1' => md5($_POST['pass1']),
                'Pass2' => md5($_POST['pass2']),
            );
            echo "Файл не найден<br/>";
            return json_encode($datae);   
        }
    }
  
    $file_name='data'. '.json';
      
    if(file_put_contents("$file_name", get_data())) {
        echo '<label>Пользователь был создан</label>';
    }                
    else {
        echo 'Ошибка';                
    }

    function userlog()
    {
            //чтение файла
        $data = file_get_contents('addjson.json');
            //декодирование файла из json
        $data = json_decode($data,true);
        // проход по массиву
        foreach ($data as $value)
        {// поиск нужной переменной
            if ($value['User'] == $_POST['user'])
            {// если есть совпадение
                $GLOBALS['userlog']=1;
                    break;
            }
            else
            {// если нет совпадений
                $GLOBALS['userlog']=0;
            }
        }
    }
    function EmailLog()
    {
        $data = file_get_contents('addjson.json');
        $data = json_decode($data,true);
        foreach ($data as $value)
        {
            if ($value['email'] == $_POST['email'])
            {
                $GLOBALS['emaillog']=1;
                    break;
            }
            else
            {
                $GLOBALS['emaillog']=0;
            }
        }
    }
    function pass1Log()
    {
        $data = file_get_contents('addjson.json');
        $data = json_decode($data,true);
        foreach ($data as $value)
        {
            if ($value['Password_1'] == $GLOBALS['password_1'])
            {
                $GLOBALS['pass1log']=1;
                    break;
            }
            else
            {
                $GLOBALS['pass1log']=0;
            }
        }
    }
    function pass2Log()
    {
        $data = file_get_contents('addjson.json');
        $data = json_decode($data,true);
        foreach ($data as $value)
        {
            if ($value['Password_2'] == $GLOBALS['password_2'])
            {
                $GLOBALS['pass2log']=1;
                    break;
            }
            else
            {
                $GLOBALS['pass2log']=0;
            }
        }
    }
    $pass1log='pass1Log';
    $pass2log= 'pass2Log';
    $emailyes = 'EmailLog';
    $userlog = 'userlog';
    $gt = 'get_data';  
}      
?>