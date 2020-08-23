<?php

namespace app\models\dto;

use JsonRpc2\Dto;

class DataDTO extends Dto {

    /** @var integer $page Zero-based */
    public $id;

    /** @var string $page_uid */
    public $page_uid;

    /** @var string $field_string */
    public $field_string;

    /** @var integer $field_integer */
    public $field_integer;

    /** @var boolean $field_boolean */
    public $field_boolean;

    /** @var string $created */
    public $created;
}