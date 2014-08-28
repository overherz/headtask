<?php

/* /applications/projects/layouts/forum/topic.html */
class __TwigTemplate_09f3f38a8e1451cc7f6c259159ccd68ab5b89de4a7cf3b3585bf258f5c4ee465 extends Twig_Template
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
        echo \layout::func_from_text("<tr id=\"topic");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <td>
        ");
        // line 3
        if ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "closed")) {
            echo \layout::func_from_text("<i class=\"fa fa-lock\" ");
            if ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "fixed")) {
                echo \layout::func_from_text("style=\"margin-right: 5px;\"");
            }
            echo \layout::func_from_text("></i>");
        }
        if ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "fixed")) {
            echo \layout::func_from_text("<i class=\"fa fa-thumb-tack\"></i>");
        }
        echo \layout::func_from_text(" <a href=\"/projects/forum/show_topic/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</a>
    </td>
    <td><a href=\"/users/~");
        // line 5
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["authors"]) ? $context["authors"] : null), $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "author"), array(), "array"), "id_user"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["authors"]) ? $context["authors"] : null), $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "author"), array(), "array"), "color"), "html", null, true));
        echo \layout::func_from_text(";font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["authors"]) ? $context["authors"] : null), $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "author"), array(), "array"), "group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["authors"]) ? $context["authors"] : null), $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "author"), array(), "array"), "fio"), "html", null, true));
        echo \layout::func_from_text("</a></td>
    <td>
        Ответов: ");
        // line 7
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "count_posts"), "html", null, true));
        echo \layout::func_from_text("<br>
        Просмотров: ");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "number_of_views"), "html", null, true));
        echo \layout::func_from_text("
    </td>
    <td>
        <div><a href=\"/users/~");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "color"), "html", null, true));
        echo \layout::func_from_text(";font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("</a></div>
        ");
        // line 12
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
        echo \layout::func_from_text("
    </td>
    <td style=\"width: 74px;\">
        ");
        // line 15
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
            // line 16
            echo \layout::func_from_text("            <div class=\"btn-group\">
                <a class=\"btn btn-oscar btn-sm\" href=\"/projects/forum/edit_topic/");
            // line 17
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"fa fa-pencil\"></i></a>
                <a class=\"btn btn-oscar btn-sm\" delete_topic=");
            // line 18
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"), "html", null, true));
            echo \layout::func_from_text(" href=\"\"><i class=\"fa fa-trash-o\"></i></a>
            </div>
        ");
        } else {
            // line 20
            echo \layout::func_from_text("&nbsp;
        ");
        }
        // line 22
        echo \layout::func_from_text("    </td>
</tr>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/forum/topic.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 22,  95 => 20,  89 => 18,  85 => 17,  82 => 16,  80 => 15,  74 => 12,  64 => 11,  58 => 8,  54 => 7,  43 => 5,  25 => 3,  19 => 1,);
    }
}
