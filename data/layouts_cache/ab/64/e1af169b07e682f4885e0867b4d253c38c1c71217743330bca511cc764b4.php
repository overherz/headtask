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
        echo \layout::func_from_text("<table class=\"table table-bordered table-hover vert_middle table-condensed\" style=\"background: #fff;\" id=\"tasks_table\">
    <tr>
        <th>Название форума</th>
        <th>Название темы</th>
        <th style=\"width: 1px;white-space: nowrap;\">Количество новых сообщений</th>
    </tr>
    <tbody>
    ");
        // line 11
        if ((isset($context["new_posts"]) ? $context["new_posts"] : null)) {
            // line 12
            echo \layout::func_from_text("        ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["new_posts"]) ? $context["new_posts"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
                // line 13
                echo \layout::func_from_text("            <tr>
                <td><a href=\"/projects/forum/show/");
                // line 14
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "forum_id"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "forum_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
                <td><a href=\"/projects/forum/show_topic/");
                // line 15
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "topic_name"), "html", null, true));
                echo \layout::func_from_text("</a></td>
                <td>");
                // line 16
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "count"), "html", null, true));
                echo \layout::func_from_text("</td>
            </tr>
        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo \layout::func_from_text("    ");
        } else {
            // line 20
            echo \layout::func_from_text("        <td colspan=\"3\" id=\"no_file\">Новые сообщений отсутствуют</td>
    ");
        }
        // line 22
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 24
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
        return array (  79 => 24,  75 => 22,  71 => 20,  68 => 19,  53 => 15,  47 => 14,  44 => 13,  39 => 12,  37 => 11,  24 => 3,  21 => 2,  19 => 1,  69 => 21,  66 => 20,  59 => 16,  56 => 14,  50 => 11,  45 => 9,  41 => 8,  38 => 7,  31 => 4,  28 => 4,);
    }
}
