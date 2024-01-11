<?php

if(! function_exists('html_attributes')){
	function html_attributes(array $attributes, array $extra = []){
		$out = '';
		foreach ($attributes as $attribute => $value) {
			switch (gettype($value)) {
				case 'array':
					$out .= sprintf(' %s="%s" ', $attribute, trim(implode(' ', $value)));
					break;
				default:
					$out .= sprintf(' %s ', trim($value));
					break;
			}
		}
		return trim($out);
	}
}