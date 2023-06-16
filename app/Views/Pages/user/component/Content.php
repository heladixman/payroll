<?php
if ($content) {
    echo '<div class="layout-page my-0 bg-first mx-auto h-100" id=content>';
    echo view($content);
    echo view('Pages/user/component/Footer');
    echo '</div>';
}
