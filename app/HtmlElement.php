<?php

namespace App;

class Element 
{
    // using new feature from php 8
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
            foreach ($this->attributes as $attribute => $value) {
                if ( is_numeric($attribute) ) {
                    $htmlAttributes .= ' '.$value;
                } else {
                    $parse = htmlentities($value);
                    $htmlAttributes .= " $attribute='{$parse}'";
                }
            }
        }

        $result = "<{$this->name}{$htmlAttributes}>";

        // si el elemento es void
        // retorna el resultado de una sola vez
        if ( in_array($this->name, ["hr", "br", "img", "input", "meta"])) {
            return $result;
        }

        $result .= $this->content;
        $result .= "<{$this->name}>";

        return $result;
    }
}


$element = new Element(name: 'p', content: 'This is the content'); // new feature from php 8
echo $element->render()."\n";

$element = new Element('p', ['id' => 'mariossan', 'class' => 'escom'], 'This is the content');
echo $element->render()."\n";

$element = new Element('img', ['src' => 'img/mariossan.png']);
echo $element->render()."\n";

$element = new Element('input');
echo $element->render()."\n";

$element = new Element('input', ['required']);
echo $element->render()."\n";

$element = new Element('input', ['required', 'title' => 'esta es una prueba de "title"']);
echo $element->render()."\n";