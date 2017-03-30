<?php

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/30/2017
 * Time: 10:16 AM
 */
class Form
{
    public function select($name = '', $options = array(), $selected = '', $attributes = array())
    {
        $attributes['name'] = $name;
        $html = '<select ' . $this->attributes($attributes) . '>';

        foreach ($options as $key => $value) {
            $html .= '<option value="' . $key . '" ' . ($key == $selected ? 'selected' : '') . '>' . $value . '</option>';
        }
        $html .= '</select>';

        return $html;
    }

    protected function attributes($attributes)
    {
        return implode(' ', array_map(function ($key) use ($attributes) {
            if (is_bool($attributes[$key])) {
                return $attributes[$key] ? $key : '';
            }
            return $key . '="' . $attributes[$key] . '"';
        }, array_keys($attributes)));
    }


}