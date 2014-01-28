<?php

/* applications\index\layouts\admin/login.html */
class __TwigTemplate_3bc8d8a134d5ea851cfe3a0b3de55915 extends Twig_Template
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
        echo \layout::func_from_text("<!DOCTYPE html>
<html>
    <head>
        <title>Панель управления</title>
        <script src=\"/source/js/head.min.js\"></script>
        <link rel=\"stylesheet\" href=\"/source/css/jquery.jgrowl.css\" type=\"text/css\" media=\"screen, projection\" />
        <link href=\"/source/admin/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link href=\"/source/admin/css/styler/style.css\" rel=\"stylesheet\" type=\"text/css\">
        <link rel=\"stylesheet\" href=\"/source/css/notifications.css\" type=\"text/css\">
        <script>
            head.js(
             \"/source/js/jquery.min.js\",
             \"/source/js/jquery.jgrowl_minimized.js\",
             \"/source/js/functions.js\",
             \"/source/js/message.js\",
             \"/applications/index/source/js/login.js\"
             );
        </script>
    </head>
    <body>
        <div class=\"top_div\">Панель управления сайтом <a href=\"/\" target=\"_blank\">");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "site_name"), "value"), "html", null, true));
        echo \layout::func_from_text("</a></div>
        <div class=\"container\">

            <form class=\"form-signin\" id=\"login_form\">
                <h2 class=\"form-signin-heading\">Пожалуйста, авторизуйтесь</h2>
                <input type=\"hidden\" name=\"act\" value=\"login\">
                <input type=\"text\" class=\"form-control\" placeholder=\"Email\" autofocus name=\"login\">
                <input type=\"password\" class=\"form-control\" placeholder=\"Password\" name=\"password\">
                <button class=\"btn btn-primary btn-block\" id=\"login\">Войти</button>
            </form>

        </div>
    </body>
</html>


");
    }

    public function getTemplateName()
    {
        return "applications\\index\\layouts\\admin/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 21,  19 => 1,);
    }
}
