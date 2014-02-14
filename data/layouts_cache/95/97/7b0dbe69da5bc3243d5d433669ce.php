<?php

/* applications\users\layouts\users.html */
class __TwigTemplate_95977b0dbe69da5bc3243d5d433669ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("Пользователи");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <script type =\"text/javascript\" src=\"/source/js/search.js\"></script>
    <script type=\"text/javascript\" src=\"/source/js/skypeCheck.js\"></script>
");
    }

    // line 10
    public function block_context($context, array $blocks = array())
    {
        // line 11
        echo \layout::func_from_text("    <form action=\"\" id=\"search_form\" method=\"post\" style=\"margin: 0px;\">
        <input type=\"text\" size=\"50\" name=\"search\" class=\"input-large\" placeholder=\"Поиск\">
        <input type=\"hidden\" name=\"page\" value=\"\">
    </form>
    <div class=\"clearfix\"></div>
    <div id=\"search_result\">
        ");
        // line 17
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "users_table.html"), "method"));
        $template->display($context);
        // line 18
        echo \layout::func_from_text("    </div>
");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 18,  56 => 17,  48 => 11,  45 => 10,  39 => 6,  36 => 5,  30 => 3,);
    }
}
