<?php

/* applications\mail\layouts\index.html */
class __TwigTemplate_796843be63963d0ca8d8e0f31bd3ab38 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
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

    // line 2
    public function block_css($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "mail__css"), "html", null, true));
        echo \layout::func_from_text("mail.css\">
");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("<script>
    \$(document).ready(function(\$)
    {
        \$(\"[name='yandex_mail']\").submit();
    });
</script>
");
    }

    // line 14
    public function block_context($context, array $blocks = array())
    {
        // line 15
        echo \layout::func_from_text("    Подождите, выполняется вход...
    <form method=\"post\" action=\"https://passport.yandex.ru/for/cube-in-cube.ru?mode=auth\" name=\"yandex_mail\" style=\"display: none;\">

        <div class=\"label\">Логин:</div>
        <input type=\"text\" name=\"login\" value=\"");
        // line 19
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "email_login"), "html", null, true));
        echo \layout::func_from_text("\" tabindex=\"1\"/>
        <div class=\"label\">Пароль:</div>
        <input type=\"hidden\" name=\"retpath\" value=\"http://mail.yandex.ru/for/cube-in-cube.ru\">
        <input type=\"password\" name=\"passwd\" value=\"");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "email_password"), "html", null, true));
        echo \layout::func_from_text("\" maxlength=\"100\" tabindex=\"2\"/> <br>

        <label for=\"a\"><input type=\"checkbox\" name=\"twoweeks\" id=\"a\" value=\"yes\" tabindex=\"4\"/>запомнить
            меня</label> (<a href=\"http://help.yandex.ru/passport/?id=922493\">что это</a>)

        <input type=\"submit\" name=\"In\" value=\"Войти\" tabindex=\"5\"/> </form>
");
    }

    public function getTemplateName()
    {
        return "applications\\mail\\layouts\\index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 22,  62 => 19,  56 => 15,  53 => 14,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
