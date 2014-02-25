<?php

/* applications\users\layouts\elements/change_email.html */
class __TwigTemplate_c313912ea71e50a58f8157646495def232bcbf9a96595de164d8aa01b44578eb extends Twig_Template
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
        echo \layout::func_from_text("Вы запросили смену адреса электронной почты.
Для этого необходимо подтвердить свои действия, перейдя по <a href='http://");
        // line 2
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/users/mailconfirm/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["code"]) ? $context["code"] : null), "html", null, true));
        echo \layout::func_from_text("/'>этой ссылке</a>");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\elements/change_email.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
