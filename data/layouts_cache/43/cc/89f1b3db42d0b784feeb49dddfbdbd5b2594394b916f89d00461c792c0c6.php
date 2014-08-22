<?php

/* /applications/projects/layouts/forum/topics.html */
class __TwigTemplate_43cc89f1b3db42d0b784feeb49dddfbdbd5b2594394b916f89d00461c792c0c6 extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"new_post_count\"><a href='/projects/forum/new_posts/");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("'>Новый сообщений: ");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["new_post_count"]) ? $context["new_post_count"] : null), "html", null, true));
        echo \layout::func_from_text("</a></div>
<table class=\"table table-border table-hover vert_middle table-condensed\" style=\"background: #fff;\" id=\"topics_table\">
    <tr>
        <th>Название темы</th>
        <th style=\"width:15%;\">Автор</th>
        <th style=\"width:15%;\">Статистика</th>
        <th style=\"width:15%;\">Последнее сообщение</th>
        <th style=\"width: 40px;text-align: center;\"><a class=\"btn btn-oscar btn-sm\" href=\"/projects/forum/add_topic/");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["forum"]) ? $context["forum"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("/\"><i class=\"fa fa-plus\"></i></a></th>
    </tr>
    <tbody>
    ");
        // line 12
        if (((isset($context["topics"]) ? $context["topics"] : null) || (isset($context["fixed_topics"]) ? $context["fixed_topics"] : null))) {
            // line 13
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["fixed_topics"]) ? $context["fixed_topics"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 14
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "forum/topic.html"), "method"));
                $template->display($context);
                // line 15
                echo \layout::func_from_text("    ");
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["topics"]) ? $context["topics"] : null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 17
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "forum/topic.html"), "method"));
                $template->display($context);
                // line 18
                echo \layout::func_from_text("    ");
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo \layout::func_from_text("    ");
        } else {
            // line 20
            echo \layout::func_from_text("    <td colspan=\"5\" id=\"no_file\">темы не найдены</td>
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
        return "/applications/projects/layouts/forum/topics.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 24,  121 => 22,  117 => 20,  114 => 19,  100 => 18,  96 => 17,  78 => 16,  64 => 15,  60 => 14,  42 => 13,  40 => 12,  34 => 9,  21 => 2,  19 => 1,  69 => 21,  66 => 20,  59 => 15,  56 => 14,  50 => 11,  45 => 9,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
