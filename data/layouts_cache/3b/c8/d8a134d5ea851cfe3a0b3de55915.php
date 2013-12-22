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
        echo \layout::func_from_text("<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html>
    <head>
        <title>Панель управления</title>
        <script src=\"/source/js/head.min.js\"></script>
        <link rel=\"stylesheet\" href=\"/source/css/jquery.jgrowl.css\" type=\"text/css\" media=\"screen, projection\" />
        <script src=\"http://yandex.st/jquery/1.8.3/jquery.min.js\"></script>
        <script>
            head.js(
             \"http://yandex.st/jquery-ui/1.10.0/jquery-ui.min.js\",
             \"/source/js/jquery.jgrowl_minimized.js\",
             \"/source/js/functions.js\",
             \"/source/js/message.js\",
             \"/applications/index/source/js/login.js\"
             );
        </script>
        <link rel=\"stylesheet\" href=\"/source/css/admin.css\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"/source/css/notifications.css\" type=\"text/css\">
    </head>
    <body style=\"height: auto;\">
    <div class=\"admin_logo\"><img src=\"");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "index", 1 => "admin_logo.png"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></div>
    <div class=\"login_title\">Система управления сайтом</div>
    <center>
        <div class=\"login_block\">
            <form id=\"login_form\">
                <input type=\"hidden\" name=\"act\" value=\"login\">
                <table class=\"login_form\" cellspacing=\"0\" cellpadding=\"0\">
                    <tr>
                        <td class=\"login_form_title\">логин:&nbsp;</td>
                        <td><input type=\"text\" name=\"login\" class=\"input\"></td>
                    </tr>
                    <tr>
                        <td style=\"padding-top:12px;\" class=\"login_form_title\">пароль:&nbsp;</td>
                        <td style=\"padding-top:12px;\"><input type=\"password\" name=\"password\" class=\"input\"></td>
                    </tr>
                    <tr>
                        <td colspan=\"2\" style=\"padding-top:10px;\" align=\"right\"><input type=\"button\" value=\"Войти\" class=\"button\" id=\"login\"></td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
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
