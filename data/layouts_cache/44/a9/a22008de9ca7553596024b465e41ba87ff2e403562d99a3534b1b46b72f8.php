<?php

/* applications\users\layouts\elements/recovery_mail.html */
class __TwigTemplate_44a9a22008de9ca7553596024b465e41ba87ff2e403562d99a3534b1b46b72f8 extends Twig_Template
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
        echo \layout::func_from_text("<div>Кто-то (возможно, Вы) запросил смену пароля от Вашего аккаунта на сайте ");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true));
        echo \layout::func_from_text("</div>
<div>Если это были не Вы, просто проигнорируйте данное письмо.</div>

<div style=\"margin-top:20px;\">Если же Вы действительно хотите изменить свой пароль, то перейдите по ссылке <a href=\"http://");
        // line 4
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/users/recovery/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["hash"]) ? $context["hash"] : null), "html", null, true));
        echo \layout::func_from_text("/\">http://");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/users/recovery/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["hash"]) ? $context["hash"] : null), "html", null, true));
        echo \layout::func_from_text("/</a></div>
<div>Ссылка будет действительна в течение часа.</div>");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\elements/recovery_mail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 4,  19 => 1,);
    }
}
