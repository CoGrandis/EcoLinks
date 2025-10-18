@extends(head)
<body>
    <section class="admin-dashboard">
        <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
        @extends(menuEmployee)
        <?php else: ?>
            @extends(menu)
        <?php endif; ?>

    <main class="main-dashboard"> 
        <h1>Lista de Reclamos</h1>
        <div class="reclamos-container">
                <?php foreach ($reclamos as $reclamo) : ?>
                       
                <?= htmlspecialchars($reclamo['asunto']) ?>
                
            <?php endforeach; ?>
        </div>
    </main>
    </section>
    
</body>
</html>