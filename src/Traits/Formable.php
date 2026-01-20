<?php
namespace IndieSystems\AdminLteUiComponents\Traits;

use Illuminate\Database\Eloquent\Collection;

trait Formable
{
    public $htmlClasses = [];

    public function getFormFields()
    {
        foreach ($this->formable ?? $this->fillable as $key => $name) {
            $this->fillableFormFields[$key]['name'] = $name;

            // in case this is an enum field with callback function, fill with values
            if (isset($this->fillableFormFields[$key]['enum']) &&
                is_string($this->fillableFormFields[$key]['enum']) &&
                method_exists($this, $this->fillableFormFields[$key]['enum'])
            ) {
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
        $field = $this->getFormField($name);
        if ($field && isset($field['enum'])) {
            if (is_string($field['enum']) && method_exists($this, $field['enum'])) {
                return \call_user_func([$this, $field['enum']]);
            }
            return $field['enum'];
        }
        return false;
    }

    public function getSelectedFieldLabel($name, $value)
    {
        $enums      = $this->getEnumField($name);
        $out        = '';
        $isMultiple = false;
        if ($enums) {
            foreach ($enums as $key => $enum) {
                if (isset($enum['value'], $enum['label'])) {
                    if ($enum['value'] === $value) {

                        return $enum['label'];

                    } elseif (is_array($value) || $value instanceof Collection) {
                        $isMultiple = true;
                        if ($value instanceof Collection) {
                            $value = array_column($value->toArray(), 'id');
                        }
                        foreach ($value as $vkey => $value_value) {
                            if ($enum['value'] == $value_value) {
                                $out .= $enum['label'] . ', ';
                            }
                        }
                    }
                }
            }
            if ($isMultiple) {
                return rtrim($out, ', ');
            }
        }
        return $value;
    }

    public function getHtmlClasses()
    {
        if (property_exists($this, 'htmlClasses') && ! empty($this->htmlClasses)) {
            return trim(implode(' ', $this->htmlClasses));
        }
        return null;
    }

    /**
     * Get the display value for a field.
     *
     * Supports:
     * - 'display_values' array in field config with true/false keys
     * - Callable string (method name) for dynamic display values
     * - Fallback to getXxxDisplayValue() method convention
     *
     * Returns array with 'value' and 'raw' (whether to render as HTML)
     *
     * @param string $name Field name
     * @return array{value: mixed, raw: bool}
     */
    public function getDisplayValue($name)
    {
        $field = $this->getFormField($name);
        $value = $this->{$name};
        $isRaw = false;

        // Check for display_raw flag in field config
        if ($field && isset($field['display_raw'])) {
            $isRaw = (bool) $field['display_raw'];
        }

        // Check for explicit display_values config
        if ($field && isset($field['display_values'])) {
            $displayValues = $field['display_values'];

            // Handle callable (method name string)
            if (is_string($displayValues) && method_exists($this, $displayValues)) {
                $displayValues = $this->{$displayValues}();
            }

            if (is_array($displayValues)) {
                $key = (bool) $value;
                if (isset($displayValues[$key])) {
                    return ['value' => $displayValues[$key], 'raw' => $isRaw];
                }
            }
        }

        // Fallback: check for model method getXxxDisplayValue()
        $method = 'get' . \Illuminate\Support\Str::studly($name) . 'DisplayValue';
        if (method_exists($this, $method)) {
            return ['value' => $this->{$method}($value), 'raw' => $isRaw];
        }

        return ['value' => $value, 'raw' => false];
    }

    /**
     * Check if a field has custom display value configuration.
     *
     * @param string $name Field name
     * @return bool
     */
    public function hasDisplayValue($name)
    {
        $field = $this->getFormField($name);

        if ($field && isset($field['display_values'])) {
            return true;
        }

        $method = 'get' . \Illuminate\Support\Str::studly($name) . 'DisplayValue';
        return method_exists($this, $method);
    }
}