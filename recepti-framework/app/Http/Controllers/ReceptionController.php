<?php

namespace App\Http\Controllers;

use App\Category;
use App\Reception;
use DB;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getCategories();
        $receptions = DB::select("select * from receptions LIMIT 12");

        $metaData = $this->generateHomeMetadata();

        $data = array(
            'categories' => $categories,
            'receptions' => $receptions,
            'meta'       => $metaData
        );

        return view('receptions.index', compact('data', $data));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('receptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
//            'products' => 'required|min:6',
//            'preparation' => 'required|min:6',
//            'image' => 'required|min:6',
//            'prepareTime' => 'required|min:6'
        ]);

        $reception = Reception::create([
            'name' => $request->name,
            'products' => $request->products,
            'preparation' => $request->preparation,
            'image' => $request->image,
            'prepareTime' => $request->prepareTime,

        ]);

        return redirect('/reception/add');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  \App\Reception $reception
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Reception $reception)
    {
        $showparam = $request->showparam;

        if(stripos($showparam, '-')) {
            $showparam = str_replace('-',' ', $showparam);
        }

        $showCatRecipes = $this->inCategories($showparam);
        $categories = $this->getCategories();

       // var_dump($showparam, $showCatRecipes); die;

        // return an array of receptions by category
        if($showCatRecipes) {

            $receptions = DB::select("select r.* from receptions as r, categories as c
                                 where c.id=r.cat_id
                                 and c.catname = ?", [$showparam]);

//            echo 'show categories';
//            $this->dump($receptions);

            $metaData = $this->generateCategoryMetadata($showparam);

            $data = array(
                'receptions' => $receptions,
                'categories' => $categories,
                'meta' => $metaData
            );

            return view('categories.show', compact('data', $data));
        }else {
            $reception = DB::select("select receptions.*, categories.*
                                          from receptions
                                          INNER JOIN categories
                                          on receptions.cat_id = categories.id
                                          WHERE receptions.name = ?", [$showparam]);

           // Основната съставка, напр. URL: "/спагети-с-броколи" това е "спагети"
           $mainProductParam = substr($showparam,0,stripos($showparam, ' '));


            // Подобни рецепти TODO но различни от текущата
//            $likeReceptions = DB::select("select r.* from receptions as r
//                                 where r.name LIKE '%$mainProductParam%'", [$mainProductParam]);

            $likeReceptions = DB::table('receptions')
                ->where('name', 'like', "%$mainProductParam%")
                ->where('name', '<>', $showparam)
                ->get();

            $metaData = $this->generateRecipeMetadata($reception[0]);

            $data = array(
                'categories' => $categories,
                'reception' => $reception[0],
                'likeReceptions' => $likeReceptions,
                'meta' => $metaData
            );

            return view('receptions.show', compact('data', $data));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function edit(Reception $reception)
    {
        return view('receptions.edit', compact('reception', $reception));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reception $reception)
    {
        // Validate reception
        $request->validate([
            'name' => 'required|min:6',
        ]);

        $reception->name = $request->name;
        $reception->products = $request->products;

        // todo
        $reception->save();

        // redirect the user to home route with session message
        return redirect('homepage')->with('success', 'Редакцията на рецептата е успешна');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reception $reception)
    {
        $reception->delete();

        return redirect('homepage')->with('success', 'Рецептата е изтрита успешно');
    }

    /**
     * Генериране на мета данни за начална страница: title, description, keywords
     * - title - (70 символа/12 думи)
     * - description - (до 160 символа)
     * - keywords - (до 160 символа) 4-10 думи
     * @return array $data
     */
    public function generateHomeMetadata()
    {

        $title = 'Вкусни готварски рецепта - как да сготвим като мама | Мамините рецепти';
        $metaDescr = 'Вкусни готварски рецепти.'.'Как да приготвим лесно вкусни ястия и кулинарни рецепти.'.
                    'Сготви бързо и вкусно.';
        $metaKeywords = 'вкусни рецепти за готвене, готварство, готварски рецепти '.',как да сготвим лесно и вкусно,'
            .'кулинарни рецепти, готварски рецепти със снимки, здравословни и диетични рецепти, какво да сготвя, лесна рецепти за всеки готвач и кухня';

        $data = array(
            'title'        => $title,
            'metaDescr'    => $metaDescr,
            'metaKeywords' => $metaKeywords,
        );

        return $data;

    }



    /**
     * Генериране на мета данни за рецепта: title, description, keywords
     * - title - (70 символа/12 думи)
     * - description - (до 160 символа)
     * - keywords - (до 160 символа) 4-10 думи
     * @param $reception
     * @return array $data
     */
    public function generateRecipeMetadata($reception)
    {
//        $this->dump($reception);

        $receptionName = mb_strtolower($reception->name);

        $title = $reception->name.' - вкусна готварска рецепта | Мамините рецепти';
        $metaDescr = 'Вкусна готварска рецепта за '.$receptionName.
                    '. Как да приготвим '.$receptionName.
                    '. Сготви бързо и вкусно '.$receptionName ;
        $metaKeywords = 'вкусни рецепти за готвене, готварство, готварска рецепта '.$receptionName.', как да сготвим '.$receptionName
                        .', кулинарна рецепта за '.$receptionName.', готварска рецепта със снимки, здравословна и диетична рецепта, какво да сготвя, лесна рецепта за '.$receptionName ;

        $data = array(
            'title'        => $title,
            'metaDescr'    => $metaDescr,
            'metaKeywords' => $metaKeywords,
        );

        return $data;

    }

    /**
     * Генериране на мета данни за категория: title, description, keywords
     * - title - (70 символа/12 думи)
     * - description - (до 160 символа)
     * - keywords - (до 160 символа) 4-10 думи
     * @param $category
     * @return array $data
     */
    public function generateCategoryMetadata($category)
    {
        $categoryName = mb_strtolower($category);

        $title = mb_convert_case($category, MB_CASE_TITLE, 'utf-8').' - вкусни готварски рецепти | Мамините рецепти';
        $metaDescr = 'Вкусни готварски рецепти за '.$categoryName.
            '. Как да приготвим '.$categoryName.
            '. Сготви бързо и вкусно '.$categoryName ;
        $metaKeywords = 'вкусни рецепти за готвене, готварство, готварски рецепти за '.$categoryName.', как да сготвим '.$categoryName
            .', кулинарни рецепти за '.$categoryName.', готварски рецепти със снимки, здравословни и диетична рецепти, какво да сготвя, лесни рецепти за '.$categoryName;

        $data = array(
            'title'        => $title,
            'metaDescr'    => $metaDescr,
            'metaKeywords' => $metaKeywords,
        );

        return $data;

    }
}
