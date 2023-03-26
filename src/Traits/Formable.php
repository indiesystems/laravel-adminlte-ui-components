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

    public function getFormField($name)
    {
        foreach ($this->getFormFields() as $key => $field) {
            if ($name === $field['name']) {
                return $field;
            }
        }
        return false;
    }

    public function isField($name, $type)
    {
        $field = $this->getFormField($name);
        if ($field) {
            return $field['type'] === $type;
        }
        return false;
    }

    public function getEnumField($name)
    {
        $field =  $this->getFormField($name);
        if($field && isset($field['enum'])){
            return $field['enum'];
        }
        return false;
    }

    public function getSelectedFieldLabel($name, $value)
    {
        $enums = $this->getEnumField($name);
        if($enums){
            foreach ($enums as $key => $enum) {
                if(isset($enum['value'], $enum['label']) && $enum['value'] === $value){
                    return $enum['label'];
                }
            }
        }
        return $value;
    }
}
