<?php

namespace Laravel\Blog\Seeders;

use Laravel\Blog\Models\Page;
use Laravel\Blog\Models\PageMeta;
use Illuminate\Database\Seeder;
use Exception;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            $page = new Page();
            $page->name = 'Home';
            $page->title = 'Thumbnail';
            $page->slug = '/';
            $page->meta_keywords = 'Thumbnail, Youtube, Downloader';
            $page->meta_description = 'Download YouTube Bulk Thumbnails in one click';
            $page->save();


            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'page_main_title';
            $page_meta->value = 'YouTube Bulk Thumbnail Downloader';
            $page_meta->save();

            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'page_main_desc';
            $page_meta->value = 'Download YouTube Bulk Thumbnail';
            $page_meta->save();

            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'above_full_hd_image_content';
            $page_meta->value = 'Full HD (Width = 1280, Height = 720)';
            $page_meta->save();

            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'above_standard_image_content';
            $page_meta->value = 'Standard (Width = 640, Height = 480)';
            $page_meta->save();

            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'above_high_image_content';
            $page_meta->value = 'High (Width = 480, Height = 360)';
            $page_meta->save();

            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'above_medium_image_content';
            $page_meta->value = 'Medium (Width = 320, Height = 180)';
            $page_meta->save();

            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'above_default_image_content';
            $page_meta->value = 'Default (Width = 120, Height = 90)';
            $page_meta->save();

            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'page_article';
            $page_meta->value = '
            <h2>YouTube Thumbnail Downloader</h2>
            <p>YouTube Thumbnail Downloader is a useful tool that helps you download YouTube Thumbnails.<p>
            ';
            $page_meta->save();

        } catch (Exception $e) {

            return $e->getMessage();
        }
    }
}
