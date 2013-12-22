<?php

/* applications\projects\layouts\news/news_mail.html */
class __TwigTemplate_2bcb52358328170c734c157aa0ee375a extends Twig_Template
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
            echo \layout::func_from_text("Изменена новость \"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["old_news_name"]) ? $context["old_news_name"] : null), "html", null, true));
            echo \layout::func_from_text("\" в проекте
");
        } else {
            // line 4
            echo \layout::func_from_text("Добавлена новость \"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["news_name"]) ? $context["news_name"] : null), "html", null, true));
            echo \layout::func_from_text("\" в проект
");
        }
        // line 6
        echo \layout::func_from_text("&nbsp;\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true));
        echo \layout::func_from_text("\" <a href=\"http://");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/projects/news/show/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["news"]) ? $context["news"] : null), "html", null, true));
        echo \layout::func_from_text("/\">http://");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
        echo \layout::func_from_text("/projects/news/show/");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["news"]) ? $context["news"] : null), "html", null, true));
        echo \layout::func_from_text("/</a>");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\news/news_mail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 6,  27 => 4,  21 => 2,  19 => 1,);
    }
}
