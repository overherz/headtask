<?php

/* applications\projects\layouts\tasks/comments_mail.html */
class __TwigTemplate_573db9e937ab37da20b9dff6841710707f567435622e077512826b3a63bee044 extends Twig_Template
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
        echo \layout::func_from_text("<div>Здравствуйте, <b>");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["new_comments"]) ? $context["new_comments"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("</b></div>

<div>У Вас на форумах Таскера накопились непрочитанные комментарии</div>

<br><br>
");
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["new_comments"]) ? $context["new_comments"] : null), "tasks"));
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 7
            echo \layout::func_from_text("    <div>Задача <a href=\"http://");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
            echo \layout::func_from_text("/projects/tasks/show/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id_task"), "html", null, true));
            echo \layout::func_from_text("/\"><b>");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</b></a>. Новых комментариев - ");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "count"), "html", null, true));
            echo \layout::func_from_text("</div>
");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo \layout::func_from_text("
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\tasks/comments_mail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 9,  32 => 7,  28 => 6,  19 => 1,);
    }
}
