<?php
function copy_dir($src, $dst)
{
    if (is_link($src)) {
        symlink(readlink($src), $dst);
    } elseif (is_dir($src)) {
        mkdir($dst);
        foreach (scandir($src) as $file) {
            if ($file != '.' && $file != '..') {
                copy_dir("$src/$file", "$dst/$file");
            }
        }
    } elseif (is_file($src)) {
        copy($src, $dst);
    } else {
        echo "WARNING: Cannot copy $src (unknown file type)\n";
    }
}


copy_dir('hair1_new','hair1_new_3Ds_beta');

?>