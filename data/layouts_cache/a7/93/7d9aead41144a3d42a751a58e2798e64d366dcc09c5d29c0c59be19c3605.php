<?php

/* /applications/logs/layouts/admin/table.html */
class __TwigTemplate_a7937d9aead41144a3d42a751a58e2798e64d366dcc09c5d29c0c59be19c3605 extends Twig_Template
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
        return array (  75 => 18,  52 => 14,  34 => 13,  21 => 2,  19 => 1,  525 => 345,  520 => 288,  515 => 17,  505 => 346,  503 => 345,  445 => 289,  443 => 288,  435 => 282,  416 => 279,  409 => 278,  405 => 277,  237 => 111,  231 => 110,  224 => 106,  216 => 105,  212 => 104,  205 => 103,  202 => 102,  199 => 101,  196 => 100,  192 => 98,  190 => 97,  179 => 95,  176 => 94,  173 => 93,  168 => 91,  163 => 89,  155 => 88,  151 => 87,  148 => 86,  145 => 85,  142 => 84,  139 => 83,  135 => 82,  130 => 79,  124 => 78,  119 => 77,  114 => 76,  112 => 75,  72 => 40,  68 => 16,  55 => 15,  42 => 18,  22 => 1,  131 => 32,  128 => 31,  122 => 30,  118 => 28,  99 => 26,  95 => 25,  90 => 24,  88 => 23,  83 => 22,  79 => 21,  74 => 18,  71 => 17,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  50 => 8,  43 => 6,  40 => 17,  35 => 3,  32 => 2,);
    }
}
