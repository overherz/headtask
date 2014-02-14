<?php

/* applications\projects\layouts\tasks//task_mail.html */
class __TwigTemplate_2c27db5e84a8ee42d18d94a561ae7953c9ab69f5ca0a8754856bafdaadc93607 extends Twig_Template
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
        if ((isset($context["edit"]) ? $context["edit"] : null)) {
            // line 2
            echo \layout::func_from_text("Изменена задача в проекте
");
        } else {
            // line 4
            echo \layout::func_from_text("Добавлена задача в проект
");
        }
        // line 6
        echo \layout::func_from_text("&nbsp;\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true));
        echo \layout::func_from_text("\" <a href=\"http://");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/projects/tasks/show/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["task"]) ? $context["task"] : null), "html", null, true));
        echo \layout::func_from_text("/\">http://");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/projects/tasks/show/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["task"]) ? $context["task"] : null), "html", null, true));
        echo \layout::func_from_text("/</a>");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\tasks//task_mail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 6,  25 => 4,  21 => 2,  19 => 1,);
    }
}
