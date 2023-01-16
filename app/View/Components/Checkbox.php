<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{

    private  $type;
    private $label;
    private $field;
    private $checked;

    /**
     * @param $type
     * @param $label
     * @param $field
     * @param bool $checked
     */
    public function __construct( string $label, string $field,string $type = "checkbox", bool $checked = false)
    {
        $this->type = $type;
        $this->label = $label;
        $this->field = $field;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkbox' , [
            "type" => $this->type,
            "label" => $this->label,
            "field" => $this->field,
            "checked" => $this->checked
    ]);

    }
}
