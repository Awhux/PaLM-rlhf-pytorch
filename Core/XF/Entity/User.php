<?php

namespace Exilium\Core\Entity;

use XF\Mvc\Entity\Structure;

class User extends XFCP_User {

    // get the hwid entity
    // public static function getStructure(Structure $structure) {
    //     $structure = parent::getStructure($structure);

    //     $structure->columns = [
    //         'ex_hwid_id' => ['type' => self::UINT, 'nullable' => true, 'default' => null]
    //     ];

    //     return $structure;
    // }

    // can view client panel permission
    public function canViewClientPanel() {
        return true;
    }
}