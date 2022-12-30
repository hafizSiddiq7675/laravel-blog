<?php

namespace Laravel\Blog\Controllers;

use Laravel\Blog\Models\Page;
use Laravel\Blog\Models\PageMeta;
use Illuminate\Http\Request;
use App\Libraries\Helper;
// use Laravel\Blog\Libraries\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class PageController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {

        if($slug == null){

            $page = Page::where('slug', '/')->first();
            $page_meta = Helper::pageMeta($page);

            return view('blog::admin.pages.home', compact(
              'page',
              'page_meta'

            ));
        }else{

            $page = Page::where('slug', $slug)->first();
            $page_meta = Helper::pageMetaOther($page);

            return view('blog::admin.pages.page', compact(
                'page',
                'page_meta'
            ));
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,' .$request->page_id . ',id',
            'meta_keywords' => 'required',
            'meta_description' => 'required',

            'page_main_title' => 'required',
            'page_main_desc' => 'required',
            'above_full_hd_image_content' => 'required',
            'above_standard_image_content' => 'required',
            'above_high_image_content' => 'required',
            'above_medium_image_content' => 'required',
            'above_default_image_content' => 'required',
            // 'page_article' => 'required',

        ]);

        $page = page::where('id', $request->page_id)->first();
        $page->name = $request->name;
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;

        $page->save();

        $page_main_title = PageMeta::where('page_id', $page->id)->where('key', 'page_main_title')->first();
        $page_main_title->value = $request->page_main_title;
        $page_main_title->save();

        $page_main_desc = PageMeta::where('page_id', $page->id)->where('key', 'page_main_desc')->first();
        $page_main_desc->value = $request->page_main_desc;
        $page_main_desc->save();

        $above_full_hd_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_full_hd_image_content')->first();
        $above_full_hd_image_content->value = $request->above_full_hd_image_content;
        $above_full_hd_image_content->save();

        $above_standard_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_standard_image_content')->first();
        $above_standard_image_content->value = $request->above_standard_image_content;
        $above_standard_image_content->save();

        $above_high_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_high_image_content')->first();
        $above_high_image_content->value = $request->above_high_image_content;
        $above_high_image_content->save();

        $above_medium_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_medium_image_content')->first();
        $above_medium_image_content->value = $request->above_medium_image_content;
        $above_medium_image_content->save();

        $above_default_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_default_image_content')->first();
        $above_default_image_content->value = $request->above_default_image_content;
        $above_default_image_content->save();

        $page_article = PageMeta::where('page_id', $page->id)->where('key', 'page_article')->first();
        $page_article->value = $request->page_article;
        $page_article->save();

        return redirect()->route('page.index', $request->slug)->with('success', $page->name.' Page Updated Successfully');

    }





    public function pageUpdate(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,' .$request->page_id . ',id',
            'meta_keywords' => 'required',
            'meta_description' => 'required',

            'page_main_title' => 'required',
            'page_main_desc' => 'required',
            // 'page_article' => 'required',

        ]);

        $page = page::where('id', $request->page_id)->first();
        $page->name = $request->name;
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;

        $page->save();

        $page_main_title = PageMeta::where('page_id', $page->id)->where('key', 'page_main_title')->first();
        $page_main_title->value = $request->page_main_title;
        $page_main_title->save();

        $page_main_desc = PageMeta::where('page_id', $page->id)->where('key', 'page_main_desc')->first();
        $page_main_desc->value = $request->page_main_desc;
        $page_main_desc->save();





        $page_article = PageMeta::where('page_id', $page->id)->where('key', 'page_article')->first();
        $page_article->value = $request->page_article;
        $page_article->save();

        return redirect()->route('page.index', $request->slug)->with('success', $page->name.' Page Updated Successfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function image_upload(Request $request){

        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
        $image = $request->upload;
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('article_image/'), $imageName);
        $path = public_path('article_image/').$imageName;
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('article_image/'.$imageName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }














}
