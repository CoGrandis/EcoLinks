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
                        <table class="reclamo-table">
                            <thead>
                                <tr>
                                    <th>Asunto</th>
                                    <th>Descripción</th>
                                    <th>Prioridad</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= htmlspecialchars($reclamo['asunto']) ?></td>
                                    <td><?= nl2br(htmlspecialchars($reclamo['descripcion'])) ?></td>
                                    <td><?= htmlspecialchars($reclamo['prioridad']) ?></td>
                                    <td><?= htmlspecialchars($reclamo['estado']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                <?php endforeach; ?>
        </div>
    </main>
    </section>
    
</body>
</html>