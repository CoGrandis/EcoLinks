@extends(head)
<body>
@extends(menu)
<h1>Registra un empleado</h1>
<form action="" method="POST">
    <input type="text" name="name">
    <input type="text" name="surname">
    <input type="date" name="email">
    <input type="text" name="birthday">
    <input type="text" name="address">
    <input type="date" name="hiringDate">
    <select name="department" id=""></select>
    <select name="position" id=""></select>
    <input type="submit">
</form>
</body>
</html>