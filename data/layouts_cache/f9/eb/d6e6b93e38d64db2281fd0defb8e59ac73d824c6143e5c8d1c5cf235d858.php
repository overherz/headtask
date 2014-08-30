<?php

/* applications/projects/layouts/files/file.html */
class __TwigTemplate_f9ebd6e6b93e38d64db2281fd0defb8e59ac73d824c6143e5c8d1c5cf235d858 extends Twig_Template
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
        echo \layout::func_from_text("</a></td>
    ");
        // line 22
        if ((!(isset($context["show_task"]) ? $context["show_task"] : null))) {
            // line 23
            echo \layout::func_from_text("    ");
            if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "delete_files") && (!(isset($context["to_task"]) ? $context["to_task"] : null)))) {
                // line 24
                echo \layout::func_from_text("    <td style=\"width: 1px;\">
        <div class=\"btn-group\">
            <a class=\"btn btn-info btn-sm\" delete_file=");
                // line 26
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true));
                echo \layout::func_from_text(" href=\"\"><i class=\"fa fa-trash-o\"></i></a>
        </div>
    </td>
    ");
            } elseif ((((!(isset($context["get_popup_files"]) ? $context["get_popup_files"] : null)) && (!$this->getAttribute((isset($context["post_data"]) ? $context["post_data"] : null), "get_popup_files"))) && (isset($context["to_task"]) ? $context["to_task"] : null))) {
                // line 30
                echo \layout::func_from_text("    <td style=\"width: 1px;\">
        <div class=\"btn-group\">
            <a class=\"btn btn-info btn-sm\" ");
                // line 32
                if ((isset($context["to_task"]) ? $context["to_task"] : null)) {
                    echo \layout::func_from_text("delete_file_from_task=");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["file"]) ? $context["file"] : null), "id"), "html", null, true));
                }
                echo \layout::func_from_text(" href=\"\"><i class=\"fa fa-trash-o\"></i></a>
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
        return "applications/projects/layouts/files/file.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 37,  128 => 36,  118 => 32,  114 => 30,  107 => 26,  103 => 24,  100 => 23,  98 => 22,  88 => 21,  84 => 20,  80 => 19,  77 => 18,  67 => 16,  59 => 14,  57 => 13,  53 => 11,  46 => 10,  38 => 8,  32 => 5,  27 => 4,  25 => 3,  19 => 1,);
    }
}
