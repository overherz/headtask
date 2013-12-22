<?php

/* /applications/options/layouts/admin/options_table.html */
class __TwigTemplate_656b3bfe44b6f430fdff58aef40955f2 extends Twig_Template
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
        if ((isset($context["options"]) ? $context["options"] : null)) {
            // line 2
            echo \layout::func_from_text("    <table class=\"controls-tbl\" all_group>
        <caption>Категории</caption>
        <tr>
            <th>Название</th>
            <th>Настройки</th>
            ");
            // line 7
            if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
                echo \layout::func_from_text("<th colspan=\"3\">Управление</th>");
            }
            // line 8
            echo \layout::func_from_text("        </tr>
        ");
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["op"]) {
                // line 10
                echo \layout::func_from_text("            ");
                $this->env->loadTemplate("/applications/options/layouts/admin/elements/group.html")->display($context);
                // line 11
                echo \layout::func_from_text("        ");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['op'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo \layout::func_from_text("        ");
            if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
                // line 13
                echo \layout::func_from_text("            <tr>
                <td colspan=\"2\">&nbsp;</td>
                <td colspan=\"3\"><a title=\"Добавить\" class=\"add-btn add-category\"></a></td>
            </tr>
        ");
            }
            // line 18
            echo \layout::func_from_text("    </table>
");
        }
    }

    public function getTemplateName()
    {
        return "/applications/options/layouts/admin/options_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 18,  72 => 13,  69 => 12,  55 => 11,  35 => 9,  32 => 8,  28 => 7,  21 => 2,  19 => 1,  246 => 65,  243 => 64,  238 => 62,  233 => 25,  228 => 14,  222 => 5,  210 => 89,  189 => 86,  186 => 85,  183 => 84,  180 => 83,  176 => 82,  169 => 81,  167 => 80,  164 => 79,  160 => 78,  152 => 73,  144 => 67,  142 => 64,  137 => 62,  133 => 60,  127 => 59,  123 => 58,  104 => 57,  99 => 56,  97 => 55,  80 => 43,  76 => 42,  58 => 26,  56 => 25,  44 => 15,  30 => 5,  24 => 1,  65 => 14,  62 => 13,  59 => 12,  52 => 10,  49 => 8,  42 => 14,  39 => 5,  34 => 3,  31 => 2,);
    }
}
