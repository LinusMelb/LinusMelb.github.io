<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use TCG\Voyager\Facades\Voyager;

class CategoryDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \Linus\Forum\Models\Forum_Category::all()->count();

        $string = $count == 1 ? 'category' : 'categories';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} {$string} in your database. Click on button below to view all categories.",
            'button' => [
                'text' => 'View all categories',
                'link' => route('voyager.categories.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.png'),
        ]));
    }
}
