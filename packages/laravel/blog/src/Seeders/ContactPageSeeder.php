<?php

namespace Laravel\Blog\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Blog\Models\Page;
use Laravel\Blog\Models\PageMeta;
use Exception;

class ContactPageSeeder extends Seeder
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
            $page->name = 'Contact Us';
            $page->title = 'Contact Us';
            $page->slug = 'contact-us';
            $page->meta_keywords = 'Thumbnail, Youtube, Downloader, contact-us';
            $page->meta_description = 'Download YouTube Bulk Thumbnails in one click Contact Us';
            $page->save();


            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'page_main_title';
            $page_meta->value = 'Contact Us';
            $page_meta->save();

            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'page_main_desc';
            $page_meta->value = 'Feel free to contact with us';
            $page_meta->save();


            $page_meta = new PageMeta();
            $page_meta->page_id = $page->id;
            $page_meta->key = 'page_article';
            $page_meta->value = '
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
            numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
            optio, eaque rerum! Provident.
            <p>
            ';
            $page_meta->save();

        } catch (Exception $e) {

            return $e->getMessage();
        }
    }
}
