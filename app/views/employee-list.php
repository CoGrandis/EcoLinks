@extends(head)
<link rel="stylesheet" href="../../assets/css/emple.css">
<body>
    <section class="admin-dashboard">
        @extends(menu)
        
        <main class="main-dashboard"> 
            <div class=".emple-searchbar">
                <form action="" method="post">
                <input type="text" name="search"placeholder="Buscar empleado...">
                <input type="submit" value="">
            </form>
                
            </div>
           
            
            <section class="employee-list">
                    
            <?php foreach ($employees as $employee) : ?>
                <?= $employee["Nombre"] ?>
            <?php endforeach;?>
            </section>
    </section>
</body>
</html>
