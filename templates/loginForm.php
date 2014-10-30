<?//loginForm.php.txt (plain)?>
<form action="<?=$this -> getBaseUrl(); ?>/user/login" method="post">
 <label>Login: </label><input type="text" name="username"><br/>
 <label>Hasło: </label><input type="password" name="password"><br/>
 <input type="submit" name="submit" value="OK">
</form>
 
<?=$message?>