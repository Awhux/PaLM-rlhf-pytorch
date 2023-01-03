<?php

namespace Exilium\Core\Pub\Controller;

use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View;
use XF\Pub\Controller\AbstractController;

class ClientPanelController extends AbstractController {

    public function preDispatchController($action, ParameterBag $params) {
        $this->assertRegistrationRequired();
        $this->assertTfaRequirement($action);
        $this->assertNotBanned();
    }

    public function actionIndex() {
        // visitor id
        $visitorId = \XF::visitor()->user_id;

        return $this->view('Exilium\Core:ClientPanelController', 'ex_client_panel');
    }
}