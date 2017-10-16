<?php

namespace TCG\Voyager\Widgets;

use Arrilot\Widgets\AbstractWidget;
use TCG\Voyager\Facades\Voyager;

class DiscussionDimmer extends AbstractWidget
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
        // $count = Voyager::model('Forum_Discussion')->count();

        /* Count how many discussions in database */
        $count = \Linus\Forum\Models\Forum_Discussion::all()->count();

        $string = $count == 1 ? 'discussion' : 'discussions';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "{$count} {$string}",
            'text'   => "You have {$count} {$string} in your database. Click on button below to view all discussions.",
            'button' => [
                'text' => 'View all discussions',
                'link' => route('voyager.discussions.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.png'),
        ]));
    }
}
