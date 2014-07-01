<?php

/* applications/projects/layouts/logs_index.html */
class __TwigTemplate_615655a341a72f58c69197d78e6443643ccc3b87912def90c40bc0d4c398bae4 extends Twig_Template
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
        echo \layout::func_from_text("<div>
    <i class=\"fa fa-calendar\"></i> <input type=\"text\" name=\"start\" value=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly> <i class=\"fa fa-arrow-right\"></i> <input type=\"text\" name=\"end\" value=\"");
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
        return "applications/projects/layouts/logs_index.html";
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
