<?php

/* applications\users\layouts\elements/activate_mail.html */
class __TwigTemplate_dd6da0bf47681c6feec03c5e605691cfcef9fcf4c0e9a58be3fd74a6866fd1f3 extends Twig_Template
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
        if ((isset($context["password"]) ? $context["password"] : null)) {
            // line 2
            echo \layout::func_from_text("    Спасибо за регистрацию!
    <div>Ваши регистрационные данные:</div>
    <div><b>Логин:</b> ");
            // line 4
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true));
            echo \layout::func_from_text("</div>
    <div><b>Пароль:</b> ");
            // line 5
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["password"]) ? $context["password"] : null), "html", null, true));
            echo \layout::func_from_text("</div>
");
        }
        // line 7
        echo \layout::func_from_text("
<div>
    Вам необходимо подтвердить email, для этого перейдите по ссылке <a href='http://");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/users/registration/?act=confirm&confirmcode=");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : null), "html", null, true));
        echo \layout::func_from_text("'>http://");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/users/registration/?act=confirm&confirmcode=");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : null), "html", null, true));
        echo \layout::func_from_text("</a>\"
</div>");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\elements/activate_mail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 9,  34 => 7,  29 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
