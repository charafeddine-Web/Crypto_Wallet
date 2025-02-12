<?php
// just example for the helpers (to show the helpers folder)

function redirect($page)
{
    header('Location: ' . URLROOT . '/' . $page);
}