<?php

/* applications\projects\layouts\forum/forum.html */
class __TwigTemplate_7f17a24a9828dd2e5ad7406762ee17ac0f39dcd0a5dc198804ac8f467e5e62b0 extends Twig_Template
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
<table class=\"table table-bordered table-hover table-condensed\" id=\"tasks_table\">
    <tr>
        <th>Название раздела</th>
        <th>Статистика</th>
        <th>Последнее сообщение</th>
        ");
        // line 20
        if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
            echo \layout::func_from_text("<th></th>");
        }
        // line 21
        echo \layout::func_from_text("    </tr>
    <tbody>
    ");
        // line 23
        if ((isset($context["forums"]) ? $context["forums"] : null)) {
            // line 24
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["forums"]) ? $context["forums"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
                // line 25
                echo \layout::func_from_text("    <tr id=\"forum");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\">
        <td><a href=\"/projects/forum/show/");
                // line 26
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\" style=\"font-size: 18px;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
        <td>
            Тем: ");
                // line 28
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "count_topics"), "html", null, true));
                echo \layout::func_from_text("<br>
            Ответов: ");
                // line 29
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "count_posts"), "html", null, true));
                echo \layout::func_from_text("
        </td>
        <td>
            ");
                // line 32
                if ($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last")) {
                    // line 33
                    echo \layout::func_from_text("                <div><a href='/projects/forum/show_topic/");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "id"), "html", null, true));
                    echo \layout::func_from_text("/'>");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "name"), "html", null, true));
                    echo \layout::func_from_text("</a></div>
                <div><a href='/users/~");
                    // line 34
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "author"), "id_user"), "html", null, true));
                    echo \layout::func_from_text("/' style=\"color:");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "color"), "html", null, true));
                    echo \layout::func_from_text(";font-weight: bold;\" title=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "group_name"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "author"), "fio"), "html", null, true));
                    echo \layout::func_from_text("</a><div class=\"nickname\"> ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "author"), "nickname"), "html", null, true));
                    echo \layout::func_from_text("</div> </div>
                <div>");
                    // line 35
                    echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "last"), "created"), "d.m.Y H:i:s"), "html", null, true));
                    echo \layout::func_from_text("</div>
            ");
                } else {
                    // line 37
                    echo \layout::func_from_text("                сообщений нет
            ");
                }
                // line 39
                echo \layout::func_from_text("        </td>
        ");
                // line 40
                if ($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "forum")) {
                    // line 41
                    echo \layout::func_from_text("        <td style=\"width: 1px;\">
            <div class=\"btn-group\">
                <a class=\"btn btn-oscar btn-small\" href=\"/projects/forum/edit/");
                    // line 43
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\"><i class=\"fa fa-pencil\"></i></a>
                <a class=\"btn btn-oscar btn-small\" delete_forum=");
                    // line 44
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text(" href=\"\"><i class=\"fa fa-trash-o\"></i></a>
            </div>
        </td>
        ");
                }
                // line 48
                echo \layout::func_from_text("    </tr>
    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo \layout::func_from_text("    ");
        } else {
            // line 51
            echo \layout::func_from_text("    <td colspan=\"4\" id=\"no_file\">разделы не найдены</td>
    ");
        }
        // line 53
        echo \layout::func_from_text("    </tbody>
</table>

");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\forum/forum.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 53,  167 => 51,  164 => 50,  157 => 48,  150 => 44,  146 => 43,  142 => 41,  140 => 40,  137 => 39,  133 => 37,  128 => 35,  116 => 34,  109 => 33,  107 => 32,  101 => 29,  97 => 28,  90 => 26,  85 => 25,  80 => 24,  78 => 23,  74 => 21,  70 => 20,  58 => 14,  55 => 13,  49 => 10,  45 => 9,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
