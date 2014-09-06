<?php

/* /applications/projects/layouts/documents/documents_element.html */
class __TwigTemplate_0e9b309ad9bde426e0aec278cd93169bb7e600cf7b7648e71f10a735b0c11df8 extends Twig_Template
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
        echo \layout::func_from_text("<tr id=\"documents");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <td><a href=\"/projects/documents/show/");
        // line 2
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</a></td>
    <td>
        ");
        // line 4
        if ((twig_date_format_filter($this->env, "", "d.m.Y") == twig_date_format_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "created"), "d.m.Y"))) {
            // line 5
            echo \layout::func_from_text("            сегодня ");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "created"), "H:i"), "html", null, true));
            echo \layout::func_from_text("
        ");
        } else {
            // line 7
            echo \layout::func_from_text("            ");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "created"), "d.m.Y H:i"), "html", null, true));
            echo \layout::func_from_text("
        ");
        }
        // line 9
        echo \layout::func_from_text("    </td>
    <td>
        ");
        // line 11
        if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user") == $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "author"))) {
            // line 12
            echo \layout::func_from_text("            <span class=\"user_name\">я</span>
        ");
        } else {
            // line 14
            echo \layout::func_from_text("            <a href=\"/users/~");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "author"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(";font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</a>
        ");
        }
        // line 16
        echo \layout::func_from_text("    </td>
    ");
        // line 17
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "documents")) {
            // line 18
            echo \layout::func_from_text("    <td style=\"width: 75px;\">
        <div class=\"btn-group\">
            <a class=\"btn btn-foxtrot btn-sm\" href=\"/projects/documents/edit/");
            // line 20
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"fa fa-pencil\"></i></a>
            <a class=\"btn btn-foxtrot btn-sm\" delete_documents=");
            // line 21
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text(" href=\"\"><i class=\"fa fa-trash-o\"></i></a>
        </div>
    </td>
    ");
        }
        // line 25
        echo \layout::func_from_text("</tr>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/documents/documents_element.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 21,  72 => 18,  70 => 17,  67 => 16,  55 => 14,  51 => 12,  45 => 9,  24 => 2,  87 => 25,  83 => 19,  79 => 17,  76 => 20,  62 => 15,  40 => 13,  38 => 12,  33 => 5,  29 => 8,  21 => 2,  19 => 1,  61 => 16,  58 => 14,  54 => 13,  52 => 12,  49 => 11,  43 => 8,  39 => 7,  36 => 6,  31 => 4,  28 => 3,);
    }
}
