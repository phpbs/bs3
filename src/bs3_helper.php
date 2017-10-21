<?php
/**
 *  ____  _   _ ____  ____ ____
 * |  _ \| | | |  _ \| __ ) ___|
 * | |_) | |_| | |_) |  _ \___ \
 * |  __/|  _  |  __/| |_) |__) |
 * |_|   |_| |_|_|   |____/____/
 *
 * PHPBS - PHP Bootstrap 3 Helper
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2017, Natan Felles
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author    Natan Felles, https://natanfelles.github.io, <natanfelles@gmail.com>
 * @copyright Copyright (c) 2017, Natan Felles
 * @license   https://opensource.org/licenses/MIT   MIT License
 * @link      https://github.com/phpbs/bs3
 * @version   0.0.1
 */



if (! function_exists('merge_classes')) {
    /**
     * Merge element classes with custom user class attribute
     *
     * @param string $class
     * @param array  $attributes
     *
     * @return string
     */
    function merge_classes($class = '', $attributes = [])
    {
        return isset($attributes['class']) ? trim($class) . ' ' . $attributes['class'] : trim($class);
    }
}


/**
 * Get well formated HTML attributes
 *
 * @param array $attributes
 *
 * @return string
 */
function get_attributes($attributes = [])
{
    $i = 0;
    foreach ($attributes as $attribute => $value) {
        if (is_numeric($attribute)) {
            $attributes[$value] = $value;
            unset($attributes[$i]);
        }
        $i++;
    }

    ksort($attributes);

    $html = '';
    foreach ($attributes as $attribute => $value) {
        $html .= ' ' . $attribute . '="' . $value . '"';
    }

    return $html;
}



/**
 * HTML Element
 *
 * @param string  $element
 * @param string  $content
 * @param array   $attributes
 * @param boolean $close      Tags has a </tagname> ?
 *
 * @return string
 */
function el($element, $content = '', $attributes = [], $close = true)
{
    return '<' . $element . get_attributes($attributes)
                . ($close === false
                    ? '>' . $content
                    : '>' . $content . '</' . $element . '>')
                . PHP_EOL;
}



if (! function_exists('a')) {
    function a($content = '', $href = '#', $target_blank = false, $attributes = [])
    {
        if ($href) {
            $attributes['href'] = $href;
        }

        if ($target_blank) {
            $attributes['target'] = '_blank';
        }

        return el('a', $content, $attributes);
    }
}



if (! function_exists('btn')) {
    /**
     * Button tag
     *
     * @param string $content
     * @param array  $btn_classes A list of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn($content = 'Submit', $btn_classes = [], $attributes = [])
    {
        $class = 'btn';

        foreach ($btn_classes as $c) {
            $class .= ' btn-' . $c;

            if (in_array($c, ['default', 'primary', 'success', 'info', 'warning', 'danger', 'link'])) {
                $styled = true;
            }
        }

        if (! isset($styled)) {
            $class .= ' btn-default';
        }

        $attributes['class'] = merge_classes($class, $attributes);

        if (isset($attributes['href'])) {
            return el('a', $content, $attributes);
        }

        if (! isset($attributes['type'])) {
            $attributes['type'] = 'button';
        }

        return el('button', $content, $attributes);
    }
}



if (! function_exists('btn_submit')) {
    /**
     * Button type submit
     *
     * @param string $content
     * @param array  $btn_classes A list of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn_submit($content = 'Submit', $btn_classes = ['primary'], $attributes = [])
    {
        $attributes['type'] = 'submit';

        return btn($content, $btn_classes, $attributes);
    }
}



if (! function_exists('btn_default')) {
    /**
     * Button default
     *
     * @param string $content
     * @param array  $btn_classes A list of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn_default($content = 'Submit', $btn_classes = [], $attributes = [])
    {
        array_push($btn_classes, 'default');

        return btn($content, $btn_classes, $attributes);
    }
}



if (! function_exists('btn_primary')) {
    /**
     * Button primary
     *
     * @param string $content
     * @param array  $btn_classes A list of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn_primary($content = 'Submit', $btn_classes = [], $attributes = [])
    {
        array_push($btn_classes, 'primary');

        return btn($content, $btn_classes, $attributes);
    }
}



if (! function_exists('btn_success')) {
    /**
     * Button success
     *
     * @param string $content
     * @param array  $btn_classes A list of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn_success($content = 'Submit', $btn_classes = [], $attributes = [])
    {
        array_push($btn_classes, 'success');

        return btn($content, $btn_classes, $attributes);
    }
}



if (! function_exists('btn_info')) {
    /**
     * Button info
     *
     * @param string $content
     * @param array  $btn_classes A list of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn_info($content = 'Submit', $btn_classes = [], $attributes = [])
    {
        array_push($btn_classes, 'info');

        return btn($content, $btn_classes, $attributes);
    }
}



if (! function_exists('btn_warning')) {
    /**
     * Button warning
     *
     * @param string $content
     * @param array  $btn_classes A list of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn_warning($content = 'Submit', $btn_classes = [], $attributes = [])
    {
        array_push($btn_classes, 'warning');

        return btn($content, $btn_classes, $attributes);
    }
}



if (! function_exists('btn_danger')) {
    /**
     * Button danger
     *
     * @param string $content
     * @param array  $btn_classes A list of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn_danger($content = 'Submit', $btn_classes = [], $attributes = [])
    {
        array_push($btn_classes, 'danger');

        return btn($content, $btn_classes, $attributes);
    }
}



if (! function_exists('btn_link')) {
    /**
     * Button link
     *
     * @param string $content
     * @param array  $btn_classes A list of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn_link($content = 'Submit', $btn_classes = [], $attributes = [])
    {
        array_push($btn_classes, 'link');

        return btn($content, $btn_classes, $attributes);
    }
}



if (! function_exists('btn_group')) {
    /**
     * Buttons group
     *
     * @param array $btns            An array of buttons
     * @param array $btnGroupClasses Default options are 'lg', 'sm' or 'xs'
     * @param array $attributes
     *
     * @return string
     */
    function btn_group($btns = [], $btnGroupClasses = [], $attributes = [])
    {
        $content = '';
        foreach ($btns as $btn) {
            $content .= $btn;
        }

        $class = '';
        foreach ($btnGroupClasses as $c) {
            $class .= ' btn-group-' . $c;
        }

        if (! in_array('vertical', $btnGroupClasses)) {
            $class = 'btn-group' . $class;
        }

        $attributes['class'] = merge_classes($class, $attributes);

        return el('div', $content, $attributes);
    }
}



if (! function_exists('btn_toolbar')) {
    /**
     * Buttons toolbar
     *
     * @param array $btn_groups An array of buttons groups
     * @param array $attributes
     *
     * @return string
     */
    function btn_toolbar($btn_groups = [], $attributes = [])
    {
        $content = '';
        foreach ($btn_groups as $btn_group) {
            $content .= $btn_group;
        }

        $attributes['class'] = merge_classes('btn-toolbar', $attributes);

        return el('div', $content, $attributes);
    }
}



if (! function_exists('img')) {
    function img($src = '', $alt = '', $img_classes = [], $attributes = [])
    {
        $class = '';
        foreach ($img_classes as $c) {
            $class .= ' img-' . $c;
        }
        $attributes['src']   = $src;
        $attributes['alt']   = $alt;
        $attributes['class'] = merge_classes($class, $attributes);

        return el('img', '', $attributes, false);
    }
}



if (! function_exists('img_rounded')) {
    /**
     * Image rounded
     *
     * @param string $src
     * @param string $alt
     * @param array  $img_classes An array of 'img-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function img_rounded($src = '', $alt = '', $img_classes = [], $attributes = [])
    {
        array_push($img_classes, 'rounded');

        return img($src, $alt, $img_classes, $attributes);
    }
}



if (! function_exists('img_circle')) {
    /**
     * Image circle
     *
     * @param string $src
     * @param string $alt
     * @param array  $img_classes An array of 'img-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function img_circle($src = '', $alt = '', $img_classes = [], $attributes = [])
    {
        array_push($img_classes, 'circle');

        return img($src, $alt, $img_classes, $attributes);
    }
}



if (! function_exists('img_thumbnail')) {
    /**
     * Image thumbnail
     *
     * @param string $src
     * @param string $alt
     * @param array  $img_classes An array of 'img-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function img_thumbnail($src = '', $alt = '', $img_classes = [], $attributes = [])
    {
        array_push($img_classes, 'thumbnail');

        return img($src, $alt, $img_classes, $attributes);
    }
}



if (! function_exists('form')) {
    /**
     * Form
     *
     * @param string $action
     * @param string $method     post or get
     * @param array  $attributes
     *
     * @return string
     */
    function form($action = '', $method = 'post', $attributes = [])
    {
        if ($action) {
            $attributes['action'] = $action;
        }

        if ($method) {
            $attributes['method'] = $method;
        }

        return el('form', '', $attributes, false);
    }
}



if (! function_exists('form_inline')) {
    /**
     * Open a inline form
     *
     * @param string $action     URL
     * @param string $method
     * @param array  $attributes
     *
     * @return string
     */
    function form_inline($action = '', $method = 'post', $attributes = [])
    {
        $attributes['class'] = merge_classes('form-inline', $attributes);

        return form($action, $method, $attributes);
    }
}



if (! function_exists('form_horizontal')) {
    /**
     * Open a horizontal form
     *
     * @param string $action     URL
     * @param string $method
     * @param array  $attributes
     *
     * @return string
     */
    function form_horizontal($action = '', $method = 'post', $attributes = [], $hidden = [])
    {
        $attributes['class'] = merge_classes('form-horizontal', $attributes);

        return form($action, $method, $attributes);
    }
}



if (! function_exists('h')) {
    /**
     * Heading
     *
     * @param string  $content
     * @param integer $level       1, 2, 3, 4, 5, 6
     * @param boolean $page_header True to add the page-header class
     * @param array   $attributes
     *
     * @return string
     */
    function h($content = '', $level = 1, $page_header = false, $create_id = false, $attributes = [])
    {
        if ($create_id) {
            $attributes['id'] = strtr(strtolower($content), [
                'š' => 's',
                'ž' => 'z',
                'ß' => 'ss',
                'à' => 'a',
                'á' => 'a',
                'â' => 'a',
                'ã' => 'a',
                'ä' => 'a',
                'å' => 'a',
                'æ' => 'a',
                'ç' => 'c',
                'è' => 'e',
                'é' => 'e',
                'ê' => 'e',
                'ë' => 'e',
                'ì' => 'i',
                'í' => 'i',
                'î' => 'i',
                'ï' => 'i',
                'ð' => 'o',
                'ñ' => 'n',
                'ò' => 'o',
                'ó' => 'o',
                'ô' => 'o',
                'õ' => 'o',
                'ö' => 'o',
                'ø' => 'o',
                'ù' => 'u',
                'ú' => 'u',
                'û' => 'u',
                'ý' => 'y',
                'ý' => 'y',
                'þ' => 'b',
                'ÿ' => 'y',
                ' ' => '-',
                '.' => '',
                ',' => '',
                ';' => '',
                ':' => '',
                '/' => '',
            ]);
        }

        if ($page_header) {
            return '<div class="page-header">' . el('h' . (! empty($level) ? $level : 1), $content, $attributes) . '</div>';
        }

        return el('h' . (! empty($level) ? $level : 1), $content, $attributes);
    }
}



if (! function_exists('form_group')) {
    /**
     * Form group
     *
     * @param array $items      Array with label, input, help block, icon, etc
     * @param array $attributes
     *
     * @return string
     */
    function form_group($items = [], $attributes = [])
    {
        $attributes['class'] = merge_classes('form-group', $attributes);
        $content             = '';
        foreach ($items as $item) {
            $content .= $item;
        }

        return el('div', $content, $attributes);
    }
}



if (! function_exists('input_group')) {
    /**
     * Input group
     *
     * @param array  $items      Array with input(), input_group_addon() or input_group_btn()
     * @param string $size       Default options are 'lg' and 'sm'
     * @param array  $attributes
     *
     * @return string
     */
    function input_group($items = [], $size = '', $attributes = [])
    {
        $attributes['class'] = merge_classes(
            'input-group' . (! empty($size) ? ' input-group-' . $size : ''),
            $attributes
        );
        $content             = '';
        foreach ($items as $item) {
            $content .= $item;
        }

        return el('div', $content, $attributes);
    }
}



if (! function_exists('input_group_addon')) {
    /**
     * Input group addon
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function input_group_addon($content = '', $attributes = [])
    {
        $attributes['class'] = merge_classes('input-group-addon', $attributes);

        return el('span', $content, $attributes);
    }
}



if (! function_exists('input_group_btn')) {
    /**
     * Input group buttons
     *
     * @param array $items      Array of buttons
     * @param array $attributes
     *
     * @return string
     */
    function input_group_btn($items = [], $attributes = [])
    {
        $attributes['class'] = merge_classes('input-group-btn', $attributes);
        $content             = '';
        foreach ($items as $item) {
            $content .= $item;
        }

        return el('div', $content, $attributes);
    }
}



if (! function_exists('label')) {
    /**
     * Form label
     *
     * @param string $content
     * @param string $for        Attribute for="id"
     * @param array  $attributes
     *
     * @return string
     */
    function label($content = '', $for = '', $attributes = [])
    {
        if ($for) {
            $attributes['for'] = $for;
        }

        $attributes['class'] = merge_classes('control-label', $attributes);

        return el('label', $content, $attributes);
    }
}



if (! function_exists('input')) {
    /**
     * Form input
     *
     * @param string $name
     * @param string $value
     * @param string $type
     * @param string $placeholder
     * @param string $size        Default options are 'lg' and 'sm' or empty
     * @param array  $attributes
     *
     * @return string
     */
    function input($name = '', $value = '', $type = '', $placeholder = '', $size = '', $attributes = [])
    {
        if ($name) {
            $attributes['name'] = $name;
            if (! isset($attributes['id'])) {
                $attributes['id'] = $name;
            }
        }

        if ($value) {
            $attributes['value'] = $value;
        }

        if ($type) {
            $attributes['type'] = $type;
        }

        if ($placeholder) {
            $attributes['placeholder'] = $placeholder;
        }

        if ($type !== 'file' && $type !== 'hidden') {
            $class = 'form-control';
        } else {
            $class = '';
        }

        if ($size) {
            $class .= ' input-' . $size;
        }

        $attributes['class'] = merge_classes($class, $attributes);

        return el('input', '', $attributes, false);
    }
}



if (! function_exists('input_text')) {
    /**
     * Form input text
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_text($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'text', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_password')) {
    /**
     * Form input password
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_password($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'password', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_datetime')) {
    /**
     * Form input datetime
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_datetime($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'datetime', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_datetime_local')) {
    /**
     * Form input datetime-local
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_datetime_local($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'datetime-local', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_date')) {
    /**
     * Form input date
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_date($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'date', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_month')) {
    /**
     * Form input month
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_month($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'month', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_time')) {
    /**
     * Form input time
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_time($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'time', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_week')) {
    /**
     * Form input week
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_week($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'week', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_number')) {
    /**
     * Form input number
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_number($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'number', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_email')) {
    /**
     * Form input email
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_email($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'email', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_hidden')) {
    /**
     * Form input hidden
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_hidden($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'hidden', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_url')) {
    /**
     * Form input url
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_url($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'url', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_search')) {
    /**
     * Form input search
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_search($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'search', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_tel')) {
    /**
     * Form input tel
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_tel($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'tel', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_color')) {
    /**
     * Form input color
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_color($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'color', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_submit')) {
    /**
     * Form input submit
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_submit($name = '', $value = '', $placeholder = '', $size = '', $attributes = [])
    {
        return input($name, $value, 'submit', $placeholder, $size, $attributes);
    }
}



if (! function_exists('input_file')) {
    /**
     * Form input file
     *
     * @param string $name
     * @param string $value
     * @param string $placeholder
     * @param string $size        Default options are 'lg', 'sm' none
     * @param array  $attributes
     *
     * @return string
     */
    function input_file($name = '', $attributes = [])
    {
        if ($name) {
            $attributes['name'] = $name;
            if (! isset($attributes['id'])) {
                $attributes['id'] = $name;
            }
        }

        $attributes['type'] = 'file';

        return el('input', '', $attributes, false);
    }
}



if (! function_exists('textarea')) {
    /**
     * Form textarea
     *
     * @param string  $name
     * @param string  $value
     * @param string  $placeholder
     * @param integer $rows
     * @param array   $attributes
     *
     * @return string
     */
    function textarea($name = '', $value = '', $placeholder = '', $rows = 3, $attributes = [])
    {
        if ($name) {
            $attributes['name'] = $name;
            if (! isset($attributes['id'])) {
                $attributes['id'] = $name;
            }
        }

        if ($placeholder) {
            $attributes['placeholder'] = $placeholder;
        }

        if ($rows) {
            $attributes['rows'] = $rows;
        }

        $attributes['class'] = merge_classes('form-control', $attributes);

        return el('textarea', $value, $attributes);
    }
}



if (! function_exists('checkbox')) {
    /**
     * Form checkbox
     *
     * @param string  $name
     * @param string  $value
     * @param string  $label
     * @param boolean $checked    True to be checked
     * @param boolean $inline     True to be inline
     * @param array   $attributes
     *
     * @return string
     */
    function checkbox($name = '', $value = '', $label = '', $checked = false, $inline = false, $attributes = [])
    {
        if ($inline) {
            $attributes['class'] = merge_classes('checkbox-inline', $attributes);
            $open                = '<label' . get_attributes($attributes) . '>';
            $close               = '</label>';
        } else {
            $attributes['class'] = merge_classes('checkbox', $attributes);
            $open                = '<div' . get_attributes($attributes) . '><label>';
            $close               = '</label></div>';
        }

        $element['type'] = 'checkbox';

        if ($name) {
            $element['name'] = $name;
        }

        if ($value) {
            $element['value'] = $value;
        }

        if ($checked) {
            $element['checked'] = 'checked';
        }

        return $open . el('input', '', $element, false) . ' ' . $label . $close;
    }
}



if (! function_exists('radio')) {
    /**
     * Form radio
     *
     * @param string  $name
     * @param string  $value
     * @param string  $label
     * @param boolean $checked    True to be checked
     * @param boolean $inline     True to be inline
     * @param array   $attributes
     *
     * @return string
     */
    function radio($name = '', $value = '', $label = '', $checked = false, $inline = false, $attributes = [])
    {
        if ($inline) {
            $attributes['class'] = merge_classes('radio-inline', $attributes);
            $open                = '<label' . get_attributes($attributes) . '>';
            $close               = '</label>';
        } else {
            $attributes['class'] = merge_classes('radio', $attributes);
            $open                = '<div' . get_attributes($attributes) . '><label>';
            $close               = '</label></div>';
        }

        $element['type'] = 'radio';

        if ($name) {
            $element['name'] = $name;
        }

        if ($value) {
            $element['value'] = $value;
        }

        if ($checked) {
            $element['checked'] = 'checked';
        }

        return $open . el('input', '', $element, false) . ' ' . $label . $close;
    }
}



if (! function_exists('select')) {
    /**
     * Form select
     *
     * @param string       $name
     * @param array        $options    Array of Value => Content select options or Option Group Name => [Value => Content, ]
     * @param string|array $selected   Selected item value
     * @param array        $attributes
     *
     * @return string
     */
    function select($name = '', $options = [], $selected = null, $attributes = [])
    {
        $attributes['class'] = merge_classes('form-control', $attributes);

        $content = '';
        foreach ($options as $opt_value => $opt_content) {
            $opt_attributes = ['value' => $opt_value];

            if ($opt_value === $selected || (is_array($selected) && in_array($opt_value, $selected))) {
                $opt_attributes['selected'] = 'selected';
            }

            $content .= el('option', $opt_content, $opt_attributes);
        }

        return el('select', $content, $attributes);
    }
}



if (! function_exists('select_multiple')) {
    /**
     * Form input select multiple
     *
     * @param string       $name
     * @param array        $options    Array of Value => Content select options or Option Group Name => [Value => Content, ]
     * @param string|array $selected   Selected item value
     * @param array        $attributes
     *
     * @return string
     */
    function select_multiple($name = '', $options = [], $selected = null, $attributes = [])
    {
        $attributes['multiple'] = 'multiple';

        return select($name, $options, $selected, $attributes);
    }
}



if (! function_exists('help_block')) {
    /**
     * Form help text
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function help_block($content = '', $attributes = [])
    {
        $attributes['class'] = merge_classes('help-block', $attributes);

        return el('span', $content, $attributes);
    }
}



if (! function_exists('dropdown_menu')) {
    /**
     * Dropdown menu. Used in Button dropdowns and navs
     *
     * @param array $list       Array of list entries
     * @param array $attributes
     *
     * @return string
     */
    function dropdown_menu($list = [], $attributes = [])
    {
        $attributes['class'] = merge_classes('dropdown-menu', $attributes);

        return lists($list, 'ul', '', $attributes);
    }
}



if (! function_exists('panel')) {
    /**
     * Panel
     *
     * @param string $content
     * @param string $heading
     * @param string $footer
     * @param string $context    Contextual alternative. Default options are 'primary', 'success', 'info', 'warning', 'danger' or 'default'
     * @param array  $attributes
     *
     * @return string
     */
    function panel($content = '', $heading = '', $footer = '', $context = 'default', $attributes = [])
    {
        if (! empty($heading)) {
            $heading = '<div class="panel-heading">' . $heading . '</div>';
        }

        if (! empty($footer)) {
            $footer = '<div class="panel-footer">' . $footer . '</div>';
        }

        if (empty($context)) {
            $context = ' panel-default';
        } else {
            $context = ' panel-' . $context;
        }

        $attributes['class'] = merge_classes('panel' . $context, $attributes);

        return el('div', $heading . $content . $footer, $attributes);
    }
}



if (! function_exists('panel_body')) {
    /**
     * Panel body
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function panel_body($content = '', $attributes = [])
    {
        $attributes['class'] = merge_classes('panel-body', $attributes);

        return el('div', $content, $attributes);
    }
}

function panel_title($content = '', $attributes = [])
{
    $attributes['class'] = merge_classes('panel-title', $attributes);

    return el('h3', $content, $attributes);
}



if (! function_exists('nav_tabs')) {
    /**
     * Nav Tabs
     *
     * @param array   $items      [[content - string, href - string, active - boolean], ]
     * @param boolean $justified
     * @param array   $attributes
     *
     * @return string
     */
    function nav_tabs($items = [], $justified = false, $attributes = [])
    {
        $content = '';

        foreach ($items as $item) {
            $item     = [
                isset($item[0]) ? $item[0] : '', // content
                isset($item[1]) ? $item[1] : '#', // href
                isset($item[2]) ? $item[2] : false, // active
            ];
            $content .= '<li' . ($item[2] === true ? ' class="active"' : '')
                     . '><a href="' . $item[1] . '"' . (substr($item[1], 0, 1) === '#' ? ' data-toggle="tab"' : '')
                     . (strpos($item[1], 'http') === 0 && strpos($item[1], $_SERVER['HTTP_HOST']) === false ? ' target="_blank"' : '')
                     . '>' . $item[0] . '</a></li>';
        }

        $attributes['class'] = merge_classes(
            'nav nav-tabs' . ($justified === true ? ' nav-justified' : ''),
            $attributes
        );

        return el('ul', $content, $attributes);
    }
}



if (! function_exists('nav_pills')) {
    /**
     * Nav Pills
     *
     * @param array   $items      [[content - string, href - string, active - boolean], ]
     * @param boolean $justified
     * @param boolean $stacked
     * @param array   $attributes
     *
     * @return string
     */
    function nav_pills($items = [], $justified = false, $stacked = false, $attributes = [])
    {
        $content = '';

        foreach ($items as $item) {
            $item     = [
                isset($item[0]) ? $item[0] : '', // content
                isset($item[1]) ? $item[1] : '#', // href
                isset($item[2]) ? $item[2] : false, // active
            ];
            $content .= '<li' . ($item[2] === true ? ' class="active"' : '')
                     . '><a href="' . $item[1] . '"' . (substr($item[1], 0, 1) === '#' ? ' data-toggle="tab"' : '')
                     . (strpos($item[1], 'http') === 0 && strpos($item[1], $_SERVER['HTTP_HOST']) === false ? ' target="_blank"' : '')
                     . '>' . $item[0] . '</a></li>';
        }

        $attributes['class'] = merge_classes(
            'nav nav-pills' . ($justified === true ? ' nav-justified' : '') . ($stacked === true ? ' nav-stacked' : ''),
            $attributes
        );

        return el('ul', $content, $attributes);
    }
}



if (! function_exists('nav_content')) {
    /**
     * Nav Content
     *
     * @param array $items      Array of items.
     *                          Example :
     *                          [
     *                          [
     *                          'Profile', // The text content
     *                          'profile', // The id
     *                          true // True if this is the 'active' item.
     *                          ]
     *                          ]
     * @param array $attributes
     *
     * @return string
     */
    function nav_content($items = [], $attributes = [])
    {
        $content = '';

        foreach ($items as $item) {
            $item     = [
                isset($item[0]) ? $item[0] : '', // content
                isset($item[1]) ? ' id="' . $item[1] . '"' : '', // id
                isset($item[2]) ? $item[2] : false, // active
            ];
            $content .= '<div class="tab-pane' . ($item[2] === true ? ' active' : '') . '"' . $item[1] . '>' . $item[0] . '</div>';
        }

        $attributes['class'] = merge_classes('tab-content', $attributes);

        return el('div', $content, $attributes);
    }
}



if (! function_exists('popover')) {
    /**
     * Popover
     *
     * @param string $btn_content
     * @param string $title
     * @param string $content
     * @param string $placement   Default options are 'top', 'right', 'bottom' or 'left'
     * @param array  $btn_classes Array of 'btn-' classes
     * @param array  $attributes
     *
     * @return string
     */
    function popover(
        $btn_content = '',
        $title = '',
        $content = '',
        $placement = 'top',
        $btn_classes = [],
        $attributes = []
    ) {
        if ($title) {
            $attributes['title'] = $title;
        }

        $attributes['tabindex']       = '0';
        $attributes['data-toggle']    = 'popover';
        $attributes['data-trigger']   = 'focus';
        $attributes['data-content']   = $content;
        $attributes['data-placement'] = isset($placement) ? $placement : 'top';

        return btn($btn_content, $btn_classes, $attributes);
    }
}



if (! function_exists('alert')) {
    /**
     * Alert message
     *
     * @param string  $content
     * @param string  $title
     * @param string  $style       Default options are 'success', 'info', 'warning' or 'danger'
     * @param boolean $dismissible True to show a close button and enable alert dismiss
     * @param array   $attributes
     *
     * @return string
     */
    function alert($content = '', $title = '', $style = 'info', $dismissible = false, $attributes = [])
    {
        if (! empty($title)) {
            $content = '<h4>' . $title . '</h4>' . $content;
        }

        if ($dismissible) {
            $content = icon_close(['data-dismiss' => 'alert']) . ' ' . $content;
        }

        $attributes['class'] = merge_classes(
            'alert alert-' . $style . ($dismissible === true ? ' alert-dismissible' : ''),
            $attributes
        );

        return el('div', $content, $attributes);
    }
}



if (! function_exists('alert_info')) {
    function alert_info($content = '', $title = '', $dismissible = false, $attributes = [])
    {
        return alert($content, $title, 'info', $dismissible, $attributes);
    }
}



if (! function_exists('alert_success')) {
    function alert_success($content = '', $title = '', $dismissible = false, $attributes = [])
    {
        return alert($content, $title, 'success', $dismissible, $attributes);
    }
}



if (! function_exists('alert_warning')) {
    function alert_warning($content = '', $title = '', $dismissible = false, $attributes = [])
    {
        return alert($content, $title, 'warning', $dismissible, $attributes);
    }
}



if (! function_exists('alert_danger')) {
    function alert_danger($content = '', $title = '', $dismissible = false, $attributes = [])
    {
        return alert($content, $title, 'danger', $dismissible, $attributes);
    }
}



if (! function_exists('modal')) {
    /**
     * Modal
     *
     * @param string $id
     * @param string $body
     * @param string $title
     * @param string $footer
     * @param string $size   Empty, 'lg' or 'sm'
     *
     * @return string
     */
    function modal($id = '', $body = '', $title = '', $footer = '', $size = '')
    {
        $html = '<div class="modal fade" id="' . $id . '" tabindex="-1" role="dialog">' . '<div class="modal-dialog' . (! empty($size) ? ' modal-' . $size : '') . '" role="document">' . '<div class="modal-content">' . (! empty($title) ? '<div class="modal-header">' . '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . '<h4 class="modal-title">' . $title . '</h4>' . '</div>' : '') . '<div class="modal-body">' . $body . '</div>' . (! empty($footer) ? '<div class="modal-footer">' . $footer . '</div>' : '') . '</div></div></div>';

        return $html;
    }
}



if (! function_exists('btn_modal')) {
    /**
     * Button trigger modal
     *
     * @param string $content
     * @param string $target_id
     * @param array  $btn_classes
     * @param array  $attributes
     *
     * @return string
     */
    function btn_modal($content = 'Submit', $target_id = '', $btn_classes = [], $attributes = [])
    {
        $attributes['data-toggle'] = 'modal';
        $attributes['data-target'] = '#' . $target_id;

        return btn($content, $btn_classes, $attributes);
    }
}



if (! function_exists('blockquote')) {
    /**
     * Blockquote
     *
     * @param string  $content
     * @param string  $footer     Footer content
     * @param boolean $reverse    True to right-align the content
     * @param array   $attributes
     *
     * @return string
     */
    function blockquote($content = '', $footer = '', $reverse = false, $attributes = [])
    {
        if (! empty($footer)) {
            $footer = '<footer>' . $footer . '</footer>';
        }

        if ($reverse === true) {
            $attributes['class'] = merge_classes('blockquote-reverse', $attributes);
        }

        return el('blockquote', $content . $footer, $attributes);
    }
}



if (! function_exists('lists')) {
    /**
     * Lists
     *
     * @param array  $items
     * @param string $type       ul or ol
     * @param string $style      Default options are 'unstyled' and 'inline'
     * @param array  $attributes
     *
     * @return string
     */
    function lists($items = [], $type = 'ul', $style = '', $attributes = [])
    {
        $content = '';

        if (empty($type)) {
            $type = 'ul';
        }

        foreach ($items as $item) {
            if (is_array($item)) {
                $content .= lists($item, $type);
                continue;
            }

            $content .= el('li', $item);
        }

        if (! empty($style)) {
            $attributes['class'] = merge_classes('list-' . $style, $attributes);
        }

        return el($type, $content, $attributes);
    }
}



if (! function_exists('dl')) {
    /**
     * Description
     *
     * @param array   $items
     * @param boolean $horizontal
     * @param array   $attributes
     *
     * @return string
     */
    function dl($items = [], $horizontal = false, $attributes = [])
    {
        $content = '';

        foreach ($items as $dt => $dd) {
            $content .= el('dt', $dt);
            if (is_array($dd)) {
                foreach ($dd as $d) {
                    $content .= el('dd', $d);
                }
                continue;
            }
            $content .= el('dd', $dd);
        }

        if ($horizontal) {
            $attributes['class'] = merge_classes('dl-horizontal', $attributes);
        }

        return el('dl', $content, $attributes);
    }
}



if (! function_exists('kbd')) {
    /**
     * Code User input
     *
     * @param array|string $keys
     * @param array        $attributes
     *
     * @return string
     */
    function kbd($keys = [], $attributes = [])
    {
        $content = '';
        if (is_array($keys)) {
            foreach ($keys as $key) {
                $content .= ' + ' . el('kbd', htmlentities($key));
            }
            $content = substr($content, 3);
        } else {
            $content .= htmlentities($keys);
        }

        return el('kbd', $content, $attributes);
    }
}



if (! function_exists('samp')) {
    /**
     * Sample output
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function samp($content = '', $attributes = [])
    {
        return el('samp', $content, $attributes);
    }
}



if (! function_exists('_var')) {
    function _var($content = '', $attributes = [])
    {
        return el('var', $content, $attributes);
    }
}



if (! function_exists('code')) {
    /**
     * Inline code
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function code($content = '', $attributes = [])
    {
        return el('code', htmlentities($content), $attributes);
    }
}



if (! function_exists('pre')) {
    /**
     * Basic code block
     *
     * @param string  $content
     * @param string  $language
     * @param boolean $scrollable
     * @param array   $attributes
     *
     * @return string
     */
    function pre($content = '', $language = '', $scrollable = false, $attributes = [])
    {
        if ($scrollable) {
            $attributes['class'] = merge_classes('pre-scrollable', $attributes);
        }

        return el('pre', code($content, (empty($language) ? [] : ['class' => 'language-' . $language])), $attributes);
    }
}



if (! function_exists('icon')) {
    /**
     * Icon
     *
     * @param string $icon
     * @param string $start
     * @param array  $attributes
     *
     * @return string
     */
    function icon($icon = 'plus', $start = 'glyphicon glyphicon-', $attributes = [])
    {
        if (! $start) {
            $start = 'glyphicon glyphicon-';
        }

        $attributes['class'] = merge_classes($start . $icon, $attributes);

        return el('i', '', $attributes);
    }
}



if (! function_exists('icon_close')) {
    /**
     * Close icon
     *
     * @param array $attributes
     *
     * @return string
     */
    function icon_close($attributes = [])
    {
        if (! isset($attributes['type'])) {
            $attributes['type'] = 'button';
        }

        $attributes['class'] = merge_classes('close', $attributes);

        return el('button', '<span>&times;</span>', $attributes);
    }
}



if (! function_exists('p')) {
    /**
     * Body copy
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function p($content = '', $attributes = [])
    {
        return el('p', $content, $attributes);
    }
}



if (! function_exists('lead')) {
    /**
     * Lead body copy
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function lead($content = '', $attributes = [])
    {
        $attributes['class'] = merge_classes('lead', $attributes);

        return el('p', $content, $attributes);
    }
}



if (! function_exists('mark')) {
    /**
     * Marked text
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function mark($content = '', $attributes = [])
    {
        return el('mark', $content, $attributes);
    }
}



if (! function_exists('del')) {
    /**
     * Deleted text
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function del($content = '', $attributes = [])
    {
        return el('del', $content, $attributes);
    }
}



if (! function_exists('_s')) {
    /**
     * Strikethrough text
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function _s($content = '', $attributes = [])
    {
        return el('s', $content, $attributes);
    }
}



if (! function_exists('ins')) {
    /**
     * Inserted text
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function ins($content = '', $attributes = [])
    {
        return el('ins', $content, $attributes);
    }
}



if (! function_exists('u')) {
    /**
     * Underlined text
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function u($content = '', $attributes = [])
    {
        return el('u', $content, $attributes);
    }
}



if (! function_exists('small')) {
    /**
     * Small text
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function small($content = '', $attributes = [])
    {
        return el('small', $content, $attributes);
    }
}



if (! function_exists('strong')) {
    /**
     * Bold
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function strong($content = '', $attributes = [])
    {
        return el('strong', $content, $attributes);
    }
}



if (! function_exists('em')) {
    /**
     * Italics
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function em($content = '', $attributes = [])
    {
        return el('em', $content, $attributes);
    }
}



if (! function_exists('embed')) {
    /**
     * @param string $src
     * @param string $ratio      16by9 or 4by3
     * @param array  $attributes
     *
     * @return string
     */
    function embed($src = '', $ratio = '16by9', $attributes = [])
    {
        $attributes['class'] = merge_classes('embed-responsive embed-responsive-' . $ratio, $attributes);

        return el('div', el('iframe', '', ['class' => 'embed-responsive-item', 'src' => $src]), $attributes);
    }
}



if (! function_exists('well')) {
    /**
     * Well
     *
     * @param string $content
     * @param string $size       Default options are 'lg' and 'sm'
     * @param array  $attributes
     *
     * @return string
     */
    function well($content = '', $size = '', $attributes = [])
    {
        $attributes['class'] = merge_classes('well' . (empty($size) ? '' : ' well-' . $size), $attributes);

        return el('div', $content, $attributes);
    }
}



if (! function_exists('media')) {
    /**
     * Media object
     *
     * @param string $img        Image src
     * @param string $link       Link href surrounding the image
     * @param string $heading
     * @param string $content
     * @param string $alignment  Left or right plus media-top, media-middle or media-bottom
     * @param array  $attributes
     *
     * @return string
     */
    function media($img = '', $link = '#', $heading = '', $content = '', $alignment = 'left', $attributes = [])
    {
        $object = '<div class="media-' . $alignment . '">'
                 . '<a href="' . $link . '"><img class="media-object" src="' . $img . '" alt="' . $heading . '"></a></div>';

        $content = ($alignment === 'left' ? $object : '')
                 . '<div class="media-body">' . '<h4 class="media-heading">' . $heading . '</h4>' . $content . '</div>'
                 . ($alignment === 'right' ? $object : '');


        $attributes['class'] = merge_classes('media', $attributes);

        return el('div', $content, $attributes);
    }
}



if (! function_exists('badge')) {
    /**
     * Badge
     *
     * @param string $content
     * @param array  $attributes
     *
     * @return string
     */
    function badge($content = '', $attributes = [])
    {
        $attributes['class'] = merge_classes('badge', $attributes);

        return el('span', $content, $attributes);
    }
}



if (! function_exists('progress')) {
    /**
     * Progress bars parent
     *
     * @param string|array $progress_bars A list of progress bars
     * @param array        $attributes
     *
     * @return string
     */
    function progress($progress_bars = [], $attributes = [])
    {
        $content = '';

        if (is_array($progress_bars)) {
            foreach ($progress_bars as $pb) {
                $content .= $pb;
            }
        } else {
            $content = $progress_bars;
        }

        $attributes['class'] = merge_classes('progress', $attributes);

        return el('div', $content, $attributes);
    }
}



if (! function_exists('progress_bar')) {
    /**
     * Progress bar
     *
     * @param integer $value                The progress
     * @param string  $label
     * @param array   $progress_bar_classes Array of 'progress-bar-' classes
     * @param array   $attributes
     *
     * @return string
     */
    function progress_bar($value = 0, $label = '', $progress_bar_classes = [], $attributes = [])
    {
        $class = 'progress-bar';
        foreach ($progress_bar_classes as $c) {
            if ($c === 'active') {
                $class .= ' ' . $c;
                continue;
            }
            $class .= ' progress-bar-' . $c;
        }

        $attributes['class']         = merge_classes($class, $attributes);
        $attributes['role']          = 'progressbar';
        $attributes['aria-valuenow'] = $value;
        $attributes['aria-valuemin'] = '0';
        $attributes['aria-valuemax'] = '100';
        $attributes['style']         = 'min-width: 2em; width: ' . $value . '%;';

        return el('div', $label, $attributes);
    }
}



if (! function_exists('progress_bar_success')) {
    /**
     * Progress bar success
     *
     * @param integer $value                The progress
     * @param string  $label
     * @param array   $progress_bar_classes Array of 'progress-bar-' classes
     * @param array   $attributes
     *
     * @return string
     */
    function progress_bar_success($value = 0, $label = '', $progress_bar_classes = [], $attributes = [])
    {
        array_push($progress_bar_classes, 'success');

        return progress_bar($value, $label, $progress_bar_classes, $attributes);
    }
}



if (! function_exists('progress_bar_info')) {
    /**
     * Progress bar info
     *
     * @param integer $value                The progress
     * @param string  $label
     * @param array   $progress_bar_classes Array of 'progress-bar-' classes
     * @param array   $attributes
     *
     * @return string
     */
    function progress_bar_info($value = 0, $label = '', $progress_bar_classes = [], $attributes = [])
    {
        array_push($progress_bar_classes, 'info');

        return progress_bar($value, $label, $progress_bar_classes, $attributes);
    }
}



if (! function_exists('progress_bar_warning')) {
    /**
     * Progress bar warning
     *
     * @param integer $value                The progress
     * @param string  $label
     * @param array   $progress_bar_classes Array of 'progress-bar-' classes
     * @param array   $attributes
     *
     * @return string
     */
    function progress_bar_warning($value = 0, $label = '', $progress_bar_classes = [], $attributes = [])
    {
        array_push($progress_bar_classes, 'warning');

        return progress_bar($value, $label, $progress_bar_classes, $attributes);
    }
}



if (! function_exists('progress_bar_danger')) {
    /**
     * Progress bar danger
     *
     * @param integer $value                The progress
     * @param string  $label
     * @param array   $progress_bar_classes Array of 'progress-bar-' classes
     * @param array   $attributes
     *
     * @return string
     */
    function progress_bar_danger($value = 0, $label = '', $progress_bar_classes = [], $attributes = [])
    {
        array_push($progress_bar_classes, 'danger');

        return progress_bar($value, $label, $progress_bar_classes, $attributes);
    }
}



if (! function_exists('col')) {
    /**
     * Open a grid column
     *
     * @param integer|array $columns    Ex: 4 = '.col-md-4' or ['md-4', 'xs-8'] for '.col-md-4.col-xs-8'
     * @param integer|array $offset     Ex: 4 = '.col-md-offset-4' or ['md-4', 'xs-8'] for '.col-md-offset-4.col-xs-offset-8'
     * @param array         $attributes
     *
     * @return string
     */
    function col($columns = 1, $offset = 0, $attributes = [])
    {
        $class = '';

        if (is_array($columns)) {
            foreach ($columns as $s) {
                $class .= ' col-' . $s;
            }
        } else {
            $class .= ' col-md-' . $columns;
        }

        if (is_array($offset)) {
            foreach ($offset as $o) {
                $s      = explode('-', $o);
                $class .= ' col-' . $s[0] . '-offset-' . $s[1] . ' ';
            }
        } elseif ($offset > 0) {
            $class .= ' col-md-offset-' . $offset;
        }

        $attributes['class'] = merge_classes($class, $attributes);

        return el('div', '', $attributes, false);
    }
}



if (! function_exists('_col')) {
    /**
     * Close a grid column
     *
     * @param string $before_close Content to add before to close
     *
     * @return string
     */
    function _col($before_close = '')
    {
        return $before_close . PHP_EOL . '</div>';
    }
}



if (! function_exists('container')) {
    /**
     * Open a container
     *
     * @param boolean $fluid      True to be .container-fluid
     * @param array   $attributes
     *
     * @return string
     */
    function container($fluid = false, $attributes = [])
    {
        $attributes['class'] = merge_classes('container' . ($fluid === true ? '-fluid' : ''), $attributes);

        return el('div', '', $attributes, false);
    }
}



if (! function_exists('_container')) {
    /**
     * Close a container
     *
     * @param string $before_close Content to add before to close
     *
     * @return string
     */
    function _container($before_close = '')
    {
        return $before_close . PHP_EOL . '</div>';
    }
}



if (! function_exists('breadcrumbs')) {
    /**
     * Breadcrumbs
     *
     * @param array $items      Array of Content => Link. Ex: ['About' => '/about', 'Contact' => '/contact']
     * @param array $attributes
     *
     * @return string
     */
    function breadcrumbs($items = [], $attributes = [])
    {
        $html = '';

        $count = count($items);
        $i     = 1;
        foreach ($items as $content => $href) {
            if ($i === $count) {
                $html .= '<li class="active">' . $content . '</li>';
                break;
            }
            $i++;
            $html .= '<li><a href="' . $href . '">' . $content . '</a></li>';
        }

        $attributes['class'] = merge_classes('breadcrumb', $attributes);

        return el('ol', $html, $attributes);
    }
}



if (! function_exists('dropdown_menu')) {
    /**
     * Dropdown menu - Used in dropdown()
     *
     * @param array  $items
     * @param string $align      None, left or right
     * @param array  $attributes
     *
     * @return string
     */
    function dropdown_menu($items = [], $align = '', $attributes = [])
    {
        $class = 'dropdown-menu';

        if (! empty($align)) {
            $class .= ' dropdown-menu-' . $align;
        }

        $attributes['class'] = merge_classes($class, $attributes);

        $content = '';

        foreach ($items as $a_content => $href) {
            if (is_numeric($a_content)) {
                $a_content = $href;
            }

            $a     = '';
            $attr  = [];
            $first = substr($a_content, 0, 1);

            if ($first === '#') {
                $attr['class'] = 'dropdown-header';
                $a             = trim(substr($a_content, 1));
            } elseif ($first === '!') {
                $attr['class'] = 'disabled';
                $a             = el('a', trim(substr($a_content, 1)), ['href' => '#']);
            } elseif ($first === '>') {
                $attr['class'] = 'active';
                $a             = el('a', trim(substr($a_content, 1)), ['href' => '#']);
            } elseif ($a_content === '-') {
                $attr['class'] = 'divider';
            } else {
                $a = el('a', $a_content, ['href' => $href]);
            }

            $content .= el('li', $a, $attr);
        }

        return el('ul', $content, $attributes);
    }
}



if (! function_exists('dropdown')) {
    /**
     * Button dropdown
     *
     * @param string $btn_content
     * @param string $dropdown_menu
     * @param string $direction     down or up
     * @param array  $attributes
     *
     * @return string
     */
    function dropdown($btn_content = '', $dropdown_menu = '', $direction = 'down', $attributes = [])
    {
        $button = el('button', $btn_content . ' ' . el('span', '', ['class' => 'caret']), [
            'class'       => 'btn btn-default dropdown-toggle',
            'type'        => 'button',
            'data-toggle' => 'dropdown',
        ]);

        $attributes['class'] = merge_classes('drop' . $direction, $attributes);

        return el('div', $button . $dropdown_menu, $attributes);
    }
}



if (! function_exists('abbr')) {
    /**
     * Abbreviation
     *
     * @param string  $content
     * @param string  $title
     * @param boolean $initialism
     * @param array   $attributes
     *
     * @return string
     */
    function abbr($content = '', $title = '', $initialism = false, $attributes = [])
    {
        $attributes['title'] = $title;

        if ($initialism) {
            $attributes['class'] = merge_classes('initialism', $attributes);
        }

        return el('abbr', $content, $attributes);
    }
}



if (! function_exists('address')) {
    /**
     * Address
     *
     * @param array $lines
     * @param array $attributes
     *
     * @return string
     */
    function address($lines = [], $attributes = [])
    {
        $content = '';

        $total = count($lines);

        for ($i = 0; $i <= $total - 1; $i++) {
            $content .= $lines[$i] . ($i === $total ? '' : '<br>');
        }

        return el('address', $content, $attributes);
    }
}



if (! function_exists('table')) {
    /**
     * Table
     *
     * @param array $thead
     * @param array $tbody
     * @param array $table_classes Default options are 'striped', 'bordered', 'hover', 'condensed', 'responsive'
     * @param array $tfoot
     * @param array $attributes
     *
     * @return string
     */
    function table($thead = [], $tbody = [], $table_classes = [], $tfoot = [], $attributes = [])
    {
        $content = '';

        $count_table_classes = count($table_classes);

        for ($i = 0; $i < $count_table_classes; $i++) {
            if ($table_classes[$i] === 'responsive') {
                unset($table_classes[$i]);
                $responsive = true;
            }
        }

        if ($thead) {
            $content .= '<thead><tr>';
            foreach ($thead as $key => $value) {
                if (is_array($value)) {
                    $content .= el('th', $key, $value);
                    continue;
                }
                $content .= el('th', $value);
            }
            $content .= '</tr></thead>';
        }

        if ($tbody) {
            $content .= '<tbody>';
            foreach ($tbody as $key => $value) {
                $td = '';
                foreach ($value as $tdkey => $tdvalue) {
                    if (is_array($tdvalue)) {
                        $attr = [];
                        foreach ($tdvalue as $k => $v) {
                            $attr[$k] = $v;
                        }
                        $td .= el('td', $tdkey, $attr);
                        continue;
                    }
                    $td .= el('td', $tdvalue);
                }
                $content .= el('tr', $td);
            }
            $content .= '</tbody>';
        }

        if ($tfoot) {
            $content .= '<tfoot><tr>';
            foreach ($tfoot as $key => $value) {
                if (is_array($value)) {
                    $content .= el('td', $key, $value);
                    continue;
                }
                $content .= el('td', $value);
            }
            $content .= '</tr></tfoot>';
        }

        $class = 'table';

        foreach ($table_classes as $c) {
            $class .= ' table-' . $c;
        }

        $attributes['class'] = merge_classes($class, $attributes);

        if (isset($responsive)) {
            return '<div class="table-responsive">' . el('table', $content, $attributes) . '</div>';
        }

        return el('table', $content, $attributes);
    }
}



if (! function_exists('pagination')) {
    /**
     * Default pagination
     *
     * @param integer $items_per_page
     * @param integer $total_items
     * @param array   $attributes
     *
     * @return string
     */
    function pagination($items_per_page, $total_items, $attributes = [])
    {
        $curent_page = 1;

        $url = parse_url($_SERVER['REQUEST_URI']);

        $url['path']  = isset($url['path']) ? $url['path'] : '';
        $url['query'] = isset($url['query']) ? $url['query'] : '';

        $first_uri    = '';
        $previous_uri = '';
        $base_uri     = '';
        $next_uri     = '';
        $last_uri     = '';

        foreach (explode('&', trim($url['query'], '&')) as $chunk) {
            $param = explode('=', $chunk);
            if ($param) {
                if ($param[0] === 'page' && $param[1] > 0) {
                    $curent_page = (int)$param[1];
                }
                $parts[] = $param;
            }
        }

        $total_pages = ceil($total_items / $items_per_page);

        // Previous
        if ($curent_page < 2) {
            $previous = '';
        } else {
            foreach ($parts as $part) {
                if ($part[0] === 'page') {
                    $part[1]--;
                    if ($part[1] === 1) {
                        continue;
                    }
                    if ($part[1] >= $total_pages) {
                        $part[1] = $total_pages;
                    }
                }
                if (! isset($part[1])) {
                    continue;
                } elseif ($part[0] !== 'page') {
                    $base_uri .= '&' . $part[0] . '=' . $part[1];
                }

                $previous_uri .= '&' . $part[0] . '=' . $part[1];
                $first_uri    .= $part[0] === 'page' ? '' : '&' . $part[0] . '=' . $part[1];
            }
            $previous_uri = trim($previous_uri, '&');
            $previous_uri = $url['path'] . ($previous_uri ? '?' . $previous_uri : '');

            $first_uri  = $url['path'] . '?' . trim($first_uri, '&');
            $first_page = '<li><a href="' . $first_uri . '">First</a></li>';

            $previous = $first_page . '<li><a href="' . $previous_uri . '"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        // Next
        if ($total_pages <= $curent_page) {
            $next = '';
        } else {
            foreach ($parts as $part) {
                if ($part[0] === 'page') {
                    $has_next = true;
                    $part[1]  = ($part[1] < 2 ? 2 : $part[1] + 1);
                }
                if (! isset($part[1])) {
                    continue;
                } elseif ($part[0] !== 'page') {
                    $base_uri .= '&' . $part[0] . '=' . $part[1];
                }
                $next_uri .= '&' . $part[0] . '=' . $part[1];
                $last_uri .= '&' . $part[0] . '=' . ($part[0] === 'page' ? $total_pages : $part[1]);
            }

            if (! isset($has_next)) {
                $next_uri .= '&page=2';
                $last_uri .= '&page=' . $total_pages;
            }

            $next_uri = $url['path'] . '?' . trim($next_uri, '&');

            $next = '<li><a href="' . $next_uri . '"><span aria-hidden="true">&raquo;</span></a></li>';
        }

        $pages = '';

        if (($curent_page - 2) > 0) {
            $pages .= '<li><a href="' . $url['path'] . '?' . trim(
                $base_uri . '&page=' . ($curent_page - 2),
                '&'
            ) . '">' . ($curent_page - 2) . '</a></li>';
        }

        if (($curent_page - 1) > 0) {
            $pages .= '<li><a href="' . $url['path'] . '?' . trim(
                $base_uri . '&page=' . ($curent_page - 1),
                '&'
            ) . '">' . ($curent_page - 1) . '</a></li>';
        }

        // Current
        $pages .= '<li class="active"><a>' . $curent_page . '</a></li>';

        if (($curent_page + 1) < $total_pages) {
            $pages .= '<li><a href="' . $url['path'] . '?' . trim(
                $base_uri . '&page=' . ($curent_page + 1),
                '&'
            ) . '">' . ($curent_page + 1) . '</a></li>';
        }

        if (($curent_page + 2) < $total_pages) {
            $pages .= '<li><a href="' . $url['path'] . '?' . trim(
                $base_uri . '&page=' . ($curent_page + 2),
                '&'
            ) . '">' . ($curent_page + 2) . '</a></li>';
        }

        // Last
        if ($curent_page < $total_pages) {
            $last_uri  = $url['path'] . '?' . trim($last_uri, '&');
            $last_page = '<li><a href="' . $last_uri . '">Last</a></li>';
            $next     .= $last_page;
        }

        $attributes['class'] = merge_classes('text-center', $attributes);

        return el('nav', '<ul class="pagination">' . $previous . ' ' . $pages . ' ' . $next . '</ul>', $attributes);
    }
}



if (! function_exists('pager')) {
    /**
     * Pager
     *
     * @param integer $items_per_page
     * @param integer $total_items
     * @param boolean $aligned
     * @param array   $attributes
     *
     * @return string
     */
    function pager($items_per_page, $total_items, $aligned = false, $attributes = [])
    {
        $curent_page = 0;

        $url = parse_url($_SERVER['REQUEST_URI']);

        $url['path']  = isset($url['path']) ? $url['path'] : '';
        $url['query'] = isset($url['query']) ? $url['query'] : '';

        //var_dump($url);exit;

        $previous_uri = '';
        $next_uri     = '';

        foreach (explode('&', trim($url['query'], '&')) as $chunk) {
            $param = explode('=', $chunk);
            if ($param) {
                if ($param[0] === 'page') {
                    $curent_page = $param[1];
                }
                $parts[] = $param;
            }
        }

        //var_dump($parts);

        $total_pages = ceil($total_items / $items_per_page);

        //var_dump($total_pages);

        // Previous
        if ($curent_page < 2) {
            $previous = '';
        } else {
            foreach ($parts as $part) {
                if ($part[0] === 'page') {
                    $part[1]--;
                    if ($part[1] === 1) {
                        continue;
                    }
                    if ($part[1] >= $total_pages) {
                        $part[1] = $total_pages;
                    }
                }
                if (! isset($part[1])) {
                    continue;
                }
                $previous_uri .= '&' . $part[0] . '=' . $part[1];
            }
            $previous_uri = trim($previous_uri, '&');
            $previous_uri = $url['path'] . ($previous_uri ? '?' . $previous_uri : '');

            $previous = '<li' . ($aligned === true ? ' class="previous" ' : '') . '><a href="' . $previous_uri . '"><span aria-hidden="true">&larr;</span> Newer</a></li>';
        }

        // Next
        if ($total_pages <= $curent_page) {
            $next = '';
        } else {
            foreach ($parts as $part) {
                if ($part[0] === 'page') {
                    $has_next = true;
                    $part[1]  = ($part[1] < 2 ? 2 : $part[1] + 1);
                }
                if (! isset($part[1])) {
                    continue;
                }
                $next_uri .= '&' . $part[0] . '=' . $part[1];
            }

            if (! isset($has_next)) {
                $next_uri .= '&page=2';
            }

            $next_uri = $url['path'] . '?' . trim($next_uri, '&');

            $next = '<li' . ($aligned === true ? ' class="next"' : '') . '><a href="' . $next_uri . '">Older <span aria-hidden="true">&rarr;</span></a></li>';
        }

        return el('nav', '<ul class="pager">' . $previous . ' ' . $next . '</ul>', $attributes);
    }
}



if (! function_exists('accordion')) {
    /**
     * Accordion
     *
     * @param array  $items      Ex: [ 'title' => 'content', 'title' => 'content' ]
     * @param string $id
     * @param array  $attributes
     *
     * @return string
     */
    function accordion($items = [], $id = '', $attributes = [])
    {
        $content = '';

        $count = 1;
        foreach ($items as $title => $body) {
            $a_attr = [
                'data-toggle' => 'collapse',
            ];

            if ($count > 1) {
                $a_attr['class'] = 'collapsed';
            }

            if (isset($id)) {
                $a_attr['data-parent'] = '#' . $id;
            }

            $content .= panel(
                el('div', $body, [
                          'id'    => 'collapse-' . $count . '-' . $id,
                          'class' => 'panel-collapse collapse' . ($count === 1 ? ' in' : ''),
                      ]),
                '<h4 class="panel-title">' . a($title, '#collapse-' . $count . '-' . $id, false, $a_attr) . '</h4>'
            );
            $count++;
        }

        $attributes['id']    = $id;
        $attributes['class'] = merge_classes('panel-group', $attributes);

        return el('div', $content, $attributes);
    }
}



if (! function_exists('carousel')) {
    /**
     * Carousel
     *
     * @param string $id
     * @param array  $images     Array with images src
     * @param array  $captions   Ex: [ 0 => ['Img 0 Title', 'Img 0 Description'], ]
     * @param array  $attributes
     *
     * @return string
     */
    function carousel($id = '', $images = [], $captions = [], $attributes = [])
    {
        $content     = '';
        $total_items = count($images);
        // Indicators
        $content .= '<ol class="carousel-indicators">';
        for ($i = 0; $i < $total_items; $i++) {
            $content .= '<li data-target="#' . $id . '" data-slide-to="' . $i . '"' . ($i === 0 ? ' class="active"' : '') . '></li>';
        }
        $content .= '</ol>';

        // Wrapper for slides
        $content .= '<div class="carousel-inner">';
        for ($i = 0; $i < $total_items; $i++) {
            $content .= '<div class="item' . ($i === 0 ? ' active' : '') . '">';
            $content .= '<img src="' . $images[$i] . '">';
            if (isset($captions[$i])) {
                $content .= '<div class="carousel-caption">'
                     . (isset($captions[$i][0]) ? '<h3>' . $captions[$i][0] . '</h3>' : '')
                     . (isset($captions[$i][1]) ? '<p>' . $captions[$i][1] . '</p>' : '')
                     . '</div>';
            }
            $content .= '</div>';
        }
        $content .= '</div>';

        // Controls
        $content .= a('<span class="icon-prev"></span>', '#' . $id, false, [
            'class'      => 'left carousel-control',
            'data-slide' => 'prev',
        ]);
        $content .= a('<span class="icon-next"></span>', '#' . $id, false, [
            'class'      => 'right carousel-control',
            'data-slide' => 'next',
        ]);

        // Attributes
        $attributes['id']        = $id;
        $attributes['class']     = merge_classes('carousel slide', $attributes);
        $attributes['data-ride'] = 'carousel';

        return el('div', $content, $attributes);
    }
}

function list_group($items = [], $type = 'ul', $attributes = [])
{
    $content = '';

    foreach ($items as $item) {
        $content .= $item;
    }

    if (empty($type)) {
        $type === 'ul';
    }

    $attributes['class'] = merge_classes('list-group', $attributes);

    return el($type, $content, $attributes);
}

function list_group_item($content = '', $type = 'li', $href = '#', $active = false, $style = '', $attributes = [])
{
    if ($type === 'a') {
        $attributes['href'] = $href;
    }

    $attributes['class'] = merge_classes('list-group-item' .
        (empty($style) ? '' : ' list-group-item-' . $style) .
        (empty($active) ? '' : ' active'), $attributes);

    return el($type, $content, $attributes);
}

function jumbotron($contents = [], $attributes = [])
{
    $content = '';

    foreach ($contents as $c) {
        $content .= $c;
    }

    $attributes['class'] = merge_classes('jumbotron', $attributes);

    return el('div', $content, $attributes);
}
