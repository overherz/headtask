<?php

/* /applications/groups/layouts/admin/groups.html */
class __TwigTemplate_ad87f5b65f1832eec8d075d6df2dfd6767215415ed8bd44ce963b50b196ee601 extends Twig_Template
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
            echo \layout::func_from_text("    <table class=\"table table-bordered table-striped table-condensed\">
        <thead>
        <tr>
            <th>Название</th>
            <th>Пользователей</th>
            <th colspan=\"2\">Управление</th>
        </tr>
        </thead>
        <tbody>
        ");
            // line 11
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
                // line 12
                echo \layout::func_from_text("        ");
                $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "groups", 1 => "admin/elements/group.html"), "method"));
                $template->display($context);
                // line 13
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
            // line 14
            echo \layout::func_from_text("        <tr>
            <td colspan=\"2\">&nbsp;</td>
            <td colspan=\"2\"><a title=\"Добавить\" class=\"fa fa-15x fa-plus-square add-btn\"></a></td>
        </tr>
        </tbody>
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
        return array (  49 => 12,  32 => 11,  21 => 2,  19 => 1,  67 => 14,  65 => 16,  62 => 15,  59 => 14,  53 => 13,  50 => 10,  47 => 9,  42 => 7,  39 => 6,  34 => 3,  31 => 2,);
    }
}
