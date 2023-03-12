<?php
namespace IndieSystems\AdminLteUiComponents\Traits;

trait Formable
{
    public function getFormFields()
    {
        foreach ($this->fillable as $key => $name) {
            $this->fillableFormFields[$key]['name'] = $name;
        }

        return $this->fillableFormFields;
    }
}