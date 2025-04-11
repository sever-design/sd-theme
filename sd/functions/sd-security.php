<?php
/*
 * Block php script exec if changes from 3rd parties and via local scripts via php-cli
 * Disable updates and file edits from non-Canadian IPs
 */
function disable_file_edit_securely() {
    $server_ip = gethostbyname($_SERVER['SERVER_NAME']);
    $remote_ip = $_SERVER['REMOTE_ADDR'];

    // Function to check if the IP is Canadian (using ip-api)
    function is_canadian_ip($ip) {
        $url = "http://ip-api.com/json/{$ip}?fields=countryCode";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Timeout in seconds
        $response = curl_exec($ch);
        curl_close($ch);
    
        if ($response) {
            $data = json_decode($response, true);
            $isCanadian = isset($data['countryCode']) && $data['countryCode'] === 'CA';
    
            // Debug in PHP
            error_log("IP: $ip - Country: " . ($data['countryCode'] ?? 'Unknown'));
    
            // Output JavaScript debug (Only if running in a browser)
            /*
            if (php_sapi_name() !== 'cli') {
                echo "<script>console.log('Country Code: " . ($data['countryCode'] ?? 'Unknown') . "');</script>";
            }
            */
    
            return $isCanadian;
        }
        return false; // Default to false if lookup fails
    }
   /* 
$ip = $_SERVER['REMOTE_ADDR']; // Get visitor IP
if (is_canadian_ip($ip)) {
    echo "User is from Canada!";
} else {
    echo "Access Denied: Non-Canadian IP!";
}*/

    // Check if script is running from CLI or suspicious process
    if (php_sapi_name() !== 'cli' && $remote_ip !== $server_ip) {
        // If the IP is not Canadian, disable file editing and updates
        if (!is_canadian_ip($remote_ip)) {
            define('DISALLOW_FILE_EDIT', true);
            define('DISALLOW_FILE_MODS', true);
        }
    }
}
add_action('init', 'disable_file_edit_securely');