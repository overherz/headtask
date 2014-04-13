<?php

/* applications\index\layouts\admin/lost_pass.html */
class __TwigTemplate_ab2ee2b44cf082b623baedb2509dedc28dce4af17c58112e907c58f8e813cfb1 extends Twig_Template
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
        echo \layout::func_from_text("<form id=\"lost_pass_form\" style=\"width: 270px;\">
    <input type=\"hidden\" name=\"act\" value=\"get_lost_pass\">
    <input type=\"text\" placeholder=\"Email\" style=\"width: 240px;\" name=\"email\">
</form>");
    }

    public function getTemplateName()
    {
        return "applications\\index\\layouts\\admin/lost_pass.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
