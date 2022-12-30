<?php

namespace App\Libraries;

use Laravel\Blog\Models\PageMeta ;

class Helper
{
    public static function check($url)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        if($result !== FALSE)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    public static function pageMeta($page)
    {
        $page_main_title = PageMeta::where('page_id', $page->id)->where('key', 'page_main_title')->first();
        $page_main_desc = PageMeta::where('page_id', $page->id)->where('key', 'page_main_desc')->first();
        $above_full_hd_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_full_hd_image_content')->first();
        $above_standard_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_standard_image_content')->first();
        $above_high_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_high_image_content')->first();
        $above_medium_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_medium_image_content')->first();
        $above_default_image_content = PageMeta::where('page_id', $page->id)->where('key', 'above_default_image_content')->first();
        $page_article = PageMeta::where('page_id', $page->id)->where('key', 'page_article')->first();


        return [
            'page_main_title' => $page_main_title,
            'page_main_desc' => $page_main_desc,
            'above_full_hd_image_content' => $above_full_hd_image_content,
            'above_standard_image_content' => $above_standard_image_content,
            'above_high_image_content' => $above_high_image_content,
            'above_medium_image_content' => $above_medium_image_content,
            'above_default_image_content' => $above_default_image_content,
            'page_article' => $page_article
        ];
    }


    public static function pageMetaOther($page)
    {
        $page_main_title = PageMeta::where('page_id', $page->id)->where('key', 'page_main_title')->first();
        $page_main_desc = PageMeta::where('page_id', $page->id)->where('key', 'page_main_desc')->first();
        $page_article = PageMeta::where('page_id', $page->id)->where('key', 'page_article')->first();


        return [
            'page_main_title' => $page_main_title,
            'page_main_desc' => $page_main_desc,
            'page_article' => $page_article
        ];
    }
}
