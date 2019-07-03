<?php
namespace libs;

class View
{

    public function generate($content_view, $template_view, $data = null)
    {
        include 'View/'.$template_view;
    }
}