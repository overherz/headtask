<?php

/* /applications/projects/layouts/files/file.html */
class __TwigTemplate_24c3f1fe31458e23dda83b29f226ceda extends Twig_Template
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
        echo \layout::func_from_text("<tr id=\"file");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <td style=\"width: 1px;text-align:center;\">
        ");
        // line 3
        if (($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "type") == "image")) {
            // line 4
            echo \layout::func_from_text("            <a href=\"/uploads/projects/projects_big/");
            echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "file")), "html", null, true));
            echo \layout::func_from_text("\" class=\"fancybox\" rel=\"main\">
                <img src=\"/uploads/projects/projects_small/");
            // line 5
            echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "file")), "html", null, true));
            echo \layout::func_from_text("\">
            </a>
        ");
        } else {
            // line 8
            echo \layout::func_from_text("            <a href=\"/uploads/projects/");
            echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "file")), "html", null, true));
            echo \layout::func_from_text("\"><img src=\"/source/images/icons/file.png\"></a>
        ");
        }
        // line 10
        echo \layout::func_from_text("        ");
        if (((!(isset($context["get_popup_files"]) ? $context["get_popup_files"] : null)) && (!$this->getAttribute((isset($context["post_data"]) ? $context["post_data"] : null), "get_popup_files")))) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"files[]\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 11
        echo \layout::func_from_text("    </td>
    <td>
        ");
        // line 13
        if (($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "type") == "image")) {
            // line 14
            echo \layout::func_from_text("        <a href=\"/uploads/projects/projects_big/");
            echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "file")), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
        ");
        } else {
            // line 16
            echo \layout::func_from_text("        <a href=\"/uploads/projects/");
            echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "file")), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
        ");
        }
        // line 18
        echo \layout::func_from_text("    </td>
    <td>");
        // line 19
        echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "created"), "d.m.Y H:i:s"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>");
        // line 20
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "size"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td><a href=\"/users/~");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "owner"), "html", null, true));
        echo \layout::func_from_text("/\" style=\"color:");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "color"), "html", null, true));
        echo \layout::func_from_text(";font-weight: bold;\" title=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "group_name"), "html", null, true));
        echo \layout::func_from_text("\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("</a><div class=\"nickname\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "nickname"), "html", null, true));
        echo \layout::func_from_text("</div></td>
    ");
        // line 22
        if ((!(isset($context["show_task"]) ? $context["show_task"] : null))) {
            // line 23
            echo \layout::func_from_text("    ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_files") && (!(isset($context["to_task"]) ? $context["to_task"] : null)))) {
                // line 24
                echo \layout::func_from_text("    <td style=\"width: 1px;\">
        <div class=\"btn-group\">
            <a class=\"btn btn-info btn-small\" delete_file=");
                // line 26
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true));
                echo \layout::func_from_text(" href=\"\"><i class=\"icon-trash icon-white\"></i></a>
        </div>
    </td>
    ");
            } elseif ((((!(isset($context["get_popup_files"]) ? $context["get_popup_files"] : null)) && (!$this->getAttribute((isset($context["post_data"]) ? $context["post_data"] : null), "get_popup_files"))) && (isset($context["to_task"]) ? $context["to_task"] : null))) {
                // line 30
                echo \layout::func_from_text("    <td style=\"width: 1px;\">
        <div class=\"btn-group\">
            <a class=\"btn btn-info btn-small\" ");
                // line 32
                if ((isset($context["to_task"]) ? $context["to_task"] : null)) {
                    echo \layout::func_from_text("delete_file_from_task=");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true));
                }
                echo \layout::func_from_text(" href=\"\"><i class=\"icon-trash icon-white\"></i></a>
        </div>
    </td>
    ");
            }
            // line 36
            echo \layout::func_from_text("    ");
        }
        // line 37
        echo \layout::func_from_text("</tr>");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/files/file.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 37,  126 => 36,  116 => 32,  112 => 30,  105 => 26,  101 => 24,  98 => 23,  96 => 22,  84 => 21,  80 => 20,  76 => 19,  73 => 18,  65 => 16,  57 => 14,  55 => 13,  51 => 11,  44 => 10,  38 => 8,  32 => 5,  27 => 4,  25 => 3,  19 => 1,);
    }
}
