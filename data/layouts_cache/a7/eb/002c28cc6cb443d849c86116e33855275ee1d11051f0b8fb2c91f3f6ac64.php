<?php

/* applications/projects/layouts/tasks/task_mail.html */
class __TwigTemplate_a7eb002c28cc6cb443d849c86116e33855275ee1d11051f0b8fb2c91f3f6ac64 extends Twig_Template
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
            echo \layout::func_from_text("Изменена задача в проекте");
            if ((isset($context["message"]) ? $context["message"] : null)) {
                echo \layout::func_from_text(". ");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true));
            }
        } else {
            // line 4
            echo \layout::func_from_text("Добавлена задача в проект
");
        }
        // line 6
        echo \layout::func_from_text("&nbsp;");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true));
        echo \layout::func_from_text(" <a href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true));
        echo \layout::func_from_text("/projects/tasks/show/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["task"]) ? $context["task"] : null), "html", null, true));
        echo \layout::func_from_text("/\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true));
        echo \layout::func_from_text("/projects/tasks/show/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["task"]) ? $context["task"] : null), "html", null, true));
        echo \layout::func_from_text("/</a>");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/tasks/task_mail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 6,  28 => 4,  21 => 2,  19 => 1,);
    }
}
