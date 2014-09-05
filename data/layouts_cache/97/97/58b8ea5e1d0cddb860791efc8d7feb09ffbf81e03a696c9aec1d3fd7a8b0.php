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
        echo \layout::func_from_text("</div>
<table class=\"table table-hover table_style no_padding_right\" id=\"tasks_table\">
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
        // line 14
        if ((isset($context["tasks"]) ? $context["tasks"] : null)) {
            // line 15
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
                // line 16
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/task.html"), "method"));
                $template->display($context);
                // line 17
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
            // line 18
            echo \layout::func_from_text("    ");
        } else {
            // line 19
            echo \layout::func_from_text("    <td colspan=\"6\" id=\"no_file\">задач нет</td>
    ");
        }
        // line 21
        echo \layout::func_from_text("    </tbody>
</table>
");
        // line 23
        $this->env->loadTemplate("/source/jpaginator_boot_if.html")->display($context);
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
        return array (  36 => 14,  119 => 16,  116 => 15,  94 => 12,  43 => 4,  40 => 3,  210 => 40,  191 => 38,  171 => 33,  163 => 32,  158 => 30,  145 => 28,  137 => 27,  130 => 24,  120 => 23,  109 => 21,  100 => 18,  88 => 15,  59 => 11,  37 => 7,  23 => 3,  78 => 14,  30 => 5,  106 => 21,  92 => 17,  84 => 10,  79 => 17,  77 => 19,  74 => 18,  60 => 17,  58 => 10,  48 => 6,  25 => 4,  21 => 1,  55 => 9,  33 => 4,  26 => 3,  22 => 2,  190 => 54,  184 => 53,  181 => 34,  176 => 49,  155 => 29,  151 => 46,  146 => 44,  143 => 43,  140 => 42,  134 => 26,  127 => 34,  125 => 33,  112 => 22,  104 => 19,  102 => 26,  99 => 13,  86 => 21,  81 => 21,  71 => 18,  35 => 12,  19 => 1,  220 => 117,  215 => 31,  211 => 24,  208 => 23,  205 => 22,  201 => 39,  198 => 15,  193 => 4,  188 => 37,  186 => 117,  183 => 116,  177 => 113,  173 => 112,  169 => 111,  165 => 110,  162 => 109,  160 => 31,  156 => 106,  113 => 65,  111 => 64,  89 => 47,  85 => 23,  82 => 45,  66 => 13,  64 => 31,  47 => 17,  45 => 8,  24 => 3,  75 => 8,  70 => 13,  68 => 17,  63 => 14,  61 => 5,  54 => 22,  34 => 2,  51 => 9,  44 => 6,  41 => 14,  38 => 15,  31 => 11,  28 => 3,  121 => 31,  118 => 47,  107 => 20,  103 => 37,  97 => 24,  95 => 50,  91 => 22,  87 => 32,  80 => 8,  76 => 19,  67 => 17,  65 => 6,  62 => 12,  56 => 16,  52 => 8,  49 => 16,  42 => 5,  39 => 5,  32 => 5,  29 => 4,);
    }
}
