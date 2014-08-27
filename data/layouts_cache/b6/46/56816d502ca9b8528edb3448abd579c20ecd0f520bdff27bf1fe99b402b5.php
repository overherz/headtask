<?php

/* applications/users/layouts/elements/upload_form.html */
class __TwigTemplate_b64656816d502ca9b8528edb3448abd579c20ecd0f520bdff27bf1fe99b402b5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("<form enctype=\"multipart/form-data\" method=\"post\" id=\"upload_avatar\">
    <input class=\"input-file\" type=\"file\" name=\"avatar\" />
</form>");
    }

    public function getTemplateName()
    {
        return "applications/users/layouts/elements/upload_form.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
