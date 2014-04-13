<?php

/* applications\index\layouts\admin/login.html */
class __TwigTemplate_497cccae17bdc27c7aa69fa253a7c36fb68dbd6ab06bd312e166373486318168 extends Twig_Template
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
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"stylesheet\" href=\"/source/css/jquery.jgrowl.css\" type=\"text/css\" media=\"screen, projection\" />
        <link href=\"/source/admin/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        <link href=\"/source/admin/css/styler/style.css\" rel=\"stylesheet\" type=\"text/css\">
        <link rel=\"stylesheet\" href=\"/source/css/notifications.css\" type=\"text/css\">
        <script src=\"/source/js/jquery.min.js\"></script>
        <script>
            head.js(
             \"/source/js/jquery.jgrowl_minimized.js\",
             \"/source/js/functions.js\",
             \"/source/js/message.js\",
             \"/applications/index/source/js/login.js\"
             );
        </script>
        <style>
            body {
                background: url(/source/images/admin/login_back.jpg) no-repeat #ffffff;
            }
        </style>
    </head>
    <body>
        <div class=\"top_div\">Панель управления сайтом <a href=\"/\" target=\"_blank\">");
        // line 27
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["settings"]) ? $context["settings"] : null), "site_name"), "value"), "html", null, true));
        echo \layout::func_from_text("</a></div>

        <div class=\"container\">
            <form class=\"form-signin\" id=\"login_form\" style=\"z-index: 1403;\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\"><b>Авторизация</b></div>
                    <div class=\"panel-body\">
                        <input type=\"hidden\" name=\"act\" value=\"login\">
                        <input type=\"text\" name=\"login\" placeholder=\"Email\" style=\"width: 240px;\">
                        <input type=\"password\" name=\"password\" placeholder=\"Password\" style=\"width: 240px;\">
                        <button class=\"btn btn-success\" id=\"login\" type=\"button\" style=\"background-color: #ff9600 !important;border-color: #ff9600 !important;\">Войти</button>
                        <button class=\"btn btn-danger\" id=\"lost_pass\" type=\"button\" style=\"border-color: #ff9600 !important;\">Забыл пароль</button>
                    </div>
                </div>
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
        return array (  47 => 27,  19 => 1,);
    }
}
