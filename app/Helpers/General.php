<?php

function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'uploads/images/' . $folder . '/' . $filename;
    return $path;
}