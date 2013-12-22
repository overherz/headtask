<?php

/* /applications/tasks/layouts/admin/tasks_table.html */
class __TwigTemplate_8241c0d02e06640ba88ab3376c218597 extends Twig_Template
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
    <caption>Страницы ");
        // line 2
        $this->env->loadTemplate("/source/html/jpaginator.html")->display($context);
        echo \layout::func_from_text("</caption>
    <tr>
        <th width=\"250\">Название</th>
        <th width=\"250\">Задача</th>
        <th width=\"250\">Параметры запуска</th>
        <th width=\"200\">Дата последнего старта</th>
        <th width=\"200\">Дата завершения</th>
        <th width=\"200\">Дата следующего старта</th>
        <th width=\"200\">Статус</th>
        <th>Ошибка</th>
        <th colspan=\"3\">Управление</th>
    </tr>
    ");
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
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
            // line 15
            echo \layout::func_from_text("    ");
            $this->env->loadTemplate("/applications/tasks/layouts/admin/tasks-list.html")->display($context);
            // line 16
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
            // line 17
            echo \layout::func_from_text("    <tr><td colspan=\"11\">Ничего не найдено</td></tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo \layout::func_from_text("    <tr>
        <td colspan=\"8\">&nbsp;</td>
        <td colspan=\"3\"><a title=\"Добавить\" class=\"add-btn\"></a></td>
    </tr>        
</table>
");
    }

    public function getTemplateName()
    {
        return "/applications/tasks/layouts/admin/tasks_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 19,  71 => 17,  58 => 16,  55 => 15,  37 => 14,  22 => 2,  19 => 1,  149 => 39,  146 => 38,  142 => 36,  138 => 34,  132 => 33,  128 => 31,  113 => 29,  109 => 28,  104 => 27,  102 => 26,  97 => 25,  93 => 24,  86 => 19,  77 => 17,  73 => 16,  70 => 15,  68 => 14,  65 => 13,  59 => 11,  56 => 10,  53 => 9,  47 => 7,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
