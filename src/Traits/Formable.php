<?php
namespace IndieSystems\AdminLteUiComponents\Traits;

trait Formable
{
    public function getFormFields()
    {
        foreach ($this->fillable as $key => $name) {
            $this->fillableFormFields[$key]['name'] = $name;
            
            // in case this is an enum field with callback function, fill with values
            if(isset($this->fillableFormFields[$key]['enum']) &&
                is_string($this->fillableFormFields[$key]['enum']) &&
                method_exists($this, $this->fillableFormFields[$key]['enum'])
            ){
                $this->fillableFormFields[$key]['enum'] = \call_user_func([$this, $this->fillableFormFields[$key]['enum']]);
            }
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
            if (is_string($field['enum']) && method_exists($this, $field['enum'])) {
                return \call_user_func([$this, $field['enum']]);
            }
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
