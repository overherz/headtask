<?php

/* applications\users\layouts\invite_form.html */
class __TwigTemplate_ff251aefebce9997134169970755f131c56db8571426f62f1aae59ac9f035e9d extends Twig_Template
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
        echo \layout::func_from_text("<form id=\"invite_form\">
    <input type=\"hidden\" name=\"act\" value=\"send_invite\">
    Email: <input type=\"text\" name=\"email\">
</form>");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\invite_form.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
