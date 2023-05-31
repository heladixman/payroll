<?php
if ($content) {
    echo '<div class="layout-page w-100 p-3 my-0 bg-second" id=content>';
    echo view('Pages/admin/component/Navbar');
    echo view($content);
    echo view('Pages/admin/component/Footer');
    echo '</div>';
}
