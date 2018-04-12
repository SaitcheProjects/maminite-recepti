<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $categories;

    public function __construct()
    {
        $this->categories = array(
            1 => array('image' => 'мамини-рецепти.png', 'name' => 'мамини рецепти'),
            2 => array('image' => 'предястия.png', 'name' => 'предястия'),
            3 => array('image' => 'основни-ястия.png', 'name' => 'основни'),
            4 => array('image' => 'супи.png', 'name' => 'супи'),
            5 => array('image' => 'салати.png', 'name' => 'салати'),
            6 => array('image' => 'десерти.png', 'name' => 'десерти'),
            7 => array('image' => 'сандвичи.png', 'name' => 'сандвичи'),
            8 => array('image' => 'сготви-набързо.png', 'name' => 'сготви набързо')
        );
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    public function dump($data)
    {
        echo '<pre>';
        var_dump($data);
        exit;
    }

    public function inCategories($category)
    {
        $categories = $this->getCategories();

        return in_array($category, array_column($categories, 'name'));
    }


}
