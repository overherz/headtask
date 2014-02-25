<?php

/* /applications/projects/layouts/documents/documents_element.html */
class __TwigTemplate_cfde084dbdb7bbf83e2824bf843bfaaa74c976cb6b9e949178ee5772341941d9 extends Twig_Template
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
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "documents")) {
            // line 6
            echo \layout::func_from_text("    <td style=\"width: 1px;\">
        <div class=\"btn-group\">
            <a class=\"btn btn-foxtrot btn-small\" href=\"/projects/documents/edit/");
            // line 8
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\"><i class=\"fa fa-pencil\"></i></a>
            <a class=\"btn btn-foxtrot btn-small\" delete_documents=");
            // line 9
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text(" href=\"\"><i class=\"fa fa-trash-o\"></i></a>
        </div>
    </td>
    ");
        }
        // line 13
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
        return array (  63 => 13,  56 => 9,  48 => 6,  34 => 4,  30 => 3,  24 => 2,  87 => 21,  83 => 19,  79 => 17,  76 => 16,  62 => 15,  58 => 14,  40 => 13,  33 => 9,  29 => 8,  21 => 2,  19 => 1,  64 => 18,  61 => 17,  57 => 15,  55 => 14,  52 => 8,  46 => 5,  41 => 8,  38 => 12,  31 => 4,  28 => 3,);
    }
}
