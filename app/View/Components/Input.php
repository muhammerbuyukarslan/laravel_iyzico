<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{

    private $type;
    private $label;
    private $placeholder;
    private $field;
    private $value;

    /**
     * @param $type
     * @param $label
     * @param $placeholder
     * @param $field
     * @param $value
     */
    public function __construct(string $label,string $placeholder,string $field ,string $value , string $type ="text")
    {
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->field = $field;
        $this->value = $value;
    }

    /**
     * @param string $type
     * @param string $label
     * @param string $placeholder
     * @param string $field
     * @param string $value
     */


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input' , [
            "type" => $this->type,
            "label" => $this->label,
            "placeholder" => $this->placeholder,
            "field" => $this->field,
            "value" => $this->value
    ]);
    }
}
