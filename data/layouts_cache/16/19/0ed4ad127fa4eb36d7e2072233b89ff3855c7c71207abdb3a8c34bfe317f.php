<?php

/* applications\users\layouts\elements/invite_mail.html */
class __TwigTemplate_16190ed4ad127fa4eb36d7e2072233b89ff3855c7c71207abdb3a8c34bfe317f extends Twig_Template
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
        echo \layout::func_from_text("<div>Данное письмо является приглашением на ");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true));
        echo \layout::func_from_text("</div>
<div>Если Вы отказываетесь принять приглашение, то просто проигнорируйте данное письмо.</div>

<div style=\"margin-top:20px;\">Чтобы принять приглашение, перейдите по ссылке <a href=\"http://");
        // line 4
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/users/registration/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["hash"]) ? $context["hash"] : null), "html", null, true));
        echo \layout::func_from_text("/\">http://");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/users/registration/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["hash"]) ? $context["hash"] : null), "html", null, true));
        echo \layout::func_from_text("/</a></div>");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\elements/invite_mail.html";
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
