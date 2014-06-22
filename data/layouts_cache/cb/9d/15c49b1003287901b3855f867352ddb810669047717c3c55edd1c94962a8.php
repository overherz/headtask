<?php

/* applications\users\layouts\elements/mailconfirm.html */
class __TwigTemplate_cb9d15c49b1003287901b3855f867352ddb810669047717c3c55edd1c94962a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index2.html");

        $this->blocks = array(
            'info_title' => array($this, 'block_info_title'),
            'info' => array($this, 'block_info'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/wrapper_index2.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_info_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("    Подтверждение email
");
    }

    // line 7
    public function block_info($context, array $blocks = array())
    {
        // line 8
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 9
            echo \layout::func_from_text("    <div class=\"alert alert-success\">Ваш адрес электронной почты подтвержден</div>
<span
");
        } else {
            // line 12
            echo \layout::func_from_text("    <div class=\"alert alert-danger\">Ваш адрес скорее всего уже подтвержден, или у нас нет информации об этом коде</div>
");
        }
        // line 14
        echo \layout::func_from_text("<div>");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["msg"]) ? $context["msg"] : null), "html", null, true));
        echo \layout::func_from_text("</div>
<div>");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true));
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\elements/mailconfirm.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 15,  51 => 14,  47 => 12,  42 => 9,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
