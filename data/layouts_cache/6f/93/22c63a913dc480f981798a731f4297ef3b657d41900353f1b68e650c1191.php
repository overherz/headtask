<?php

/* applications/users/layouts/login.html */
class __TwigTemplate_6f9322c63a913dc480f981798a731f4297ef3b657d41900353f1b68e650c1191 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'menu' => array($this, 'block_menu'),
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
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo \layout::func_from_text("<div class=\"container\">
    <form class=\"form-signin\" id=\"login_form\">
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\"><b>Авторизация</b></div>
            <div class=\"panel-body\">
                <input type=\"hidden\" name=\"act\" value=\"login\">
                <input type=\"text\" name=\"login\" placeholder=\"Email\">
                <input type=\"password\" name=\"password\" placeholder=\"Password\">
                <div class=\"checkbox\" style=\"padding-left: 0px;\">
                    <label>
                        <input type=\"checkbox\" name=\"cookie\"> запомнить
                    </label>
                </div>
                <button class=\"btn btn-success login\" type=\"button\">Войти</button>
                <button class=\"btn btn-danger\" id=\"lost_pass\" type=\"button\" style=\"border-color: #ff9600 !important;\">Забыл пароль</button>
                <div class=\"alert alert-danger\" style=\"display: none;\"></div>
            </div>
        </div>
    </form>
</div>
");
    }

    public function getTemplateName()
    {
        return "applications/users/layouts/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 11,  56 => 10,  51 => 9,  44 => 7,  41 => 6,  34 => 4,  31 => 3,);
    }
}
