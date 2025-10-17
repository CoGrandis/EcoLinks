@extends(head)
<body>
    <section class="admin-dashboard">
        @extends(menu)
        
        <main class="main-dashboard"> 
            <h1>Lista de Empleados</h1>
            <form action="" method="post">
                <input type="text" name="search"placeholder="Buscar empleado...">
                <input type="submit" value="">
            </form>
            
            <section class="employee-list">
                    
            <?php foreach ($employees as $employee) : ?>
                <?= $employee["Nombre"] ?>
            <?php endforeach;?>
            </section>
    </section>
</body>
</html>
