<?php
function is_mod_brotli_enabled() {
    if (function_exists('apache_get_modules')) {
        $modules = apache_get_modules();
        return in_array('mod_brotli', $modules);
    }
    return false; // If unable to determine, assume it's not enabled
}

/*
// Usage
if (is_mod_brotli_enabled()) {
    echo "mod_brotli is enabled.";
} else {
    echo "mod_brotli is not enabled.";
}
*/