<?php


namespace App\Http\Controllers;

use App\Category;
use App\Reception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $categories;

    public function __construct()
    {
        $this->categories = array('мамини рецепти', 'предястия', 'основни',
            'супи', 'салати', 'десерти', 'сандвичи', 'сготви набързо');
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    public function findCategoryReceptions($catname) {

        // return an array of receptions by category
        if(stripos($catname, '-')) {
            $catname = str_replace('-',' ', $catname);
        }

        $receptions = DB::select("select r.* from receptions as r, categories as c
                                 where c.id=r.cat_id
                                 and c.catname = ?", [$catname]);

        $categories = $this->getCategories();


        $data = array(
            'receptions' => $receptions,
            'categories' => $categories
        );

        return view('categories.show', compact('data'), $data);
    }
}