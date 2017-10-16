<?php

use Illuminate\Database\Seeder;

use \Linus\Forum\Models\Uni_Category as UniCategories;


class UniCategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $post = $this->findUniversity('unimelb');
        if (!$post->exists) {
            $post->fill([
                'name'  => 'The university of Melbourne',
                'slug'  => 'unimelb'
            ])->save();
        }

        $post = $this->findUniversity('monash');
        if (!$post->exists) {
            $post->fill([
                'name'            => 'Monash University',
                'slug'            => 'monash'
            ])->save();
        }

        
    }

    /**
     * [post description].
     *
     * @param [type] $slug [description]
     *
     * @return [type] [description]
     */
    protected function findUniversity($slug)
    {
        return UniCategories::firstOrNew(['slug' => $slug]);
    }
}
