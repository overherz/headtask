<?php

/* applications\users\layouts\users.html */
class __TwigTemplate_6f7de32e0393a67c29bb2e9107fd45238cee13d39926475f71d8fa94c123a995 extends Twig_Template
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
        echo \layout::func_from_text("    ");
        $this->env->loadTemplate("/source/search_form.html")->display($context);
        // line 12
        echo \layout::func_from_text("    <div id=\"search_result\">
        ");
        // line 13
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "users_table.html"), "method"));
        $template->display($context);
        // line 14
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
        return array (  57 => 14,  54 => 13,  51 => 12,  48 => 11,  45 => 10,  39 => 6,  36 => 5,  30 => 3,);
    }
}
