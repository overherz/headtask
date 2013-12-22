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
        echo \layout::func_from_text("<table class=\"controls-tbl w100\" all_pages>
    <caption>Логи ");
        // line 2
        $this->env->loadTemplate("/source/html/jpaginator.html")->display($context);
        echo \layout::func_from_text("</caption>
    <tr>
        <th width=\"200\">Тип</th>
        <th width=\"300\">Пользователь</th>
        <th width=\"150\">Дата</th>
        <th width=\"150\">IP</th>
        <th>Описание</th>
    </tr>
    ");
        // line 10
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
            // line 11
            echo \layout::func_from_text("    ");
            $this->env->loadTemplate("/applications/logs/layouts/admin/list.html")->display($context);
            // line 12
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
            // line 13
            echo \layout::func_from_text("    <tr><td colspan=\"5\">Ничего не найдено</td></tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo \layout::func_from_text("</table>
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
        return array (  67 => 13,  54 => 12,  51 => 11,  33 => 10,  22 => 2,  19 => 1,  128 => 33,  124 => 31,  118 => 30,  114 => 28,  99 => 26,  95 => 25,  90 => 24,  88 => 23,  83 => 22,  79 => 21,  74 => 15,  71 => 17,  65 => 14,  62 => 13,  56 => 10,  53 => 9,  50 => 8,  43 => 6,  40 => 5,  35 => 3,  32 => 2,);
    }
}
