<?php

namespace App;

class Element 
{
    public function __construct(
        public string $name,
        public array $attributes = [],
        public string $content = "",
    )
    {}

    public function render()
    {
        // abrir etiqueta (atributos)
        // Imprimir el contenido
        // cerrar la etiqueta

        $htmlAttributes = '';
        if ( $this->attributes ) {
            foreach ($this->attributes as $key => $value) {
                $htmlAttributes .= " $key='$value'";
            }
        }

        $result = "<{$this->name}{$htmlAttributes}>";
        $result .= $this->content;
        $result .= "<{$this->name}>";

        return $result;
    }
}


$element = new Element(name: 'p', content: 'Este es el content');
echo $element->render()."\n\n";

$element = new Element('p', ['id' => 'mariossan', 'class' => 'escom'], 'Este es el content');
echo $element->render();