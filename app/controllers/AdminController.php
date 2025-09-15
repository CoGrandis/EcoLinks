
<?php

class AdminController
{
    public function dashboard()
    {
        require __DIR__ . '/../views/admin-dashboard.php';
    }
    public function news()
    {
        require __DIR__ . '/../views/admin-news.php';
    }


}
?>