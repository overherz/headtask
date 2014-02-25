<?php

/* applications\users\layouts\elements/mailconfirm.html */
class __TwigTemplate_cb9d15c49b1003287901b3855f867352ddb810669047717c3c55edd1c94962a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
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
    public function block_body($context, array $blocks = array())
    {
        // line 4
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 5
            echo \layout::func_from_text("Ваш адрес электронной почты подтвержден<br>
");
        } else {
            // line 7
            echo \layout::func_from_text("Ваш адрес скорее всего уже подтвержден, или у нас нет информации об этом коде.<br>
");
        }
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["msg"]) ? $context["msg"] : null), "html", null, true));
        echo \layout::func_from_text("<br>
");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true));
        echo \layout::func_from_text("
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
        return array (  45 => 10,  41 => 9,  37 => 7,  33 => 5,  31 => 4,  28 => 3,);
    }
}
