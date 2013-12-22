<?php

/* /applications/projects/layouts/forum/topic.html */
class __TwigTemplate_0413c1b91e4e6247703bed737f1103c6 extends Twig_Template
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
            echo \layout::func_from_text("<i class=\"icon-lock\" ");
            if ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "fixed")) {
                echo \layout::func_from_text("style=\"margin-right: 5px;\"");
            }
            echo \layout::func_from_text("></i>");
        }
        if ($this->getAttribute((isset($context["t"]) ? $context["t"] : null), "fixed")) {
            echo \layout::func_from_text("<i class=\"icon-pushpin\"></i>");
        }
        echo \layout::func_from_text(" <a href=\"/projects/forum/show_topic/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</a>
        <div class=\"nickname\">");
        // line 4
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "topic_created"), "d.m.Y H:i"), "html", null, true));
        echo \layout::func_from_text("</div>
    </td>
    <td><a href=\"/users/~");
        // line 6
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["authors"]) ? $context["authors"] : null), $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "author"), array(), "array"), "id_user"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["authors"]) ? $context["authors"] : null), $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "author"), array(), "array"), "color"), "html", null, true));
        echo \layout::func_from_text(";font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["authors"]) ? $context["authors"] : null), $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "author"), array(), "array"), "group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["authors"]) ? $context["authors"] : null), $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "author"), array(), "array"), "fio"), "html", null, true));
        echo \layout::func_from_text("</a><div class=\"nickname\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["authors"]) ? $context["authors"] : null), $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "author"), array(), "array"), "nickname"), "html", null, true));
        echo \layout::func_from_text("</div></td>
    <td>
        Ответов: ");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "count_posts"), "html", null, true));
        echo \layout::func_from_text("<br>
        Просмотров: ");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "number_of_views"), "html", null, true));
        echo \layout::func_from_text("
    </td>
    <td>
        <a href=\"/users/~");
        // line 12
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "color"), "html", null, true));
        echo \layout::func_from_text(";font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("</a><div class=\"nickname\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "nickname"), "html", null, true));
        echo \layout::func_from_text("</div>
        ");
        // line 13
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
        echo \layout::func_from_text("
    </td>
    <td style=\"width: 1px;\">
        ");
        // line 16
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
            // line 17
            echo \layout::func_from_text("            <div class=\"btn-group\">
                <a class=\"btn btn-oscar btn-small\" href=\"/projects/forum/edit_topic/");
            // line 18
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"icon-pencil icon-white\"></i></a>
                <a class=\"btn btn-oscar btn-small\" delete_topic=");
            // line 19
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["t"]) ? $context["t"] : null), "id"), "html", null, true));
            echo \layout::func_from_text(" href=\"\"><i class=\"icon-trash icon-white\"></i></a>
            </div>
        ");
        } else {
            // line 21
            echo \layout::func_from_text("&nbsp;
        ");
        }
        // line 23
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
        return array (  107 => 23,  103 => 21,  97 => 19,  93 => 18,  90 => 17,  88 => 16,  82 => 13,  70 => 12,  64 => 9,  60 => 8,  47 => 6,  42 => 4,  25 => 3,  19 => 1,);
    }
}
