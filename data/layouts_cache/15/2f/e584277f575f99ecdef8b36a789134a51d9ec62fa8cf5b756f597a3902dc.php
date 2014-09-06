<?php

/* /applications/projects/layouts/files/file.html */
class __TwigTemplate_152fe584277f575f99ecdef8b36a789134a51d9ec62fa8cf5b756f597a3902dc extends Twig_Template
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
            echo \layout::func_from_text("\" download=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
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
    <td style=\"max-width: 200px;overflow: hidden;\">
        ");
        // line 13
        if (($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "type") == "image")) {
            // line 14
            echo \layout::func_from_text("        <a href=\"/uploads/projects/projects_big/");
            echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "file")), "html", null, true));
            echo \layout::func_from_text("\" download=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
        ");
        } else {
            // line 16
            echo \layout::func_from_text("        <a href=\"/uploads/projects/");
            echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["file"]) ? $context["file"] : null), "file")), "html", null, true));
            echo \layout::func_from_text("\" download=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a>
        ");
        }
        // line 18
        echo \layout::func_from_text("    </td>
    <td>
        ");
        // line 20
        if ((twig_date_format_filter($this->env, "", "d.m.Y") == twig_date_format_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "created"), "d.m.Y"))) {
            // line 21
            echo \layout::func_from_text("            сегодня ");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "created"), "H:i"), "html", null, true));
            echo \layout::func_from_text("
        ");
        } else {
            // line 23
            echo \layout::func_from_text("            ");
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "created"), "d.m.Y H:i"), "html", null, true));
            echo \layout::func_from_text("
        ");
        }
        // line 25
        echo \layout::func_from_text("    </td>
    <td>");
        // line 26
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "size"), "html", null, true));
        echo \layout::func_from_text("</td>
    <td>
        ");
        // line 28
        if (($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user") == $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "owner"))) {
            // line 29
            echo \layout::func_from_text("        <span class=\"user_name\">я</span>
        ");
        } else {
            // line 31
            echo \layout::func_from_text("        <a href=\"/users/~");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "owner"), "html", null, true));
            echo \layout::func_from_text("/\" style=\"color:");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "color"), "html", null, true));
            echo \layout::func_from_text(";font-weight: bold;\" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "group_name"), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "fio"), "html", null, true));
            echo \layout::func_from_text("</a>
        ");
        }
        // line 33
        echo \layout::func_from_text("    </td>
    ");
        // line 34
        if ((!(isset($context["show_task"]) ? $context["show_task"] : null))) {
            // line 35
            echo \layout::func_from_text("    ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_files") && (!(isset($context["to_task"]) ? $context["to_task"] : null)))) {
                // line 36
                echo \layout::func_from_text("    <td style=\"width: 1px;\">
        <div class=\"btn-group\">
            <a class=\"btn btn-info btn-sm\" delete_file=");
                // line 38
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true));
                echo \layout::func_from_text(" href=\"\"><i class=\"fa fa-trash-o\"></i></a>
        </div>
    </td>
    ");
            } elseif ((((!(isset($context["get_popup_files"]) ? $context["get_popup_files"] : null)) && (!$this->getAttribute((isset($context["post_data"]) ? $context["post_data"] : null), "get_popup_files"))) && (isset($context["to_task"]) ? $context["to_task"] : null))) {
                // line 42
                echo \layout::func_from_text("    <td style=\"width: 1px;\">
        <div class=\"btn-group\">
            <a class=\"btn btn-info btn-sm\" ");
                // line 44
                if ((isset($context["to_task"]) ? $context["to_task"] : null)) {
                    echo \layout::func_from_text("delete_file_from_task=");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true));
                }
                echo \layout::func_from_text(" href=\"\"><i class=\"fa fa-trash-o\"></i></a>
        </div>
    </td>
    ");
            }
            // line 48
            echo \layout::func_from_text("    ");
        }
        // line 49
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
        return array (  159 => 49,  156 => 48,  146 => 44,  142 => 42,  135 => 38,  131 => 36,  128 => 35,  126 => 34,  123 => 33,  111 => 31,  107 => 29,  105 => 28,  100 => 26,  97 => 25,  91 => 23,  85 => 21,  83 => 20,  79 => 18,  69 => 16,  59 => 14,  57 => 13,  53 => 11,  46 => 10,  38 => 8,  32 => 5,  27 => 4,  25 => 3,  19 => 1,);
    }
}
