<html lang="ru">
  <head>
    <meta charset="utf-8">
<style>body { margin:0;
	display:flex;
	flex-direction:column;
text-align:center;
background-color:white;}
header {display:flex;
flex-direction: column;
text-align: center;
background-color:skyblue}
	  /* Сообщения об ошибках и поля с ошибками выводим с красным бордeром. */
.error {
	border: 2px solid red;
	}
	  </style>
    <title>44<title>
  </head>
  <body>
<header>
<p>Здравствуйте, заполните анкету, чтобы мы могли сохранить ваши данные.</p>
<p>Над неправильными данными будет высвечиваться ошибка.</p>
</header>
	  <?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}
	  // Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>
	   <?php
        if (!empty($_COOKIE[session_name()]) && !empty($_SESSION['login']))
          print('<h3 id="form"> FORM<br/>(режим редактирования) </h3>');
        else
          print('<h3 id="form"> FORM </h3>');
        ?>
	  <br>
	  <br>
	<form action="" method="POST">
		Имя:
	<br>
      <input type="text" name="name" 
	     <?php if ($errors['name']) {print 'class="error"';} ?>
	     value="<?php print $values['name']; ?>" />
        <br> email:<br>
	<input type="email" name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>" />
        <br>Дата рождения:<br>
	<input type="date" name="date" <?php if ($errors['date']) {print 'class="error"';} ?> value="<?php print $values['date']; ?>" />
	<br>Пол:<br> 
      	<div <?php if ($errors['pol']) {print 'class="error"';} ?>>
        <input type="radio" name="pol" value="man" <?php if ($values['pol'] == 'man') {print 'checked';} ?>> Муж
        <input type="radio" name="pol" value="woman" <?php if ($values['pol'] == 'woman') {print 'checked';} ?>> Жен
      </div>
		<br>
	Количество конечностей:
		 <div <?php if ($errors['parts']) {print 'class="error"';} ?>>
	<input type="radio" name="parts" value="1" <?php if ($values['parts'] == '1') {print 'checked';} ?>> 1 
        <input type="radio" name="parts" value="2" <?php if ($values['parts'] == '2') {print 'checked';} ?>> 2 
        <input type="radio" name="parts" value="3" <?php if ($values['parts'] == '3') {print 'checked';} ?>> 3 
        <input type="radio" name="parts" value="4" <?php if ($values['parts'] == '4') {print 'checked';} ?>> 4
      </div>
	Сверхспособности:
	<br>
        <select name="abilities[]" multiple="true">
		<option value="immortality" <?php if (in_array("immortality", $values['abilities'])) {print 'selected';} ?>>Бессмертие</option>
		<option value="intangibility" <?php if (in_array("intangibility", $values['abilities'])) {print 'selected';} ?>>Прохождение сквозь стены</option>
		<option value="levitation" <?php if (in_array("levitation", $values['abilities'])) {print 'selected';} ?>>Левитация</option>
        </select>
	<br>
	Биография:
	<br>
        <textarea name="biography" style="margin: 0px; height: 69px; width: 180px;"><?php print $values['biography']; ?></textarea>
      	</label>
	<br>
      	<label>
    	<input id="checkbox" type="checkbox" name="checkbox" onchange="document.getElementById('submit').disabled = !this.checked;" /> 
		С контрактом ознакомлен(а)
		<br>
		</label>
		<input type="submit" disabled="disabled" name="submit" id="submit" value="Отправить" />
		<br>
    </form>
	 <br>
	   <ul>
        <li>
          <?php
          if (!empty($_COOKIE[session_name()]) && !empty($_SESSION['login']))
            print('<a href="./?quit=1" class = "gradient-button" title = "Log in">Выйти</a>');
          else
            print('<a href="login.php" class = "gradient-button"  title = "Log out">Войти</a>');
          ?></li>
      </ul>
	 <img src="putty.png" alt="PuTTY">  
</body></html>