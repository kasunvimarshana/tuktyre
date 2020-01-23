<?php

/* String Slug */
/*
if(!function_exists('str_slug')){
    function str_slug($slug_string = null){
        //return $slug_string;
        $slug_string = trim($slug_string);//trim the string
        $slug_string = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug_string);//only take alphanumerical characters, but keep the spaces and dashes too...
        $slug_string = str_replace(' ', '-', $slug_string);//replace spaces by dashes
        $slug_string = strtolower($slug_string);//make it lowercase
        return $slug_string;
    }
}
*/

/* String Slug */
if(!function_exists('str_slug')){
    function str_slug($slug_string = null){
        //return $slug_string;
        // Strip html tags
        $slug_string = strip_tags($slug_string);
        // Replace non letter or digits by -
        $slug_string = preg_replace('~[^\pL\d]+~u', '-', $slug_string);
        // Transliterate
        setlocale(LC_ALL, 'en_US.utf8');
        $slug_string = iconv('utf-8', 'us-ascii//TRANSLIT', $slug_string);
        // Remove unwanted characters
        $slug_string = preg_replace('~[^-\w]+~', '', $slug_string);
        // Trim
        $slug_string = trim($slug_string, '-');
        // Remove duplicate -
        $slug_string = preg_replace('~-+~', '-', $slug_string);
        // Lowercase
        $slug_string = strtolower($slug_string);
        // Check if it is empty
        if (empty($slug_string)) { 
            $slug_string = 'n-a'; 
        }
        // Return result
        return $slug_string;
    }
}

?>
