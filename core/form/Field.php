<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';


    public string $type;
    public Model $model;
    public string $attribute;

    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = self::TYPE_TEXT;
    }
    public function __toString()
    {
        return sprintf('<div class="form-group">
        <label for="%s">%s</label>
        <input type="%s" id="%s" name="%s" value="%s" class="form-control %s">
        <div class="invalid-feedback">%s</div>
    </div>',
            $this->model->labels()[$this->attribute] ?? $this->attribute,
            $this->model->labels()[$this->attribute] ?? $this->attribute,
            $this->type, // Ovdje je ispravljen redoslijed
            $this->attribute,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }

    public function passwordField(){
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }



}