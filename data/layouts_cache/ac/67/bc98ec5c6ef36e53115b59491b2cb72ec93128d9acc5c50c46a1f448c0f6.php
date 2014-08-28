<?php

/* applications/projects/layouts/forum/forum.html */
class __TwigTemplate_ac67bc98ec5c6ef36e53115b59491b2cb72ec93128d9acc5c50c46a1f448c0f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'js' => array($this, 'block_js'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("Проект \"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script type =\"text/javascript\" src=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "forum.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script src=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 13
    public function block_project_data($context, array $blocks = array())
    {
        // line 14
        echo \layout::func_from_text("<div class=\"new_post_count\"><a href='/projects/forum/new_posts/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("'>Новый сообщений: ");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["new_post_count"]) ? $context["new_post_count"] : null), "html", null, true));
        echo \layout::func_from_text("</a></div>
<table class=\"table table-hover table_style no_padding_right\" id=\"tasks_table\">
    <thead>
    <tr>
        <th>Название раздела</th>
        <th>Статистика</th>
        <th>Последнее сообщение</th>
        ");
        // line 21
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
            echo \layout::func_from_text("<th></th>");
        }
        // line 22
        echo \layout::func_from_text("    </tr>
    </thead>
    <tbody>
    ");
        // line 25
        if ((isset($context["forums"]) ? $context["forums"] : null)) {
            // line 26
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["forums"]) ? $context["forums"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
                // line 27
                echo \layout::func_from_text("    <tr id=\"forum");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\">
        <td><a href=\"/projects/forum/show/");
                // line 28
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"font-size: 18px;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
        <td>
            Тем: ");
                // line 30
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "count_topics"), "html", null, true));
                echo \layout::func_from_text("<br>
            Ответов: ");
                // line 31
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "count_posts"), "html", null, true));
                echo \layout::func_from_text("
        </td>
        <td>
            ");
                // line 34
                if ($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last")) {
                    // line 35
                    echo \layout::func_from_text("                <div><a href='/projects/forum/show_topic/");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "id"), "html", null, true));
                    echo \layout::func_from_text("/'>");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "name"), "html", null, true));
                    echo \layout::func_from_text("</a></div>
                <div><a href='/users/~");
                    // line 36
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "author"), "id_user"), "html", null, true));
                    echo \layout::func_from_text("/' style=\"color:");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "color"), "html", null, true));
                    echo \layout::func_from_text(";font-weight: bold;\" title=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "group_name"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "author"), "fio"), "html", null, true));
                    echo \layout::func_from_text("</a></div>
                <div>");
                    // line 37
                    echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "created"), "d.m.Y H:i:s"), "html", null, true));
                    echo \layout::func_from_text("</div>
            ");
                } else {
                    // line 39
                    echo \layout::func_from_text("                сообщений нет
            ");
                }
                // line 41
                echo \layout::func_from_text("        </td>
        ");
                // line 42
                if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
                    // line 43
                    echo \layout::func_from_text("        <td style=\"width: 75px;\">
            <div class=\"btn-group\">
                <a class=\"btn btn-oscar btn-sm\" href=\"/projects/forum/edit/");
                    // line 45
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\"><i class=\"fa fa-pencil\"></i></a>
                <a class=\"btn btn-oscar btn-sm\" delete_forum=");
                    // line 46
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text(" href=\"\"><i class=\"fa fa-trash-o\"></i></a>
            </div>
        </td>
        ");
                }
                // line 50
                echo \layout::func_from_text("    </tr>
    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo \layout::func_from_text("    ");
        } else {
            // line 53
            echo \layout::func_from_text("    <td colspan=\"4\" id=\"no_file\">разделы не найдены</td>
    ");
        }
        // line 55
        echo \layout::func_from_text("    </tbody>
</table>

");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/forum/forum.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 55,  167 => 53,  164 => 52,  157 => 50,  150 => 46,  146 => 45,  142 => 43,  140 => 42,  137 => 41,  133 => 39,  128 => 37,  118 => 36,  111 => 35,  109 => 34,  103 => 31,  99 => 30,  92 => 28,  87 => 27,  82 => 26,  80 => 25,  75 => 22,  71 => 21,  58 => 14,  55 => 13,  49 => 10,  45 => 9,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
