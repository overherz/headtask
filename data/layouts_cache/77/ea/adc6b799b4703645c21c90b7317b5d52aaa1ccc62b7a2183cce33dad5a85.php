<?php

/* /applications/projects/layouts/all_projects_table.html */
class __TwigTemplate_77eaadc6b799b4703645c21c90b7317b5d52aaa1ccc62b7a2183cce33dad5a85 extends Twig_Template
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
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
        // line 2
        if ((isset($context["all_projects"]) ? $context["all_projects"] : null)) {
            // line 3
            echo \layout::func_from_text("    <table class=\"table table-bordered\">
        <tr>
            ");
            // line 5
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["all_projects"]) ? $context["all_projects"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 6
                echo \layout::func_from_text("            <td style=\"width:33%;\">
                <a href=\"/projects/~");
                // line 7
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\"> ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</a>
            </td>
        ");
                // line 9
                if (((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 3) == 0) && (!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last")))) {
                    echo \layout::func_from_text("<tr>");
                }
                // line 10
                echo \layout::func_from_text("            ");
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "last") && (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 3) > 0))) {
                    // line 11
                    echo \layout::func_from_text("                ");
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, (3 - ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 3))));
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
                        // line 12
                        echo \layout::func_from_text("                    <td>&nbsp;</td>
                ");
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 14
                    echo \layout::func_from_text("            ");
                }
                // line 15
                echo \layout::func_from_text("            ");
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo \layout::func_from_text("    </table>
");
        } else {
            // line 18
            echo \layout::func_from_text("    проекты не найдены
");
        }
        // line 20
        $this->env->loadTemplate("/source/jpaginator_boot.html")->display($context);
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/all_projects_table.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 20,  115 => 18,  111 => 16,  97 => 15,  94 => 14,  79 => 12,  61 => 11,  58 => 10,  54 => 9,  44 => 6,  27 => 5,  23 => 3,  21 => 2,  19 => 1,  55 => 15,  52 => 14,  50 => 13,  47 => 7,  39 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
