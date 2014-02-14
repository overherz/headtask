<?php

/* applications\pages\layouts\admin/pages_table.html */
class __TwigTemplate_c94ea2b6f68d3a61b90a855081600a7d59417f81261574f0e0071b46077bb599 extends Twig_Template
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
        echo \layout::func_from_text("<input type=\"hidden\" name='id_page' value=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["id_page"]) ? $context["id_page"] : null), "html", null, true));
        echo \layout::func_from_text("\">
");
        // line 2
        $this->env->loadTemplate("/source/admin/jpaginator_boot.html")->display($context);
        // line 3
        echo \layout::func_from_text("<table class=\"table table-bordered table-striped table-condensed all_pages\" ");
        if ((isset($context["versions"]) ? $context["versions"] : null)) {
            echo \layout::func_from_text("style='width:900px;'");
        }
        echo \layout::func_from_text(">
    <thead>
    <tr>
        ");
        // line 6
        if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
            // line 7
            echo \layout::func_from_text("        <th width=\"250\">Название страницы</th>
        <th width=\"250\">Ссылка на страницу</th>
        ");
        }
        // line 10
        echo \layout::func_from_text("        <th width=\"1650\">Краткое описание</th>
        <th>Создано</th>
        ");
        // line 12
        if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
            echo \layout::func_from_text("<th style=\"white-space: nowrap;\">Кол-во версий</th>");
        }
        // line 13
        echo \layout::func_from_text("        ");
        if ((isset($context["versions"]) ? $context["versions"] : null)) {
            // line 14
            echo \layout::func_from_text("        <th>Статус</th>
        ");
        }
        // line 16
        echo \layout::func_from_text("        <th colspan=\"2\">Управление</th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pages"]) ? $context["pages"] : null));
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
            // line 21
            echo \layout::func_from_text("    ");
            $this->env->loadTemplate("/applications/pages/layouts/admin/pages-list.html")->display($context);
            // line 22
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
            // line 23
            echo \layout::func_from_text("    ");
            if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
                echo \layout::func_from_text("<tr><td colspan=\"8\">Ничего не найдено</td></tr>");
            }
            // line 24
            echo \layout::func_from_text("    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo \layout::func_from_text("    ");
        if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
            // line 26
            echo \layout::func_from_text("    <tr>
        <td colspan=\"6\">&nbsp;</td>
        <td colspan=\"2\"><a title=\"Добавить\" class=\"fa fa-15x fa-plus add-btn\"></a></td>
    </tr>
    ");
        }
        // line 31
        echo \layout::func_from_text("    </tbody>
</table>
");
    }

    public function getTemplateName()
    {
        return "applications\\pages\\layouts\\admin/pages_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 31,  111 => 26,  108 => 25,  102 => 24,  97 => 23,  84 => 22,  81 => 21,  63 => 20,  57 => 16,  53 => 14,  50 => 13,  46 => 12,  42 => 10,  37 => 7,  35 => 6,  26 => 3,  24 => 2,  19 => 1,);
    }
}
