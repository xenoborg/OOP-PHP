<?php

class DisplayHtml
{

    public function htmlElement(string $element, array $elementProperties, $elementContent)
    {
        foreach($elementProperties as $property => $value)
        {
            $properties[] = "$property='$value'";
        }
        $properties = is_array($properties) ? implode(" ", $properties) : "";
        $html = "<$element $properties>$elementContent</$element>";

        return $html;
    }

}

?>