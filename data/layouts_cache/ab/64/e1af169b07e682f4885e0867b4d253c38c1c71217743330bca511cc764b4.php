<?php

/* /applications/projects/layouts/forum/new_posts_table.html */
class __TwigTemplate_ab64e1af169b07e682f4885e0867b4d253c38c1c71217743330bca511cc764b4 extends Twig_Template
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
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 2
        echo \layout::func_from_text("
");
        // line 3
        if ((isset($context["new_posts"]) ? $context["new_posts"] : null)) {
            echo \layout::func_from_text("<div class=\"new_post_count\"><a href='' class=\"set_all_read\">Отметить все прочитанным</a></div>");
        }
        // line 4
        echo \layout::func_from_text("<table class=\"table table-border table-hover vert_middle table-condensed\" style=\"background: #fff;\" id=\"tasks_table\">
    <thead>
    <tr>
        <th>Название форума</th>
        <th>Название темы</th>
        <th style=\"width: 1px;white-space: nowrap;\">Количество новых сообщений</th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 13
        if ((isset($context["new_posts"]) ? $context["new_posts"] : null)) {
            // line 14
            echo \layout::func_from_text("        ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["new_posts"]) ? $context["new_posts"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
                // line 15
                echo \layout::func_from_text("            <tr>
                <td><a href=\"/projects/forum/show/");
                // line 16
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "forum_id"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "forum_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
                <td><a href=\"/projects/forum/show_topic/");
                // line 17
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "topic_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
                <td>");
                // line 18
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "count"), "html", null, true));
                echo \layout::func_from_text("</td>
            </tr>
        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo \layout::func_from_text("    ");
        } else {
            // line 22
            echo \layout::func_from_text("        <td colspan=\"3\" id=\"no_file\">Новые сообщений отсутствуют</td>
    ");
        }
        // line 24
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 26
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/forum/new_posts_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 26,  77 => 24,  73 => 22,  70 => 21,  61 => 18,  55 => 17,  49 => 16,  46 => 15,  41 => 14,  39 => 13,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
