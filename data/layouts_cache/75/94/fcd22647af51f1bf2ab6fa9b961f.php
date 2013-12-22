<?php

/* applications\pages\layouts\admin/pages_table.html */
class __TwigTemplate_7594fcd22647af51f1bf2ab6fa9b961f extends Twig_Template
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
<table class=\"controls-tbl w100 all_pages\" ");
        // line 2
        if ((isset($context["versions"]) ? $context["versions"] : null)) {
            echo \layout::func_from_text("style='width:900px;'");
        }
        echo \layout::func_from_text(">
    ");
        // line 3
        if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
            echo \layout::func_from_text("<caption>Страницы ");
            $this->env->loadTemplate("/source/html/jpaginator.html")->display($context);
            echo \layout::func_from_text("</caption>
    ");
        } else {
            // line 4
            echo \layout::func_from_text("<caption>Версии страницы \"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["page_name"]) ? $context["page_name"] : null), "html", null, true));
            echo \layout::func_from_text("\"</caption>
    ");
        }
        // line 6
        echo \layout::func_from_text("    <tr>
        ");
        // line 7
        if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
            // line 8
            echo \layout::func_from_text("        <th width=\"250\">Название страницы</th>
        <th width=\"250\">Ссылка на страницу</th>
        ");
        }
        // line 11
        echo \layout::func_from_text("        <th width=\"1650\">Краткое описание</th>
        <th>Создано</th>
        ");
        // line 13
        if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
            echo \layout::func_from_text("<th style=\"white-space: nowrap;\">Кол-во версий</th>");
        }
        // line 14
        echo \layout::func_from_text("        ");
        if ((isset($context["versions"]) ? $context["versions"] : null)) {
            // line 15
            echo \layout::func_from_text("        <th>Статус</th>
        ");
        }
        // line 17
        echo \layout::func_from_text("        <th colspan=\"2\">Управление</th>
    </tr>
    ");
        // line 19
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
            // line 20
            echo \layout::func_from_text("    ");
            $this->env->loadTemplate("/applications/pages/layouts/admin/pages-list.html")->display($context);
            // line 21
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
            // line 22
            echo \layout::func_from_text("    ");
            if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
                echo \layout::func_from_text("<tr><td colspan=\"8\">Ничего не найдено</td></tr>");
            }
            // line 23
            echo \layout::func_from_text("    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo \layout::func_from_text("    ");
        if ((!(isset($context["versions"]) ? $context["versions"] : null))) {
            // line 25
            echo \layout::func_from_text("    <tr>
        <td colspan=\"6\">&nbsp;</td>
        <td colspan=\"2\"><a title=\"Добавить\" class=\"add-btn\"></a></td>
    </tr>
    ");
        }
        // line 30
        echo \layout::func_from_text("</table>
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
        return array (  127 => 30,  120 => 25,  117 => 24,  111 => 23,  106 => 22,  93 => 21,  90 => 20,  72 => 19,  68 => 17,  64 => 15,  61 => 14,  57 => 13,  53 => 11,  48 => 8,  46 => 7,  43 => 6,  37 => 4,  30 => 3,  24 => 2,  19 => 1,);
    }
}
