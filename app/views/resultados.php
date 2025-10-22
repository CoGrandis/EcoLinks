@extends(head)
<link rel="stylesheet" href="../../assets/css/calendario.css">
<body>
<section class="admin-dashboard">
    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
      @extends(menuEmployee)
    <?php else: ?>
      @extends(menu)
    <?php endif; ?>
    {{ RESULTADOS }}

</body>
</html>
