$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));

function slugify($text)
{ 
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $text));
}


public static function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}


function slugify($string){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }



1.	function fixForUri($string){
2.	 $slug = trim($string); // trim the string
3.	 $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug ); // only take alphanumerical characters, but keep the spaces and dashes too...
4.	 $slug= str_replace(' ','-', $slug); // replace spaces by dashes
5.	 $slug= strtolower($slug);  // make it lowercase
6.	 return $slug;
7.	}


// Slugify a string
function slugify($text)
{
    // Strip html tags
    $text=strip_tags($text);
    // Replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // Transliterate
    setlocale(LC_ALL, 'en_US.utf8');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Trim
    $text = trim($text, '-');
    // Remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // Lowercase
    $text = strtolower($text);
    // Check if it is empty
    if (empty($text)) { return 'n-a'; }
    // Return result
    return $text;
}


echo strip_tags("Hello <b><i>GeeksorGeeks!</i></b>", "<b>");



<script defer src="https://friconix.com/cdn/friconix.js"></script>


if( window.canRunAds === undefined )
{
    // adblocker detected, do something
    displayAlternateMessage();
}


$columns = array_column($array, 'name');
array_multisort($columns, SORT_ASC, $array);


$columns_1 = array_column($array, 'name');
$columns_2 = array_column($array, 'age');
array_multisort($columns_1, SORT_ASC, $columns_2, SORT_DESC, $array);


public function is_true($val, $return_null = false){
        $boolval = ( is_string($val) ? filter_var($val, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : (bool) $val );
        //$boolval = boolval( $boolval );
        return ( $boolval === null && !$return_null ? false : $boolval );
    }
