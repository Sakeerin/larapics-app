<?php

namespace App\View\Components;

use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type;

    public $dismissable;

    protected $types = [
        "success",
        "danger",
        "warning",
        "info"
    ];

    protected $classes = ['alert'];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = "info", $dismissable = false)
    {
        $this->type = $this->validType($type);
        $this->classes[] = "alert-{$this->type}";
        if($dismissable){
            $this->classes[] = "alert-dismissible fade show";
        }
        $this->dismissable = $dismissable;
    }


    protected function validType($type)
    {
        return in_array($type, $this->types) ? $type : 'info';
    }

    public function link($text, $target = '#')
    {
        return new HtmlString("<a href=\"{$target}\" class=\"alert-link\">{$text}</a>");
    }

    public function icon($url = null)
    {
        $this->classes[] = 'd-flex align-items-center';
        $icon = $url ?? asset("icons/icon-{$this->type}.svg");
        return new HtmlString("<img class='me-2' src='{$icon}' />");
    }


    public function getClasses()
    {
        return join(" ", $this->classes);
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}