<?php

/* applications/projects/layouts/get_delete_project.html */
class __TwigTemplate_e813e0a63a59d5cb39f1fef07d9d10f8085bf9d718f56bcfc62442cce353ca61 extends Twig_Template
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
        echo \layout::func_from_text("<form id=\"delete_project\"><div style='text-align:center;'>Вы действительно хотите удалить проект <b>");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</b> ?</div>
    <div id=\"captcha_div\" style=\"margin-top: 20px;\">");
        // line 2
        echo \layout::func_from_text((isset($context["captcha"]) ? $context["captcha"] : null));
        echo \layout::func_from_text("</div>
    <input type=\"hidden\" name=\"id\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"act\" value=\"delete_project\">
</form>");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/get_delete_project.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  24 => 2,  19 => 1,);
    }
}
