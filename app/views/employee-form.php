@extends(head)
<body>
    <section class="admin-dashboard">
        @extends(menu)
    <main class="main-dashboard"> 
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
    </main>
    </section>
    
</body>
