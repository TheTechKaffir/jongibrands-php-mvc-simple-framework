<?php 

function show($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
function set_value($key, $default = '')
{
    if(!empty($_POST[$key]))
    {
        return $_POST[$key];
    } else
    if(!empty($default))
    {
        return $default;
    }

    return '';
}

function redirect($page)
{
    header('Location: ' . ROOT . '/' . $page );
    die;
}

function message($msg = '',$erase = false)
{
    if(!empty($msg)) 
    {
        $_SESSION['message'] = $msg;

    } elseif(!empty($_SESSION['message'])) 
    {
        $msg = $_SESSION['message'];
        if($erase)
        {
            unset($_SESSION['message']);
            
        }
        return $msg;
          
    }

    return false;
}

function esc($str)
{
    return nl2br(htmlspecialchars($str));
}

function str_to_url($url)
{

   $url = str_replace("'", "", $url);
   $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
   $url = trim($url, "-");
   $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
   $url = strtolower($url);
   $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
   
   return $url;
}