<?php

/* applications\users\layouts\login.html */
class __TwigTemplate_bb70ec8ff1c2f9319c679986f2d3d43094a0df4b21ab1b9d487419529312033c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/wrapper_index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "login.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 6
    public function block_js($context, array $blocks = array())
    {
        // line 7
        echo \layout::func_from_text("    <script type =\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "login.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("<div class=\"container\">
    <form class=\"form-signin\" id=\"login_form\">
        <input type=\"hidden\" name=\"act\" value=\"login\">
        <div class=\"alert alert-error\" style=\"display: none;\"></div>
        <h2 class=\"form-signin-heading\">Авторизация</h2>
        <input type=\"text\" name=\"login\" placeholder=\"Email\">
        <input type=\"password\" name=\"password\" placeholder=\"Password\">
        <div class=\"checkbox\" style=\"padding-left: 0px;\">
        <label>
            <input type=\"checkbox\" name=\"cookie\"> запомнить
        </label>
        </div>
        <button class=\"btn btn-primary login\" type=\"button\">Войти</button>
    </form>
</div> <!-- /container -->
");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 10,  50 => 9,  43 => 7,  40 => 6,  33 => 4,  30 => 3,);
    }
}
