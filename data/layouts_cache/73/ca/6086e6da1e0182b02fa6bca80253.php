<?php

/* /applications/groups/layouts/admin/groups.html */
class __TwigTemplate_73ca6086e6da1e0182b02fa6bca80253 extends Twig_Template
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
        if ((isset($context["groups"]) ? $context["groups"] : null)) {
            // line 2
            echo \layout::func_from_text("  <table class=\"controls-tbl\" all_group>
        <caption>Группы</caption>
        <tr>
            <th>Название</th>
            <th>Пользователей</th>
            <th colspan=\"2\">Управление</th>
        </tr>
        ");
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["g"]) {
                // line 10
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "groups", 1 => "admin/elements/group.html"), "method"));
                $template->display($context);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['g'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo \layout::func_from_text("        <tr>
            <td colspan=\"2\">&nbsp;</td>
            <td colspan=\"2\"><a title=\"Добавить\" class=\"add-btn\"></a></td>
        </tr>
   </table>
");
        }
    }

    public function getTemplateName()
    {
        return "/applications/groups/layouts/admin/groups.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 11,  47 => 10,  30 => 9,  21 => 2,  19 => 1,  70 => 18,  68 => 17,  65 => 12,  62 => 15,  56 => 12,  53 => 11,  50 => 10,  42 => 7,  39 => 6,  34 => 3,  31 => 2,);
    }
}
