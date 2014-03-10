<?php

/* /applications/projects/layouts/tasks/tasks_table.html */
class __TwigTemplate_7bbee2e7b851869598ae57e782ee20503b1fb6a86a352d4269c4ce17d1bd5199 extends Twig_Template
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
        echo \layout::func_from_text("<div style=\"position: relative;margin-top: 10px;\">");
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 2
        echo \layout::func_from_text("    <div style=\"position: absolute;left:0;bottom:0;\"><a href=\"\" id=\"show_filter\">Фильтр</a></div>
</div>
<table class=\"table table-hover table-condensed table-border\" id=\"tasks_table\">
    <thead>
    <tr>
        <th></th>
        <th>Название</th>
        <th>Статус</th>
        <th>Приоритет</th>
        <th>Делегировано</th>
        <th>Статус выполнения</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 17
        if ((isset($context["tasks"]) ? $context["tasks"] : null)) {
            // line 18
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
                // line 19
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/task.html"), "method"));
                $template->display($context);
                // line 20
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo \layout::func_from_text("    ");
        } else {
            // line 22
            echo \layout::func_from_text("    <td colspan=\"6\" id=\"no_file\">задач нет</td>
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
        return "/applications/projects/layouts/tasks/tasks_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 26,  84 => 24,  80 => 22,  77 => 21,  63 => 20,  59 => 19,  41 => 18,  22 => 2,  19 => 1,  108 => 44,  105 => 43,  95 => 36,  89 => 33,  85 => 32,  81 => 31,  69 => 21,  67 => 20,  64 => 19,  57 => 15,  52 => 13,  49 => 12,  42 => 8,  39 => 17,  32 => 4,  29 => 3,);
    }
}
