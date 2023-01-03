<?php

namespace Exilium\Core\Widget;

use XF\Widget\AbstractWidget;

class CheatStatusWidget extends AbstractWidget {

    protected $defaultOptions = [
        'title' => 'Cheat Status',
        'limit' => 5
    ];

    public function render() {
        $visitor = \XF::visitor();
        $visitorId = $visitor->user_id;

        $viewParams = [
            'visitorId' => $visitorId
        ];

        return $this->renderer('widget_def_options_exilium_cheat_status', $viewParams);
    }
}