<?php

class Router
{
    protected $routes = [];
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->routes = [
            'home'        => './pages/home.php',
            'about'       => './pages/about.php',
            'contact'     => './pages/contact.php',
            'sign-in'     => './pages/sign-in.php', // sign in form
            'handle-sign-in' => 'UserController@SignIn', //sign in handler
            'sign-up'     => './pages/sign-up.php', // sign up form
            'handle-sign-up' => 'UserController@store', //sign up handler
            'logout'     => 'UserController@logout',
            'blogs'       => 'BlogController@showAllBlogs',
            'blog/create' => 'BlogController@create',
            'blog/store'  => 'BlogController@store',
            'blog/edit'   => 'BlogController@edit',  // Edit blog route
            'blog/update' => 'BlogController@update', // Update blog route
            '404'         => './pages/404.php',
        ];
    }
    

    /**
     * This method takes a page name and routes to the corresponding view/controller
     * @param string $page The name of the page to route to
     * @return void
     */
    public function route($page)
    {

        if (empty($page)) {
            $page = 'home';
        }

        // check if the page exists in the routes array
        if ($this->isARoute($page)) {
            $route = $this->routes[$page];


            if ($this->isControllerRoute($route)) {
            //split into controller and method
                list($controllerName, $methodName) = explode('@', $route);
            
                require_once "../controllers/$controllerName.php";
                $controller = new $controllerName($this->db); // create an instance of the controller

                // check if the controller has the method
                if (method_exists($controller, $methodName)) {

                    $controller->$methodName(); // call the method
                } else {
                    include $this->routes['404'];
                }
            } else {
                // If the route is a static page, include it
                include $route;
            }
        } else {
        
            include $this->routes['404'];
        }
    }


    // checks if the page exists in the routes array  
    protected function isARoute($page)
    {
        return array_key_exists($page, $this->routes); //returns true or false
    }

 
    // Check if the route refers to a controller action.
    protected function isControllerRoute($route)
    {
        // check if the route is a string and contains '@'
        return is_string($route) && strpos($route, '@') !== false; // returns true or false
    }




}