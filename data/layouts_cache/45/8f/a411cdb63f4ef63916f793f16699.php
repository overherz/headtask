<?php

/* applications\projects\layouts\users/users.html */
class __TwigTemplate_458fa411cdb63f4ef63916f793f16699 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("Проект \"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\" Задачи
");
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script type=\"text/javascript\" src=\"/source/js/search.js\"></script>
<script type=\"text/javascript\" src=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "users.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 13
    public function block_project_data($context, array $blocks = array())
    {
        // line 14
        echo \layout::func_from_text("    <form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal\" style=\"margin: 0px;float: left;\">
        <input type=\"hidden\" name=\"page\" value=\"\">
    </form>
    <div class=\"clearfix\"></div>
    <div id=\"search_result\">
        ");
        // line 19
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "users/users_table.html"), "method"));
        $template->display($context);
        // line 20
        echo \layout::func_from_text("    </div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\users/users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 20,  62 => 19,  55 => 14,  52 => 13,  46 => 10,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
