<?php
// Checking character encoding in an array(only for 1 or 2 dimensional array)
function cken(array $data):bool{
    $result = true;
    foreach ($data as $key => $value) {
        if (is_array($value)){
            $value = implode("", $value);
        }
        if (!mb_check_encoding($value)){
            $result = false;
            break;
        }
    }
    return $result; 
} 

function es(array | string $data, string $charset='UTF-8'):mixed {
    /* "array | string" means array or string. "mixed" means any type */
    if (is_array($data)){
        return array_map(__METHOD__, $data);
    // __METHOD__ means es here ,   recursive call 
    } else {
    /* perform HTML escape: htmlspecialchars convert  
        <, >, &, “ ,‘ to  &lt;, &gt;, &amp;, &quot;, &#039, respectively */ 
        return htmlspecialchars(string:$data, flags:ENT_QUOTES, encoding:$charset);
    }
} 


  