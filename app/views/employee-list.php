@extends(head)
<body>
    <section class="admin-dashboard">
        @extends(menu)
        
        <main class="main-dashboard"> 
            <section class="employee-list">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Departamento</th>
                            <th>Puesto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{ EMPLOYEE_LIST }}
                    </tbody>
                </table>
            </section>
        </main>
    </section>
</body>
</html>
