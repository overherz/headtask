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
        echo \layout::func_from_text("</div>
<table class=\"table table-hover table-condensed table-border\" id=\"tasks_table\">
    <thead>
    <tr>
        <th>Название</th>
        <th>Статус</th>
        <th>Приоритет</th>
        <th>Делегировано</th>
        <th><i class=\"fa fa-calendar\"></i></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 15
        if ((isset($context["tasks"]) ? $context["tasks"] : null)) {
            // line 16
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
                // line 17
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/task.html"), "method"));
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo \layout::func_from_text("    ");
        } else {
            // line 20
            echo \layout::func_from_text("    <td colspan=\"6\" id=\"no_file\">задач нет</td>
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
        return "/applications/projects/layouts/tasks/tasks_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 22,  37 => 15,  84 => 10,  80 => 8,  211 => 41,  202 => 40,  192 => 39,  189 => 38,  182 => 35,  172 => 34,  164 => 33,  161 => 32,  159 => 31,  156 => 30,  146 => 29,  138 => 28,  135 => 27,  121 => 24,  113 => 23,  110 => 22,  105 => 20,  101 => 19,  93 => 18,  89 => 16,  63 => 13,  56 => 10,  46 => 9,  38 => 8,  35 => 7,  23 => 3,  79 => 15,  76 => 17,  62 => 13,  60 => 12,  50 => 9,  21 => 1,  58 => 10,  47 => 8,  36 => 4,  27 => 6,  75 => 19,  61 => 18,  48 => 6,  24 => 3,  22 => 2,  19 => 1,  140 => 55,  131 => 25,  129 => 55,  117 => 46,  108 => 21,  100 => 39,  92 => 37,  83 => 31,  74 => 27,  44 => 7,  41 => 5,  34 => 2,  31 => 2,  78 => 20,  71 => 14,  68 => 15,  65 => 6,  54 => 10,  51 => 12,  43 => 4,  40 => 3,  33 => 6,  30 => 5,  119 => 46,  116 => 45,  106 => 38,  102 => 36,  96 => 34,  94 => 22,  90 => 36,  86 => 24,  81 => 19,  77 => 27,  69 => 21,  67 => 20,  64 => 19,  57 => 17,  52 => 13,  49 => 7,  42 => 8,  39 => 16,  32 => 4,  29 => 3,);
    }
}
