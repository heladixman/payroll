<?php
if ($content) {
    echo '<div class="layout-page w-50 p-3 my-0 bg-first mx-auto h-100" id=content>';
    echo view($content);
    echo view('Pages/user/component/Footer');
    echo '</div>';
}
