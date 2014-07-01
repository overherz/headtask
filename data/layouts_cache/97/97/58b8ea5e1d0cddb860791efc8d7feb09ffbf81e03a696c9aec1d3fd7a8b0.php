<?php

/* /applications/projects/layouts/tasks/tasks_table.html */
class __TwigTemplate_979758b8ea5e1d0cddb860791efc8d7feb09ffbf81e03a696c9aec1d3fd7a8b0 extends Twig_Template
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
        <th></th>
        <th>Название</th>
        <th>Статус</th>
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
        return array (  84 => 10,  80 => 8,  210 => 40,  201 => 39,  191 => 38,  188 => 37,  181 => 34,  171 => 33,  163 => 32,  160 => 31,  158 => 30,  155 => 29,  145 => 28,  137 => 27,  134 => 26,  120 => 23,  109 => 21,  107 => 20,  104 => 19,  88 => 15,  70 => 13,  59 => 11,  55 => 9,  45 => 8,  37 => 15,  23 => 3,  94 => 22,  79 => 18,  76 => 17,  62 => 12,  57 => 17,  50 => 9,  47 => 8,  21 => 1,  56 => 8,  38 => 4,  27 => 6,  75 => 19,  61 => 18,  48 => 6,  24 => 3,  22 => 2,  19 => 1,  139 => 54,  130 => 24,  128 => 54,  117 => 46,  108 => 23,  100 => 18,  83 => 31,  81 => 19,  74 => 27,  44 => 7,  41 => 5,  34 => 2,  31 => 2,  78 => 20,  71 => 26,  68 => 15,  54 => 10,  51 => 12,  43 => 4,  40 => 3,  33 => 4,  30 => 5,  115 => 45,  112 => 22,  102 => 37,  98 => 35,  92 => 17,  90 => 36,  86 => 24,  82 => 22,  77 => 27,  73 => 26,  65 => 6,  63 => 19,  60 => 12,  52 => 13,  49 => 6,  42 => 8,  39 => 16,  32 => 5,  29 => 3,);
    }
}
