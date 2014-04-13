<?php

/* applications\projects\layouts\forum/mail_text.html */
class __TwigTemplate_1c41e841b062beb28580c87b7fe72e3caf8cb0e8e3dc4534260785dda5dc6580 extends Twig_Template
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
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["new_posts"]) ? $context["new_posts"] : null), 0, array(), "array"), "fio"), "html", null, true));
        echo \layout::func_from_text("</b></div>

<div>У Вас на форумах Таскера накопились непрочитанные сообщения</div>

<br><br>
");
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["new_posts"]) ? $context["new_posts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 7
            echo \layout::func_from_text("    <div>Проект <a href=\"http://");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
            echo \layout::func_from_text("/projects/forum/new_posts/");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\"><b>");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</b></a>. Новых сообщений - ");
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
        return "applications\\projects\\layouts\\forum/mail_text.html";
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
