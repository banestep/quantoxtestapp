<?php

class BasicRouter 
{
    function __construct() 
    {
        $this->routeTheRoute();
    }

    private function routeTheRoute()
    {
        $uri    = trim($_SERVER['REQUEST_URI'], '/');
        $urray  = explode('/', $uri);

        if(count($urray) > 0)
        {
            $class_name = $this->toCamelCase($urray[0]);
            if(class_exists($class_name))
            {
                $routebject = new $class_name($urray[1]);
            }
            else
            {
                echo "Bad route or no paramter. It's imperfect routing, I know...";
            }
        }
        else
        {
            echo 'Hardcoding home page to save time.';
        }
    }
    
    private function toCamelCase($string)
    {
      $result = strtolower($string);
          
      preg_match_all('/_[a-z]/', $result, $matches);
  
      foreach($matches[0] as $match)
      {
          $c = str_replace('_', '', strtoupper($match));
          $result = str_replace($match, $c, $result);
      }
  
      return $result;
    }
}