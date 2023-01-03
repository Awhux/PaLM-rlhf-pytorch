<?php

namespace Exilium\Core\Entity;

use XF\Mvc\Entity\Entity;
use \XF\Mvc\Entity\Structure;

class HwidEntity extends Entity {

    // get the hwid entity
    public static function getStructure(Structure $structure) {
        $structure = parent::getStructure($structure);

        $structure->table = 'xf_ex_hwid';
        $structure->shortName = 'Exilium\Core:HWID';
        $structure->primaryKey = 'hwid_id';
        $structure->columns = [
            'hwid_id' => ['type' => self::UINT, 'autoIncrement' => true, 'nullable' => true],
            'hwid' => ['type' => self::STR, 'maxLength' => 32, 'default' => ''],
            'ip' => ['type' => self::STR, 'maxLength' => 15, 'default' => '']
        ];

        return $structure;
    }
}