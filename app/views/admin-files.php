@extends(head)
<body>
    <section class="admin-dashboard">
        <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
        @extends(menuEmployee)
        <?php else: ?>
            @extends(menu)
        <?php endif; ?>

    <main class="main-dashboard"> 
    </main>
    </section>
    
</body>
</html>