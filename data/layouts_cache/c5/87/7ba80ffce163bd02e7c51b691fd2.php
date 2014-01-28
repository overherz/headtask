<?php

/* /applications/logs/layouts/admin/table.html */
class __TwigTemplate_c5877ba80ffce163bd02e7c51b691fd2 extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table table-bordered table-striped table-condensed\">
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
        return array (  75 => 18,  68 => 16,  55 => 15,  52 => 14,  34 => 13,  19 => 1,  537 => 366,  532 => 301,  522 => 367,  520 => 366,  454 => 302,  452 => 301,  444 => 295,  425 => 292,  418 => 291,  414 => 290,  247 => 125,  241 => 124,  234 => 120,  226 => 119,  222 => 118,  215 => 117,  212 => 116,  209 => 115,  206 => 114,  202 => 112,  200 => 111,  189 => 109,  186 => 108,  183 => 107,  178 => 105,  173 => 103,  165 => 102,  161 => 101,  158 => 100,  155 => 99,  152 => 98,  149 => 97,  145 => 96,  140 => 93,  129 => 91,  122 => 89,  82 => 54,  78 => 53,  21 => 2,  142 => 43,  134 => 92,  128 => 36,  124 => 90,  105 => 32,  101 => 31,  96 => 30,  94 => 29,  89 => 28,  85 => 27,  74 => 18,  71 => 17,  65 => 43,  62 => 13,  56 => 10,  53 => 9,  50 => 8,  43 => 6,  40 => 5,  35 => 3,  32 => 2,);
    }
}
