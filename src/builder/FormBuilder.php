<?php
namespace RDuuke\Form\Builder;

/**
 * Class Form
 * @package Core\Html
 */
class FormBuilder
{
    /**
     * @var array
     */
    private static $data;

    /**
     * @param $action
     * @param string $method
     * @param array $attribute
     */
    public function open($action, $method = 'get', $attribute = [], $modelo= [] )
    {
        if ( ! is_null($attribute))
        {
            $attribute = self::getAttributes($attribute);
        }
        self::$data = $modelo;
        return self::render('<form action="'.$action.'" method="'.$method.'" '.$attribute.' />');
    }

    /**
     *
     */
    public function close()
    {
        return self::render('</form');
    }

    /**
     * @param $name
     * @param null $attribute
     */
    public function input($name, $attribute = null)
    {
        if ( ! is_null($attribute))
        {
            $attribute = self::getAttributes($attribute);
        }
        return self::render('<input name="'.$name.'" '.$attribute.' value="'.self::getValue($name).'"/>');
    }
    
    /**
     * @param $name
     * @param null $attribute
     */
    public function textarea($name, $attribute = null)
    {
        if ( ! is_null($attribute))
        {
            $attribute = self::getAttributes($attribute);
        }
        return self::render('<textarea name="'.$name.'" '.$attribute.' >'.htmlentities(self::getValue($name)).' </textarea>');
    }

    /**
     * @param $name
     * @param $options
     * @param array $attribute
     */
    public function select($name, $options, $attribute = [])
    {
        $option = '';
        foreach ($options as $k => $v) {
            if(self::getValue($name) == $k ) {
                $option .= '<option value="'.$k.'" selected>'.$v.'</option>';
            }else {
                $option .= '<option value="'.$k.'">'.$v.'</option>';
            }
        }
        if ( ! is_null($attribute))
        {
            $attribute = self::getAttributes($attribute);
        }
        return self::render('<select name="'.$name.'" '.$attribute.'>'.$option.'</select>');
    }

    public function checkbox($name, $value, $label, $attribute = null)
    {
        if ( ! is_null($attribute))
        {
            $attribute = self::getAttributes($attribute);
        }
        if (self::getValue($name) == $value) {
            return self::render('<input  type="checkbox" name="'.$name.'" '.$attribute.' value='.$value.' checked><label>'.htmlentities($label).'</label>');
        }
        return self::render('<input  type="checkbox" name="'.$name.'" '.$attribute.' value='.$value.'><label>'.htmlentities($label).'</label>');
    }

    public function radio($name, $value, $label, $attribute = null)
    {
        if ( ! is_null($attribute))
        {
            $attribute = self::getAttributes($attribute);
        }
        if (self::getValue($name) == $value) {
            return self::render('<input  type="radio" name="'.$name.'" '.$attribute.' value='.$value.' checked><label>'.htmlentities($label).'</label>');
        }
        return self::render('<input  type="radio" name="'.$name.'" '.$attribute.' value='.$value.'><label>'.htmlentities($label).'</label>');

    }
    /**
     * @param $message
     * @param array $attribute
     */
    public function submit($message, $attribute = [])
    {
        if ( ! is_null($attribute))
        {
            $attribute = self::getAttributes($attribute);
        }
        return self::render('<button type="submit" '.$attribute.' >'.htmlentities($message).'</button>');
    }

    /**
     * @param $index
     * @return mixed|null
     */
    private function getValue($index)
    {
        return isset(self::$data[$index])  ? self::$data[$index] : null;
    }

    /**
     * @param array $attributes
     * @return string
     */
    private function getAttributes($attributes = [])
    {
        $attr = '';
        foreach ($attributes as $k => $v)
        {
            $attr .= "$k = '$v'";
        }
        return $attr;
    }

    /**
     * @param $html
     */
    private function render($html)
    {
        echo "$html";
    }
}