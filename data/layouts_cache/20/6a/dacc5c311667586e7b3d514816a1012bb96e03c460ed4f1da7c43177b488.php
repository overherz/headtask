<?php

/* /applications/logs/layouts/admin/table.html */
class __TwigTemplate_206adacc5c311667586e7b3d514816a1012bb96e03c460ed4f1da7c43177b488 extends Twig_Template
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
        $this->env->loadTemplate("/source/admin/jpaginator_boot.html")->display($context);
        // line 2
        echo \layout::func_from_text("<table class=\"table table-bordered table-striped table-condensed mt15\">
    <thead>
        <tr>
            <th width=\"200\">Тип</th>
            <th width=\"300\">Пользователь</th>
            <th width=\"150\">Дата</th>
            <th width=\"150\">IP</th>
            <th>Описание</th>
        </tr>
    </thead>
    <tbody>
    ");
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : null));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 14
            echo \layout::func_from_text("        ");
            $this->env->loadTemplate("/applications/logs/layouts/admin/list.html")->display($context);
            // line 15
            echo \layout::func_from_text("    ");
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 16
            echo \layout::func_from_text("        <tr><td colspan=\"5\">Ничего не найдено</td></tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo \layout::func_from_text("    </tbody>
</table>
");
    }

    public function getTemplateName()
    {
        return "/applications/logs/layouts/admin/table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 18,  52 => 14,  34 => 13,  21 => 2,  19 => 1,  343 => 162,  338 => 122,  333 => 17,  325 => 163,  323 => 162,  319 => 161,  277 => 122,  268 => 115,  249 => 112,  242 => 111,  238 => 110,  212 => 86,  206 => 85,  199 => 81,  191 => 80,  187 => 79,  180 => 78,  177 => 77,  174 => 76,  171 => 75,  167 => 73,  165 => 72,  154 => 70,  151 => 69,  148 => 68,  143 => 66,  138 => 64,  130 => 63,  126 => 62,  123 => 61,  120 => 60,  117 => 59,  114 => 58,  110 => 57,  105 => 54,  94 => 52,  89 => 51,  87 => 50,  72 => 40,  68 => 16,  55 => 15,  42 => 18,  22 => 1,  131 => 32,  128 => 31,  122 => 30,  118 => 28,  99 => 53,  95 => 25,  90 => 24,  88 => 23,  83 => 22,  79 => 21,  74 => 18,  71 => 17,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  50 => 8,  43 => 6,  40 => 17,  35 => 3,  32 => 2,);
    }
}
