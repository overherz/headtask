<?php

/* applications\projects\layouts\logs_index.html */
class __TwigTemplate_978c8bb94e827ee5c0934c406780828e78db7e91fffcce1f9c504a46ae973ed3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'js' => array($this, 'block_js'),
            'context' => array($this, 'block_context'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_js($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("<script type =\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "logs.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"/source/js/jquery.ui.datepicker-ru.min.js\"></script>
");
    }

    // line 8
    public function block_context($context, array $blocks = array())
    {
        // line 9
        echo \layout::func_from_text("<div style=\"text-align: center;\">
    <input type=\"text\" name=\"start\" value=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly> <i class=\"fa fa-arrows-h\" style=\"font-size: 20px;\"></i> <input type=\"text\" name=\"end\" value=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly>
</div>
<div id=\"result\">
    ");
        // line 13
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "logs.html"), "method"));
        $template->display($context);
        // line 14
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\logs_index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 14,  54 => 13,  46 => 10,  43 => 9,  40 => 8,  32 => 4,  29 => 3,);
    }
}
