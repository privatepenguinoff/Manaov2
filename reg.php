<?php include ('gfg.php');
$data = $_POST;
// нажатие кнопки "зарегистрироваться"
if(isset($_POST['Registration']))
    {
        if(trim($data['user'])=='')
        {
            echo "Введите имя пользователя";
        }
        elseif (trim($data['email'])=='')
        {
            echo "Введите электронную почту";
        }
        elseif (trim($data['password_1'])=='')
        {
            echo "Введите пароль";
        }
        elseif (trim($data['password_2'])=='')
        {
            echo "Введите пароль повторно";
        }
        elseif($_POST['password2']!=$_POST['password1'])
        {
            echo "Повторный пароль введён не верно";
        }
        else
        {
            // использование функции CRUD_ADD
            $add();
            unset($data);
            unset($_POST);
            echo '<div style="color: green;">Вы успешно зарегестрировались!</div>';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="config.css">
    <title>ManaoReg</title>
</head>

<body>
     <form method="post"> 
  
        <div id="form_page"> 
  
            <div class="container"> 
                    <h1 class="heading">Регистрация</h1> 
                <br /> 
                <div class="input">
                    <label>Пользователь</label><br/>
                    <input type="text" name ="user" value = "<?php echo $data['user']?>" required>
                </div> 
                <div class="input"> 
                <label>Электронная почта</label><br/>   
                    <input type="text" name="email" value = "<?php echo $data['email']?>" required>
                </div> 
                <div class="input">
                    <label>Пароль</label><br/>
                    <input type="text" name="password_1" value = "<?php echo $data['password_1']?>" required> 
                </div> 
                <div class="input">
                    <label>Повторите пароль</label><br/>
                    <input type="text" name="password_2" value = "<?php echo $data['password_2']?>" required> 
                </div> 
                <div class="id input"> 
                    <input type="submit" name="submit" value="Registration" onclick="on_submit()">  
                </div>            
            </div> 
        </div> 
    </form> 
</body>
</html>