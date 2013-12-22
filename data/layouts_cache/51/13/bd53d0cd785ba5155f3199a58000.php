<?php

/* /applications/projects/layouts/news/news_element.html */
class __TwigTemplate_5113bd53d0cd785ba5155f3199a58000 extends Twig_Template
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
        echo \layout::func_from_text("<tr id=\"news");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <td><a href=\"/projects/news/show/");
        // line 2
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</a></td>
    <td>");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td><a href=\"/users/~");
        // line 4
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "author"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "color"), "html", null, true));
        echo \layout::func_from_text(";font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("</a><div class=\"nickname\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "nickname"), "html", null, true));
        echo \layout::func_from_text("</div></td>
    ");
        // line 5
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "news")) {
            // line 6
            echo \layout::func_from_text("    <td style=\"width: 1px;\">
        <div class=\"btn-group\">
            <a class=\"btn btn-purple btn-small\" href=\"/projects/news/edit/");
            // line 8
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"icon-pencil icon-white\"></i></a>
            <a class=\"btn btn-purple btn-small\" delete_news=");
            // line 9
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text(" href=\"\"><i class=\"icon-trash icon-white\"></i></a>
        </div>
    </td>
    ");
        }
        // line 13
        echo \layout::func_from_text("</tr>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/news/news_element.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 13,  56 => 9,  52 => 8,  48 => 6,  46 => 5,  34 => 4,  30 => 3,  24 => 2,  19 => 1,);
    }
}
